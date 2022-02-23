<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    public $timestamps = FALSE;

    protected $fillable = ['nome','cpf','cidade','estado'];

    use HasFactory;
}
