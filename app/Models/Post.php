<?php

namespace App\Models;

use \Spatie\Sluggable\HasSlug;
use \Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory, HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    protected $fillable = [
        'title',
        'slug',
        'content'
    ];


    /**
     * For the model binding we're going to use the db column called 'slug'
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
