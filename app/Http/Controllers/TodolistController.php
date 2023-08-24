<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Todolist;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * $notebooks = Notebook:all
     * (
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application pages.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        $todolist = $user->todolist;

        $date = Carbon::now();
        $formatdate = Carbon::createFromDate($date)->format('Y-m-d');

        $count = Todolist::where('user_id','=',$id)->count();
        $today = Todolist::whereDate('due_date', Carbon::today()->format('Y-m-d'))->get();
        $tomorrow = Todolist::whereDate('due_date', Carbon::tomorrow()->format('Y-m-d'))->get();
        $more = Todolist::whereDate('due_date','>',Carbon::tomorrow()->format('Y-m-d'))->get();
        $overdue = Todolist::whereDate('due_date','<', Carbon::today()->format('Y-m-d'))->get();

        return view('pages.todolist', compact('todolist', 'count','formatdate','today', 'tomorrow', 'more', 'overdue'));
    }

    public function create(){
        return view('pages.create-task');
    }

    public function store(Request $request){
        $dataInput = $request->all();
        $user = Auth::user();
        $user->todolist()->create($dataInput);

        return redirect('/todolist');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $todolist = $user->todolist()->find($id);
        $todolist->delete();
        return redirect('/todolist');
    }

    public function complete(Request $request, $id)
    {
        $user = Auth::user();
        $todolist = $user->todolist()->find($id);
        $todolist->status= '1';
        $todolist->update($request->all());

        return redirect('/todolist');
    }
}
