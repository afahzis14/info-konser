<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'event_id',
        'media_url',
    ];

    /**
     * Get the event that owns the media.
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
