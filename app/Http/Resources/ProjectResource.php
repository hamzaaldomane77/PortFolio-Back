<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'             => $this->id,
            'title'          => $this->title,
            'description'    => $this->description,
            'github_link'    => $this->github_link,
            'demo_link'      => $this->demo_link,
            'published'      => Carbon::parse($this->published)->format('F Y j'),
            'project_photos' => ProjectPhotoResource::collection($this->project_photos),
            'skills'         => SkillItemResource::collection($this->skills),
        ];
    }
}
