<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disputa extends Model
{
    protected $table = 'disputa';

    protected $guarded = ['id'];

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
