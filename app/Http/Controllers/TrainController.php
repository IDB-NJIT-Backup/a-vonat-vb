<?php

namespace App\Http\Controllers;

use App\Http\Resources\TrainResource;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index(){
        return TrainResource::collection(Train::all());
    }

    public function show(Train $train){
        return new TrainResource($train);
    }

    public function create(Request $request){
        $data = $request->validate([
            'manufacturer' => 'required|between:1,20',
            'model' => 'required|between:1,20',
            'year' => 'required',
            'type' => 'required|in:L,C',
            'carries' => 'required|in:C,P',
        ]);

        $train = Train::create($data);
        return new TrainResource($train);
    }

    public function update(Request $request, Train $train){
        $data = $request->validate([
            'manufacturer' => 'required|between:1,20',
            'model' => 'required|between:1,20',
            'year' => 'required',
            'type' => 'required|in:L,C',
            'carries' => 'required|in:C,P',
        ]);

        $train->update($data);
    }

    public function destroy(Train $train){
        return $train->delete();
    }
}
