<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
    protected $table = 'fabricante';

    protected $guarded = ['id'];
     
    public function produtos()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
