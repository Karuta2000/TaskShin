<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;



class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'color_id', 'project_id', 'user_id', 'archived'];

    protected $primaryKey = 'id';

    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function lastUpdate(){
        $updated_at = $this->attributes['updated_at'];
        $timeSinceUpdate = Carbon::parse($updated_at)->diffForHumans(null, null, true, 1, null);
        return $timeSinceUpdate;
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
    

}
