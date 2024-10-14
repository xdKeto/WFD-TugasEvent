<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Events extends Model
{
    use HasFactory;

    protected $casts = [
        'tanggal' => 'date',
        'start_time' => 'datetime:h:i:s',
    ];

    protected $fillable = ['organizer_id', 'categories_id', 'title', 'venue', 'tanggal', 'start_time', 'description', 'booking_url', 'tags'];


    public function categories(): BelongsTo {
        return $this->belongsTo(EventCategories::class, 'categories_id');
    }

    public function organizer(): BelongsTo {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }
}