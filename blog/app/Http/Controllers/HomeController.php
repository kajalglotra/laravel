<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\task;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

      public function index3(){
        return view('create_post');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        $id1 = Auth::user()->id;
         $tasks = DB::table('tasks')->where('user_id', '=', $id1)->paginate(3);

        return view('welcome', ['tasks' => $tasks]);
    }
    public function index2(Request $request)
    {
        $id1 = Auth::user()->id;
        $task=new task;
        $task->task=$request->input('names');
        $task->user_id=$id1;
        $task->save();
        return redirect('/home');
    }
     public function delete($id){
         task::findOrFail($id)->delete();
        return redirect()->back();
     }
     public function edit($id,Request $request){
        
           if ($request->isMethod('post')){
          $change=task::findOrFail($id);
          $change->task =$request->input('names2');
          $change->save();
          return redirect('/home');
        }
        else{
            return view("update_post");
        }
        }
}
