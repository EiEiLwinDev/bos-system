<?php

namespace App\Projects\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'client',
        'start_date',
        'end_date',
        'status',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}