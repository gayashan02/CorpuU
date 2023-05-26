<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply_job extends Model
{
    use HasFactory;
    protected $table = 'apply_job';

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'cv',
        'job_id',
    ];
}
