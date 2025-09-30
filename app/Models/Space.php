<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    public $table = 'spaces';
    protected $fillable = ['name','address','city','zip_code'];

    public function events(){
    return $this->hasMany(Event::class);
  }
}
