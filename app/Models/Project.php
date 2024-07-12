<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public function student() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function shots() {
        return $this->hasMany(ProjectShots::class, 'project_id', 'id');
    }

}
