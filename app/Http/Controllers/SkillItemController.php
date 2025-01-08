<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkillItem\StoreSkillItemRequest;
use App\Http\Requests\SkillItem\UpdateSkillItemRequest;
use App\Models\SkillItem;
use Illuminate\Http\Request;;
use App\Http\Resources\SkillItemResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SkillItemController extends Controller
{
    use ApiResponseTrait , UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillItems = Cache::remember('skillItems', 180, function () {
            return SkillItem::all();
        });

        $data = SkillItemResource::collection($skillItems);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillItemRequest $request)
    {
        try {
            $skill_item = SkillItem::create([
                'skill_id' => $request->skill_id,
                'item'=>$request->item,
                'image'=>$this->UploadFile($request,'skillItem','image'),
            ]);
            $skill_item_data = new SkillItemResource($skill_item);
            return $this->customeResponse($skill_item_data, 'Item Successfully Stored', 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return $this->customeResponse(null, 'Failed To Create', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SkillItem $skillItem)
    {
        $data = new SkillItemResource($skillItem);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillItemRequest $request, SkillItem $skillItem)
    {
        try {
            $skillItem->skill_id = $request->input('skill_id') ?? $skillItem->skill_id;
            $skillItem->item     = $request->input('item') ?? $skillItem->item;
            if($request->input('image'))
            {
                $skillItem->image =$this->UploadFile($request,'skillItem','image');
            }
            $skillItem->save();
            $skill_item_data = new SkillItemResource($skillItem);
            return $this->customeResponse($skill_item_data, 'Item Successfully Updated', 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillItem $skillItem)
    {
        $skillItem->delete();
        return response()->json(['message' => 'SkillItem Deleted'], 200);
    }
}
