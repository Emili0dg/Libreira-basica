<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    public function isNew()
    {
        return $this->nombre_libro >= now()->subDays(7);
    }
}
