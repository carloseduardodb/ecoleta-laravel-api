<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointRequest;
use App\Models\Item;
use App\Models\Point;
use App\Models\PointItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $points = Point::all();

        return $points;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Support\MessageBag
     */
    public function store(Request $request)
    {
        //*Cors e transaction, e as relações*/
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'whatsapp' => 'required',
            'email' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'uf' => 'required',
            'image_path' => 'required',
            'items' => 'required'
        ]);

        if ($validate->fails()) {
            return $validate->messages();
        }

        $point = new Point();
        $point->image_path =
            str_replace('public', 'storage', $request->image_path->store('public/uploads'));
        $point->name = $request->name;
        $point->whatsapp = $request->whatsapp;
        $point->email = $request->email;
        $point->latitude = $request->latitude;
        $point->longitude = $request->longitude;
        $point->city = $request->city;
        $point->uf = $request->uf;
        $point->save();

        $hydrated_items = explode(', ', $request->items);
        $items = collect($hydrated_items);

        $point_items = $items->map(function($item) use ($point){
            return [
                'point_id' => $point->id,
                'item_id' => $item
            ];
        });

        foreach ($point_items as $point_item){
            PointItem::create($point_item);
        }

        if (!isset($point)) {
            return response()->json(
                [], 400
            );
        } else {
            return $point;
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Point $point)
    {
        $point->image_path = URL::to('/').'/'.$point->image_path;
        return response()->json(
            [
                'point' => $point,
                'items' => $point->items
            ], 200
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Point $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Point $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Point $point
     * @return \Illuminate\Http\Response
     */
    public function destroy(Point $point)
    {
        //
    }
}
