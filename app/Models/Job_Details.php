<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Details extends Model
{
    use HasFactory;
    protected $table = 'job_details';

    protected $fillable = [
        'title',
        'faculty',
        'description',
        'location',
        'salary',
        'deadline',
    ];
}
