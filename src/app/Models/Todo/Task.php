<?php

namespace App\Models\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Todoリストの要素を表現
 */
class Task extends Model
{
    protected $table = 'todo_task';
    protected $guarded = ['id'];

    use HasFactory;
}
