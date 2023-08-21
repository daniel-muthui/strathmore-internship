<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $table = 'internship';
    protected $fillable= [
        'company_name',
        'position',
        'description',
        'job_type',
        'start_date',
        'end_date',
        'location',
        'category',
        'application_deadline',
        'image_url'
    ];

}
