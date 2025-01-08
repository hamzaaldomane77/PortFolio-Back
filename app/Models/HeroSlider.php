<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class HeroSlider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hero_id',
        'photo_slide',
        'photo_title'
    ];

    /**
     * Get the hero that owns the HeroSlider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hero(): BelongsTo
    {
        return $this->belongsTo(Hero::class, 'hero_id');
    }

    /**
     * The "boot" method of the model.
     *
     * This method is called when the model is booting, and it registers
     * event listeners for the "creating", "saved", and "deleted" events.
     *
     * The "creating" event listener sets a default value for the "hero_id"
     * attribute whenever a new hero slider record is being created.
     *
     * The "saved" event listener clears the "hero_sliders" cache whenever
     * a hero slider record is saved (created or updated).
     *
     * The "deleted" event listener clears the "hero_sliders" cache whenever
     * a hero slider record is deleted.
     *
     * This ensures that the cache is always up-to-date with the latest
     * hero slider data.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($heroSlider) {
            $heroSlider->hero_id = 1;
        });

        static::saved(function ($heroSlider) {
            Cache::forget('hero_sliders');
        });

        static::deleted(function ($heroSlider) {
            Cache::forget('hero_sliders');
        });
    }
}
