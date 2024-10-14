<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organizer extends Model
{
    use HasFactory;

    protected $table = 'organizer';

    protected $fillable = ['name', 'description', 'fb_link', 'twt_link', 'web_link'];

    public function events(): HasMany {
        return $this->hasMany(Events::class);
    }
}