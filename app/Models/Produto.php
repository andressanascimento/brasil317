<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $guarded = ['id'];
    
    public function fabricante()
    {
        return $this->belongsTo('App\Models\Fabricante');
    }
    
    public function marca()
    {
        return $this->belongsTo('App\Models\Marca');
    }
    
    public function disputas()
    {
        return $this->hasMany('App\Models\Disputa');
    }
}
