<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $table = 'events';
    protected $fillable = ['title','description','space_id','start_date','end_date'];

    public function space(){
       return $this->belongsTo(Space::class); 
    }
}
