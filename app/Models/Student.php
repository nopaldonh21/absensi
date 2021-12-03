<?php

namespace App\Models;

use App\Models\User;
use App\Models\Presence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'nis',
        'nama',
        'rombel',
        'rayon',
        'username',
        'password'
    ];
}
