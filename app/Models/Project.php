<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Project extends Model
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
        'github_link',
        'demo_link',
        'published',
    ];

    /**
     * The "booted" method of the model.
     *
     * This method is called when the model is booted, and it registers
     * event listeners for the "saved" and "deleted" events.
     *
     * The "saved" event listener clears the "projects" cache whenever
     * a project record is saved (created or updated).
     *
     * The "deleted" event listener clears the "projects" cache whenever
     * a project record is deleted.
     *
     * This ensures that the cache is always up-to-date with the latest
     * project data.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($project) {
            Cache::forget('projects');
        });

        static::deleted(function ($project) {
            Cache::forget('projects');
        });
    }

    /**
     * Get all of the project_photos for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project_photos(): HasMany
    {
        return $this->hasMany(ProjectPhoto::class, 'project_id', 'id');
    }

    /**
     * The skills that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(SkillItem::class, 'skill_project');
    }
}
