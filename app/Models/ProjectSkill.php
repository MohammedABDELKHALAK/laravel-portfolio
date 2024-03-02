<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSkill extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable=['project_id','skill_id'];
    protected $table = 'project_skill';

}
