<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    protected $fillable = ['project_id', 'image', 'caption', 'sort_order'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Public URL for the image, or null if none.
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
