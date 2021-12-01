<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    public function cards(){
        return $this->hasMany(Card::class);
    }

    public function format(){
        return $this->hasOne(Format::class);
    }
}
