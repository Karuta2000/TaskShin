<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSettings extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'banner', 'sex', 'description', 'birthday', 'color_id'];


    public function user(){
        return $this->hasOne(User::class);
    }
}
