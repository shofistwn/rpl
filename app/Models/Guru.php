<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    
    protected $table = 'guru';
    protected $fillable = [
        'foto',
        'nama',
        'alamat',
        'email',
        'telepon'
    ];
    public $timestamps = false;
}
