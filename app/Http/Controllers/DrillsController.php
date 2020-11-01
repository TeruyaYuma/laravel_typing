<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drill;
use Illuminate\Support\Facades\Auth;

class DrillsController extends Controller
{
    //登録一覧
    public function index() {
        $drills = Drill::all();

        return view('drills.index', compact('drills'));
    }
    //ユーザー別登録一覧
    public function mypage() {
        $drills = Auth::user()->drills()->get();
        return view('drills.mypage', compact('drills'));
    }

    public function new() {
        return view('drills.new');
    }
    //登録
    public function create(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'problem1' => 'required|string|max:255',
            'problem2' => 'string|nullable|max:255',
            'problem3' => 'string|nullable|max:255',
            'problem4' => 'string|nullable|max:255',
            'problem5' => 'string|nullable|max:255',
            'problem6' => 'string|nullable|max:255',
            'problem7' => 'string|nullable|max:255',
            'problem8' => 'string|nullable|max:255',
            'problem9' => 'string|nullable|max:255',
        ]);

        // モデルを使って、DBに登録する値をセット
        $drill = new Drill;

        Auth::user()->drills()->save($drill->fill($request->all()));

        return redirect('/drills/new')->with('flash_message', __('Registered.'));
    }
    //詳細画面
    public function show($id){
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        $drill = Drill::find($id);
        return view('drills.show', compact('drill'));
    }
    //登録編集画面
    public function edit($id){
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }
        
        $drill = Auth::user()->drills()->find($id);

        return view('drills.edit', ['drill' => $drill]);
    }
    //登録編集
    public function update(Request $request, $id){
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        $drill = Drill::find($id);
        $drill->fill($request->all())->save();

        return redirect('/drills/index')->with('flash_message', __('Registered.'));
    }
    //削除
    public function delete($id){
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }
        
        Auth::user()->drills()->find($id)->delete();

        return redirect('/drills/index')->with('flash_message', __('Deleted.'));
    }
}
