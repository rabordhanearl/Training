<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $directory = '/images/';
    protected $fillable = [
    
        'user_id',
        'title', 
        'content',
        'author',
        'path',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public static function scopeList($query){
        return $query->orderBy('id','asc')->get();
    }
    public function getPathAttribute($value){
        return $this->directory . $value;
    }
}
