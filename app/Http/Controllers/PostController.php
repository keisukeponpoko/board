<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $board_id
     * @param  int  $thread_id
     * @return \Illuminate\Http\Response
     */
    public function index($board_id, $thread_id)
    {
        $thread = Thread::find($thread_id);
        $posts = Post::where('thread_id', $thread_id)->get();

        return view(
          'post.index',
          ['thread' => $thread, 'posts' => $posts]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $board_id
     * @param  int  $thread_id
     * @return \Illuminate\Http\Response
     */
    public function create($board_id, $thread_id)
    {
        $thread = Thread::find($thread_id);
        return view('post.create', ['thread' => $thread]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $board_id
     * @param  int  $thread_id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($board_id, $thread_id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required',
            'password' => 'required|max:50'
        ]);

        $post = new Post;

        $last_inner_post = Post::where('thread_id', $thread_id)->orderBy('id', 'desc')->first();
        $post->inner_id = $last_inner_post ? $last_inner_post->inner_id + 1 : 1;
        $post->thread_id = $thread_id;
        $post->name = $request->name;
        $post->comment = $request->comment;
        $post->password = \Hash::make($request->password);

        $post->ip_addr = $request->ip();
        $post->author_hash = crc32(\Hash::make($request->ip()));

        $post->thread_id = $thread_id;
        $post->save();

        return redirect(route('board.thread.post.index', [$board_id, $thread_id]));
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
     * @param  int  $board_id
     * @param  int  $thread_id
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
    public function edit($board_id, $thread_id, $post_id)
    {
        $post = Post::where('thread_id', $thread_id)->where('id', $post_id)->first();
        $thread = Thread::find($thread_id);

        return view('post.edit', ['thread' => $thread, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $board_id
     * @param  int  $thread_id
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $board_id, $thread_id, $post_id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'comment' => 'required',
            'password' => 'required'
        ]);

        $post = Post::find($post_id);

        if (!\Hash::check($request->password, $post->password)) {
            return redirect()->back()->withErrors(['passwordが違います'])->withInput();
        }

        $post->name = $request->name;
        $post->comment = $request->comment;

        $post->ip_addr = $request->ip();
        $post->author_hash = crc32(\Hash::make($request->ip()));
        $post->save();

        return redirect(route('board.thread.post.index', [$board_id, $thread_id]));
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
