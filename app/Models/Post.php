<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="post"; // permite de cambiarle el nombre a la table directamente en la base de datos video: minuto 2 https://www.youtube.com/watch?v=QM1MVofbaek&list=PLpKWS6gp0jd_xJyvkbDzoMQLQc-qyFQAE&index=14
}
