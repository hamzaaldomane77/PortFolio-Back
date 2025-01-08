<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Skill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_name'
    ];

    /**
     * The "booted" method of the model.
     *
     * This method is called when the model is booted, and it registers
     * event listeners for the "saved" and "deleted" events.
     *
     * The "saved" event listener clears the "skills" cache whenever
     * a skill record is saved (created or updated).
     *
     * The "deleted" event listener clears the "skills" cache whenever
     * a skill record is deleted.
     *
     * This ensures that the cache is always up-to-date with the latest
     * skill data.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($skill) {
            Cache::forget('skills');
        });

        static::deleted(function ($skill) {
            Cache::forget('skills');
        });
    }

    /**
     * Get all of the skill_items for the Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skill_items(): HasMany
    {
        return $this->hasMany(SkillItem::class, 'skill_id', 'id');
    }
}
