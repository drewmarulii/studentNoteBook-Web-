<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use App\Models\Todolist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
        $notebooks = $user->notebook;
        $todolist = $user->todolist;

        $date = Carbon::now();
        $formatdate = Carbon::createFromDate($date)->format('Y-m-d');

        $counts = Notebook::where('user_id','=',$id)->count();
        $today = Todolist::whereDate('due_date', Carbon::today()->format('Y-m-d'))->get();
        $countask = Todolist::where('user_id','=',$id)->count();
        $overdue = Todolist::whereDate('due_date','<', Carbon::today()->format('Y-m-d'))->get();

        return view('pages.home', compact('notebooks', 'todolist' , 'counts', 'countask', 'formatdate', 'today', 'overdue'));
    }
}
