<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','description','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function comments(){
        return $this->morphToMany(Comment::class, 'commentable');
    }
}
