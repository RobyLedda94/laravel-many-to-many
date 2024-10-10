<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'cover_image', 'type_id'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }
    // creo relazione
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // relazione
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
