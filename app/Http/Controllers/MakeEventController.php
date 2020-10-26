<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class MakeEventController extends Controller
{
    /**
     *ホーム画面を表示する
     *
     *@return view
     */
    public function index() {
        $events = Event::all();
        return view('MakeEvent', ['events' => $events]);
    }

    /**
     *イベント作成画面を表示する
     *
     *@return view
     */
    public function create() {
        return view('CreateEvent');
    }

    /**
     *イベント作成機能
     *
     *
     */
    public function store(Request $request) {
        $inputs = $request->all();
        Event::create($inputs);
        return redirect(route('home'));
    }

    /**
     *出欠確認画面を表示する
     *
     *@param int $id
     *@return view
     */
    public function attend($id) {
        $event = Event::find($id);

        if(is_null($event)){
            return redirct(route('home'));
        }

        return view('ShowAttend',['event' => $event]);
    }
}