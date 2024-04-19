<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = ['title', 'user_id']; 

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
{
    // 'project_skills' this pivote tabl, pivot table mean a table has foriegn ke of skills and projects 
    // then incontroller we use attach to create and sync to update
    return $this->belongsToMany(Project::class, 'project_skills');
}

    public static function boot(){
        parent::boot();

                // deleting: to delete also the images thoses have forgien keys with skills    
                static::deleting(function (Skill $skill) {
                    $skill->image()->delete();
                });
    }
    
}

