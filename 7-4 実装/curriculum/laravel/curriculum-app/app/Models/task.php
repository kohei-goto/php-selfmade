<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'taskId';
    protected $fillable = [
        'userId', 'title', 'description', 'priority', 'status',
    ];
    protected $dates = ['start_date', 'deadline','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}