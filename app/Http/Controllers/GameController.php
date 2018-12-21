<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\GameRequest;
use App\Http\Resources\GameCollection;
use App\Http\Resources\Game as GameResource;
use App\Mission;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = new GameCollection(Game::all()->load(['challenges', 'missions']));
        return response($games)->header('Accept', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.new_game');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $mission = Mission::all();
        $game = new Game($request->except('_token'));

            $game->name = $request->name;
            $game->level = $request->level;
            $game->playersNo = $request->playersNo;
            $game->missionsNo = $request->missionsNo;
            $game->cost = $request->cost;
            $game->prize = $request->prize;
            $game->userId = '1';
            $game->save();

        if ($game->wasRecentlyCreated) {
            return response()->json($game, 201);
        } else {
            return redirect()->route('games.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Game $game
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Game $game)
    {
        return new GameResource($game);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
