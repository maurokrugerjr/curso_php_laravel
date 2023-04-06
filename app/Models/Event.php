<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 

class Event extends Model
{
    public $table = 'event';
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'city',
        'private',
        'image',
        'date',
        'items'
    ];

    protected $casts = [

        'items' => 'array'

    ];

    protected $dates = ['date'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
