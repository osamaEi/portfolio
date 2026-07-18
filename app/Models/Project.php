<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title', 'slug', 'category', 'summary', 'description',
        'tech_stack', 'url', 'image', 'featured', 'sort_order',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'featured' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title) . '-' . Str::random(5);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(ProjectVideo::class)->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Cover image plus gallery images, de-duplicated, for the public lightbox.
     */
    public function getGalleryAttribute(): array
    {
        return collect([$this->image_url])
            ->concat($this->images->pluck('image_url'))
            ->filter()
            ->unique()
            ->values()
            ->all();
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderByDesc('featured');
    }

    /**
     * Public URL for the project's cover image, or null if none.
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        // Absolute URLs are used as-is; bare filenames live in public/projects.
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        return asset('projects/' . ltrim($this->image, '/'));
    }
}
