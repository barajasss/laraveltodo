<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $guarded = [];
    public function priorityInfo()
    {
        switch ($this->priority) {
            case 'high':
                return 'Important';
            case 'medium':
                return 'Necessary';
            default:
                return 'Task';
        }
    }
}
