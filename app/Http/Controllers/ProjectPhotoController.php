<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectPhoto\StoreProjectPhotoRequest;
use App\Http\Requests\ProjectPhoto\UpdateProjectPhotoRequest;
use App\Http\Resources\ProjectPhotoResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use App\Models\Project;
use App\Models\ProjectPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectPhotoController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $projectPhotos = $project->project_photos;
        $data = ProjectPhotoResource::collection($projectPhotos);
        return $this->customeResponse($data, 'projectPhoto Retrieved Successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectPhotoRequest $request)
    {
        try {
            DB::beginTransaction();

            $path = $this->UploadFile($request, 'projectPhotos', 'photo');


            $projectPhoto = ProjectPhoto::create([
                'project_id' => $request->project_id,
                'photo' => $path,
            ]);

            DB::commit();

            $data = new ProjectPhotoResource($projectPhoto);
            return $this->customeResponse($data, 'projectphoto Created Successfully', 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return $this->customeResponse(null, 'Failed To Create projectphoto', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectPhoto $projectPhoto)
    {
        $data = new ProjectPhotoResource($projectPhoto);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectPhotoRequest $request, ProjectPhoto $projectPhoto)
    {
        try {
            DB::beginTransaction();

            $projectPhoto->project_id = $request->input('project_id') ?? $projectPhoto->project_id;
            $projectPhoto->photo       = $this->fileExists($request, 'projectPhotos', 'photo') ?? $projectPhoto->photo;

            $projectPhoto->save();

            DB::commit();
            $data = new ProjectPhotoResource($projectPhoto);
            return $this->customeResponse($data, 'projectphoto Updated Successfully', 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectPhoto $projectPhoto)
    {
        $projectPhoto->delete();
        return $this->customeResponse(null, 'projectPhoto deleted successfully', 200);
    }
}
