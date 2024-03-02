<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'imageable_id';
    protected $fillable = ['path'];

    public function imageable(){
        return $this->morphTo();
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }


}
