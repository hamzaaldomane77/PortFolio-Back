<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Education extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'photo',
    ];

    /**
     * The "booted" method of the model.
     *
     * This method is called when the model is booted, and it registers
     * event listeners for the "saved" and "deleted" events.
     *
     * The "saved" event listener clears the "educations" cache whenever
     * a education record is saved (created or updated).
     *
     * The "deleted" event listener clears the "educations" cache whenever
     * a education record is deleted.
     *
     * This ensures that the cache is always up-to-date with the latest
     * education data.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($education) {
            Cache::forget('educations');
        });

        static::deleted(function ($education) {
            Cache::forget('educations');
        });
    }
}
