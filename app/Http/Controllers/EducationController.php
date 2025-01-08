<?php

namespace App\Http\Controllers;

use App\Http\Requests\Education\StoreEducationRequest;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;;

use App\Http\Resources\EducationResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class EducationController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Cache::remember('educations', 180, function () {
            return Education::all();
        });
        $data = EducationResource::collection($educations);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        try {
            //code...
            $education = new Education();
            $education->title       = $request->title;
            $education->description = $request->description;
            $education->photo       = $this->UploadFile($request, 'Education', 'photo');

            $education->save();

            $data = new EducationResource($education);
            return $this->customeResponse($data, 'Education Created Successfully', 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return $this->customeResponse(null, 'Failed To Create', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        $data = new EducationResource($education);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEducationRequest $request, Education $education)
    {
        try {
            //code...
            $education->title       = $request->input('title') ?? $education->title;
            $education->description = $request->input('description') ?? $education->description;
            $education->photo       = $this->fileExists($request, 'Educations', 'photo') ?? $education->photo;

            $education->save();

            $data = new EducationResource($education);
            return $this->customeResponse($data, 'Education Updated Successfully', 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return response()->json(['message' => 'Education Deleted'], 200);
    }
}
