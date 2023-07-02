<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'user_id', 'views'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function added(){
        $created_at = $this->attributes['created_at'];
        $timeSinceUpdate = Carbon::parse($created_at)->diffForHumans(null, null, true, 1, null);
        return $timeSinceUpdate;
    }
} 