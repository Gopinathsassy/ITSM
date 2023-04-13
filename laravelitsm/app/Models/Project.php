<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'proj_name',
        'proj_code',
        'proj_type',
        'company_location',
        'company_name',
        'id_project',
    ];
}
