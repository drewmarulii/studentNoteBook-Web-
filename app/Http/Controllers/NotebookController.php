<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notebook;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotebookController extends Controller
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
        $notebooks = $user->notebook;

        $date = Carbon::now();
        $formatdate = Carbon::createFromDate($date)->format('d-m-Y');

        $counts = Notebook::where('user_id','=',$id)->count();

        return view('pages.notebook', compact('notebooks', 'counts', 'formatdate'));
    }


    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $dataInput = $request->all();
        $user = Auth::user();
        $user->notebook()->create($dataInput);
        return redirect('/notebook');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->where('id',$id)->first();
        return view('pages.edit')->with('notebook',$notebook);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->find($id);

        $notebook->update($request->all());

        return redirect('/notebook');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->find($id);
        $notebook->delete();
        return redirect('/notebook');
    }

    public function show($id)
    {
        $user = Auth::user();
        $notebook = $user->notebook()->where('id',$id)->first();
        return view('pages.show')->with('notebook',$notebook);
    }
}
