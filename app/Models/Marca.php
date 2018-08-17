<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marca';

    protected $guarded = ['id'];
    
    public function produtos()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
