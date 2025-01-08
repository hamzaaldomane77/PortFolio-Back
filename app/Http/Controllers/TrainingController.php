<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Traits\UploadFileTrait;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TrainingResource;
use App\Http\Requests\Training\StoreTrainingRequest;
use App\Http\Requests\Training\UpdateTrainingRequest;
use Illuminate\Support\Facades\Cache;

class TrainingController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Cache::remember('trainings', 180, function () {
            return Training::all();
        });

        $data = TrainingResource::collection($trainings);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        try {
            DB::beginTransaction();

            $training = Training::create([
                'training_name'             => $request->training_name,
                'company_name'              => $request->company_name,
                'description'               => $request->description,
                'company_link'              => $request->company_link,
                'certificate_link'          => $request->certificate_link,
                'company_logo'              => $this->UploadFile($request, 'Training', 'company_logo'),
                'recomendation_letter_link' => $request->recomendation_letter_link,
            ]);

            DB::commit();
            return $this->customeResponse(new TrainingResource($training), 'Done!', 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        $data = new TrainingResource($training);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        try {

            DB::beginTransaction();
            $training->training_name             = $request->input('training_name') ?? $training->training_name;
            $training->company_name              = $request->input('company_name') ?? $training->company_name;
            $training->description               = $request->input('description') ?? $training->description;
            $training->company_link              = $request->input('company_link') ?? $training->company_link;
            $training->certificate_link          = $request->input('certificate_link') ?? $training->certificate_link;
            $training->company_logo              = $this->fileExists($request, 'Training', 'company_logo') ?? $training->company_logo;
            $training->recomendation_letter_link = $request->input('recomendation_letter_link') ?? $training->recomendation_letter_link;

            DB::commit();
            return $this->customeResponse(new TrainingResource($training), 'Done!', 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();
        return response()->json(['message' => 'Training Deleted'], 200);
    }
}
