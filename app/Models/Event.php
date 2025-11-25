<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'venue',
        'location',
        'event_date',
        'event_time',
        'category',
        'status',
        'price_vip',
        'price_regular',
        'price_economy',
        'image',
        'lineup',
        'capacity',
        'sold_tickets',
        'is_featured',
        'meta_description',
    ];

    protected $casts = [
        'event_date' => 'date',
        'price_vip' => 'decimal:2',
        'price_regular' => 'decimal:2',
        'price_economy' => 'decimal:2',
        'is_featured' => 'boolean',
        'sold_tickets' => 'integer',
        'capacity' => 'integer',
    ];

    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('d M Y');
    }

    public function getFormattedTimeAttribute()
    {
        if (!$this->event_time) {
            return null;
        }
        
        // Handle both time string and datetime
        if (is_string($this->event_time)) {
            return date('H:i', strtotime($this->event_time));
        }
        
        return $this->event_time->format('H:i');
    }

    public function getMinPriceAttribute()
    {
        $prices = array_filter([
            $this->price_economy,
            $this->price_regular,
            $this->price_vip,
        ]);
        
        return !empty($prices) ? min($prices) : null;
    }

    /**
     * Get all media for the event.
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
