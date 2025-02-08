<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    //mengambil data-data student dari tabel students
    //menggunakan relationship HasMany
    //melalui models Student

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
