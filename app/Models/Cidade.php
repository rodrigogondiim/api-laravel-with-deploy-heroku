<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    use HasFactory;
    public $timestamps = FALSE;

    protected $tables = "cidades";
    protected $fillable = ['nome','estado_id'];

}
