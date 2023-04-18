<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function showAll()
    {
        $games = Game::all();
        return view('games', compact('games'));
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $inputs = $request->all();
            unset($inputs['_token']);

            DB::table('games')->insert($inputs);
            Session::flash('success', 'Game has been Added!');

            return redirect('/games');
        } else {
            return view('addgame');
        }
    }

    public function edit(Request $request, $id) {
        if ($request->isMethod('post')) {           
            $inputs = $request->all();
            unset($inputs['_token']);    

            DB::table('games')->where('id', $id)->update($inputs);
            Session::flash('success', 'Game has been Updated!');

            return redirect('/games');
        } else {           
            $game = Game::find($id);
        return view('editgame', compact('game'));
        }
    }
    public function deleteGame($id) {
   
        $game = Game::find($id);
        $game->delete();

        Session::flash('success', 'Game has been Deleted!');

        return redirect('/games');
    }

    public function reset()
    {
        DB::statement('ALTER TABLE games AUTO_INCREMENT = 1');
        Session::flash('success', 'Game IDs have been reset.');
        return redirect('/games');
    }
}