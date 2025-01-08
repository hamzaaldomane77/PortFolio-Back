<?php

namespace App\Http\Controllers;

use App\Http\Requests\Skill\StoreSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;;
use App\Http\Resources\SkillResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SkillController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Cache::remember('skills', 180, function () {
            return Skill::all();
        });

        $data = SkillResource::collection($skills);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        try {
            $skill = Skill::create([
                'skill_name' => $request->skill_name
            ]);
            $skill_data =new SkillResource($skill);
            return $this->customeResponse($skill_data , 'skill successfully stored',200);
        } catch (\Throwable $th) {
            Log::error($th);
            return $this->customeResponse(null, 'Failed To Create', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        $data = new SkillResource($skill);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        try {
            $skill->skill_name =$request->input('skill_name') ?? $skill->skill_name ;
            $skill->save();
            $skill_data =new SkillResource($skill);
            return $this->customeResponse($skill_data , 'skill successfully updated',200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['message' => 'Skill Deleted'], 200);
    }
}
