<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Http\Resources\MissionCollection;
use Illuminate\Http\Request;
use App\Mission;
use App\Http\Resources\Mission as MissionResource;


class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missions = new MissionCollection(Mission::all());
       return response($missions)->header('Accept', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.new_mission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MissionRequest $request)
    {
        $mission = new Mission();
        $mission->name = $request->name;
        $mission->slug =str_slug($request->slug);
        $mission->job = $request->job;
        $mission->key = $request->key;
        $mission->photo_path = $request->photo_path;
        $mission->level = $request->level;
        $mission->user_id = 1;
        if($mission->save()) {
            return response()->json($mission, 201);
        }else{
            return response()->json(['message' => 'bad request'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Mission $mission
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($id)
    {
        $mission = Mission::with(['users', 'game']);
        return new MissionResource($mission);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        return view('test.edit_mission', compact('mission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $mission->update($request->all());
        return response()->json($mission, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();
        return response()->json(null, 204);
    }
}
