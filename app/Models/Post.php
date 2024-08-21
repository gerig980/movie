<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{ 
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['title','url', 'url2', 'url3','url4', 'slug', 'poster','content','isPublished','isBanner'];
    protected $casts = [
        'isPublished' => 'boolean',
        'isBanner'    => 'boolean'
    ];

    // public function category(){
    //     return $this->belongsToMany(Category::class);
    // }
    public function category()
    {
        return $this->belongsToMany(Category::class)
            ->withPivot('sort_order')
            ->orderBy('sort_order');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function actor(){
        return $this->belongsToMany(Actors::class)
            ->withPivot('sort_order')
            ->orderBy('sort_order');
    }
}
