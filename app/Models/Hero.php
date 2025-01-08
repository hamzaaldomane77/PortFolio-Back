<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Hero extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'my_cv'
    ];

        /**
     * The "booted" method of the model.
     *
     * This method is called when the model is booted, and it registers
     * event listeners for the "saved" and "deleted" events.
     *
     * The "saved" event listener clears the "hero" cache whenever
     * a hero record is saved (created or updated).
     *
     * This ensures that the cache is always up-to-date with the latest
     * hero data.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($hero) {
            Cache::forget('hero');
        });
    }

    /**
     * Get all of the hero_sliders for the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hero_sliders(): HasMany
    {
        return $this->hasMany(HeroSlider::class, 'hero_id', 'id');
    }
}
