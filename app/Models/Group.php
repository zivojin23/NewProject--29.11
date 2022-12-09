<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_name',
        'group_description',
        'employee_id'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class);
    }
}


