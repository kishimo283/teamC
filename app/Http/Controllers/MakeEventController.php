<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Student;

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
     *イベント削除機能
     *
     */
    public function delete($id) {
        try {
            Event::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
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
        $students = $event->students()->orderBy('created_at','desc')->get();

        if(is_null($event)){
            return redirct(route('home'));
        }

        $absents = $students->count();

        return view('ShowAttend',[
            'event' => $event,
            'students' => $students,
            'absents' => $absents
        ]);
    }
    /**
     *出欠登録機能（保存）
     *
     *
     */
    public function form(Request $request) {
        $status = $request->all();
        Student::create($status);
        return redirect()->back();
    }
    /**
     *出欠取り消し機能
     *
     */
    public function cancel($id) {
        try {
            Student::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        return redirect()->back();
    }
}