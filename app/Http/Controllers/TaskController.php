<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TaskController extends Controller
{
    //
    public function home(){
        $tasks = Todo::select('id','title')->where('completed','0')->get();
        return view("welcome",compact("tasks"));
    }


    /*
    *　タスク追加
    *　@param $request：POST送信されたタスク
    *  @return リダイレクト先
    */
    public function taskRegister(Request $request){
        if(empty($request->task)){
            return redirect('/');
        }
        $task = new Todo;
        $task->title = $request->task;
        $task->completed = 0;
        $task->save();

        return redirect('/');
    }


    /*
    *　タスク完了
    *　@param $request：POST送信されたタスク
    *  @return リダイレクト先
    */
    public function taskComplete(Request $request){
        Todo::where('id',$request->task)->update(['completed' => 1]);


        return redirect('/');
    }

}
