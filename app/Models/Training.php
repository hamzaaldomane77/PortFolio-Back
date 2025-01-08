<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'training_name',
        'company_name',
        'description',
        'company_logo',
        'company_link',
        'certificate_link',
        'recomendation_letter_link',
    ];

    /**
     * The "booted" method of the model.
     *
     * This method is called when the model is booted, and it registers
     * event listeners for the "saved" and "deleted" events.
     *
     * The "saved" event listener clears the "trainings" cache whenever
     * a training record is saved (created or updated).
     *
     * The "deleted" event listener clears the "trainings" cache whenever
     * a training record is deleted.
     *
     * This ensures that the cache is always up-to-date with the latest
     * training data.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($training) {
            Cache::forget('trainings');
        });

        static::deleted(function ($training) {
            Cache::forget('trainings');
        });
    }
}
