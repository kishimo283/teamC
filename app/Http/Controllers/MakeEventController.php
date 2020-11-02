<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class MakeEventController extends Controller
{
    /**
     *ホーム画面を表示する
     *
     *@return view
     */
    public function index() {
        $user = Auth::user();
        $events = Event::all();
        return view('MakeEvent', ['events' => $events, 'user' => $user]);
    }

    /**
     *イベント作成画面を表示する
     *
     *@return view
     */
    public function create() {
        $stop = Auth::user();
        if($stop == null) {
            return redirect(route('home'));
        }
        return view('CreateEvent');
    }

    /**
     *イベント新規作成機能
     *
     *
     */
    public function store(Request $request) {
        $inputs = $request->all();
        Event::create($inputs);
        return redirect(route('main'));
    }

    /**
     *イベント削除機能
     *
     */
    public function delete($id) {
        $stop = Auth::user();
        if($stop == null) {
            return redirect(route('home'));
        }
        
        try {
            Event::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        return redirect(route('main'));
    }

    /**
     *出欠確認画面を表示する
     *
     *@param int $id
     *@return view
     */
    public function attend($id) {
        $stop = Auth::user();
        if($stop == null) {
            return redirect(route('home'));
        }

        $event = Event::find($id);
        $students = $event->students()->orderBy('created_at','desc')->get();
        if(is_null($event)){
            return redirct(route('main'));
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