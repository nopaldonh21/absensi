<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;

    protected $table = 'presences';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'student_id',
        'nis',
        'tgl',
        'jam_dtng',
        'jam_plng',
        'ket',
        'bukti'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
