<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Cache;

class SkillItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'skill_id',
        'item',
        'image',
    ];

    /**
     * The "booted" method of the model.
     *
     * This method is called when the model is booted, and it registers
     * event listeners for the "saved" and "deleted" events.
     *
     * The "saved" event listener clears the "skillItems" cache whenever
     * a skillItem record is saved (created or updated).
     *
     * The "deleted" event listener clears the "skillItems" cache whenever
     * a skillItem record is deleted.
     *
     * This ensures that the cache is always up-to-date with the latest
     * skillItem data.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($skillItem) {
            Cache::forget('skillItems');
        });

        static::deleted(function ($skillItem) {
            Cache::forget('skillItems');
        });
    }

    /**
     * Get the skill that owns the SkillItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }

    /**
     * The projects that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'skill_project');
    }
}
