<?php

namespace App\Models;

use App\Models\Traits\HasUUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory, HasUUID;

    protected $fillable = [
        'nome',
        'descricao',
        'marca_id',
        'tensao'
    ];
}
