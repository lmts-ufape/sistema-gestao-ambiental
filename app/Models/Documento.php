<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'documento_modelo',
    ];

    public function requerimentos() 
    {
        return $this->belongsToMany(Requerimento::class, 'checklists', 'documento_id', 'requerimento_id')->withPivot('caminho', 'comentario', 'status');
    } 
}