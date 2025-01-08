<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeroSlider\StoreHeroSliderRequest;
use App\Http\Requests\HeroSlider\UpdateHeroSliderRequest;
use App\Http\Resources\HeroSliderResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class HeroSliderController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero_sliders = Cache::remember('hero_sliders', 180, function () {
            return HeroSlider::all();
        });
        $data = HeroSliderResource::collection($hero_sliders);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $path = $this->UploadFile($request, 'heroSliders', 'photo_slide');

            $hero_slider = HeroSlider::create([
                'photo_title' => $request->photo_title,
                'photo_slide' => $path,
            ]);

            $data = new HeroSliderResource($hero_slider);
            return $this->customeResponse($data, 'Created Successfully', 201);
        } catch (\Throwable $th) {
            Log::error($th);
            return $this->customeResponse(null, 'Failed To Create', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(HeroSlider $heroSlider)
    {
        $data = new HeroSliderResource($heroSlider);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeroSliderRequest $request, HeroSlider $heroSlider)
    {
        try {
            $heroSlider->photo_title = $request->input('photo_title') ?? $heroSlider->photo_title;
            $heroSlider->photo_slide = $this->fileExists($request, 'heroSliders', 'photo_slide') ?? $heroSlider->photo_slide;

            $heroSlider->save();

            $data = new HeroSliderResource($heroSlider);
            return $this->customeResponse($data, 'projectphoto Updated Successfully', 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSlider $heroSlider)
    {
        $heroSlider->delete();
        return $this->customeResponse(null, 'HeroSlider deleted successfully', 200);
    }
}
