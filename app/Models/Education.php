<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'name', 'level', 'city', 'country', 'details', 'start_educate', 'end_educate', 'user_id', 'is_currently_educate'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
