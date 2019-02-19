<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();

        return response()->json(['status' => 'List posts', 'post' => $post], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $path = $request->file('image')->store('uploads', 'public');
        $post = Post::create([
            'title' => $request->get('title'),
            'anons' => $request->get('anons'),
            'text' => $request->get('text'),
//            'image' => $path,
//            'tags' => json_encode(explode(',', $request->get('tags'))),
//            'datatime' => $request->get('datatime'),
        ]);


        return response()->json([
            'status' => true,
            'post_id' => $post->id
        ], 201)->header('Content-Type', 'application/json');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        if ($post == null) {
            return response()->json(['status' => 'Post not found', 'message' => 'Post not found'],404);
        }
        return response()->json(['status' => 'View post', 'post' => $post],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        if (!empty($request->get('title'))) {
            $post->title = $request->get('title');
        }
        if (!empty($request->get('anons'))) {
            $post->anons = $request->get('anons');
        }
        if (!empty($request->get('text'))) {
            $post->text = $request->get('text');
        }
        if (!empty($request->get('tags'))) {
            $post->tags = json_encode(explode(',', $request->get('tags')));
        }
        if (!empty($request->get('datatime'))) {
            $post->datatime = $request->get('datatime');
        }

        if (!empty($request->file('image'))) {
            $path = $request->file('image')->store('uploads', 'public');
            $post->image = $path;
        }

        return response()->json(['status' => true, 'post' => $post], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::query()->find($id);

        if ($post == null) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['status' => true], 201);
    }
}
