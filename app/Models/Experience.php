<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'job', 'company', 'city', 'country', 'details', 'start_job', 'end_job', 'user_id', 'is_currently_working'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
