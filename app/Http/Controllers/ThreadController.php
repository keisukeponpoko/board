<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Thread;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $board = Board::find($id);

        $boards = Board::all();
        
        $threads = Thread::withCount('posts')->where('board_id', $id)->get();
        return view('thread.index', ['boards' => $boards, 'board' => $board, 'threads' => $threads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $board = Board::find($id);
        return view('thread.create', ['board' => $board]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $request->validate([
          'name' => 'required|max:255'
        ]);

        $thread = new Thread;
        $thread->name = $request->name;
        $thread->board_id = $id;
        $thread->save();

        return redirect(route('board.thread.index', $id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
