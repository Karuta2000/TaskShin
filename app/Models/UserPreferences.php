<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreferences extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'color_id', 'priority', 'project_id', 'setDate', 'projectSortBy', 'imageSortBy', 'taskSortBy'];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function color(){
        $this->belongsTo(Color::class);
    }

    public function project(){
        $this->belongsTo(Project::class);
    }


}
