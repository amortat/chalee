<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\Http\Resources\Challenge as ChallengeResource;
use App\Http\Resources\ChallengeCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*        $c = Challenge::all()->load('game.missions');*/
          $c = Challenge::with('game.missions')->withCount('users')->get();
        return new ChallengeCollection($c);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $challenge = new Challenge();
        $challenge->game_id = $request->game;
        $challenge->slug = str_slug($request->slug , '_');
        $challenge->user_id = Auth::guard('api')->id();
        $challenge->status = '0';

        if($challenge->save()){
            return response()->json($challenge, 201);
        }else{
            return response()->json(['message' => 'bad request'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        return response(new ChallengeResource($challenge))->header('Accept', 'application/json');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Challenge $challenge
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Challenge $challenge)
    {
        if($challenge->status != 0){
            return response()->json(['message', 'no denied change this challenge because it has a player']);
        }else {
            $challenge->delete();
            return redirect()->route('challenges.index');
        }
    }
}
