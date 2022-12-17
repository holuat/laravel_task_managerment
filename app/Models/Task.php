<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'task_assigner',
        'task_receiver',
        'task_name',
        'expired_at',
        'task_desc',
    ];
    protected $primaryKey = 'id';
    protected $table = 'tasks';

    public function user(){
        return $this->belongsTo(User::class,'task_receiver','id');
    }
}
