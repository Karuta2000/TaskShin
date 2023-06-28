<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;


    use HasFactory;

    protected $fillable = ['name', 'color_id'];

    protected $primaryKey = 'id';

    public function tasks(){
        return $this->belongsToMany(Task::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

}
