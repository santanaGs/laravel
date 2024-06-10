<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'contas';

    // Colunas que recebem valor
    protected $fillable = ["nome", "valor", "vencimento"];
}
