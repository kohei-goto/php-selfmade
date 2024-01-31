<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $primaryKey = 'memoId';
    protected $fillable = [
        'userId', 'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}