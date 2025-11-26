<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'author',
        'category',
        'image',
        'published_date',
        'is_published',
        'is_featured',
        'meta_description',
        'views',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'views' => 'integer',
    ];

    /**
     * Generate slug from title
     */
    public static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    /**
     * Get formatted published date
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_date->format('d F Y');
    }

    /**
     * Get short excerpt
     */
    public function getShortExcerptAttribute()
    {
        if ($this->excerpt) {
            return Str::limit($this->excerpt, 150);
        }
        return Str::limit(strip_tags($this->content), 150);
    }
}
