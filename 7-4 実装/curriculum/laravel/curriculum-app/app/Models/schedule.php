<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'userId', 'taskId', 'startTime', 'endTime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'taskId');
    }
}