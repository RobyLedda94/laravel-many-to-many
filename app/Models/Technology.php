<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }

    // relazione many to many
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
