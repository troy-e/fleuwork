<?php

namespace App\Models;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $with = ['grade', 'department'];
    
    protected $fillable = [
        'name', 'email', 'address', 'grade_id', 'department_id',
    ];

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id'); // Ensure correct foreign key
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id'); // Ensure correct foreign key
    }
}