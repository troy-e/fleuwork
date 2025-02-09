<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
