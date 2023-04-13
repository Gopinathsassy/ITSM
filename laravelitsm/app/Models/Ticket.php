<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Musonza\Chat\Traits\Messageable;

class Ticket extends Model
{
    use HasFactory;
    use Messageable;

    protected $fillable = [
        'type',
        'summary',
        'description',
        'level',
        'responsible',
        'severity',
        'status',
        'fileformat',
        'created_by',
        'assignedto',
        'assignedat',
        'acceptedat',
        'solution',
        'completedat',
        'project',
        'reassign',
        'modulename',
        'cancel_reson',
        'change_time',
        'time_app_status',
        'date_time_input_request',
        'WUI',
      'response_sent',
      'nosolutionsent',
      'close_status',
      'user_close_status',
   
    ];

}
