<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeChambres extends Model
{
    use HasFactory;

    public function chambres()
    {
        return $this->hasMany(Chambres::class);
    }
}
