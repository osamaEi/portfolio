<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectVideo extends Model
{
    protected $fillable = ['project_id', 'video', 'title', 'sort_order'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * True when this is an external link rather than an uploaded file.
     */
    public function getIsEmbedAttribute(): bool
    {
        return str_starts_with($this->video, 'http');
    }

    /**
     * Public URL for an uploaded video file, or null for embeds.
     */
    public function getVideoUrlAttribute(): ?string
    {
        if (empty($this->video) || $this->is_embed) {
            return null;
        }

        return asset('projects/' . ltrim($this->video, '/'));
    }

    /**
     * Player URL for YouTube/Vimeo links, or null if not a recognised host.
     */
    public function getEmbedUrlAttribute(): ?string
    {
        if (! $this->is_embed) {
            return null;
        }

        // youtu.be/ID and youtube.com/watch?v=ID both reduce to the same embed.
        if (preg_match('~(?:youtube\.com/(?:watch\?(?:.*&)?v=|embed/|shorts/)|youtu\.be/)([\w-]{11})~', $this->video, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        if (preg_match('~vimeo\.com/(?:video/)?(\d+)~', $this->video, $m)) {
            return 'https://player.vimeo.com/video/' . $m[1];
        }

        return null;
    }
}
