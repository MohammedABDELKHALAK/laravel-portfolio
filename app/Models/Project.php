<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'url', 'description'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    public static function boot()
    {
        parent::boot();

        // deleting: to delete also the images thoses have forgien keys with skills    
        static::deleting(function ($project) {
            //this will delete phisical non softDelete
            $project->skills()->detach();
        });

        // deleting: to delete also the images thoses have forgien keys with post    
        static::deleting(function (Project $project) {
            $project->image()->delete();
        });
    }
}
