<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\posts;
use domain\Facades\Posts\PostsFacade;
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
        // return posts::with('category')->get();
        $posts =  PostsFacade::all();

        return response()->json([
            'status' => true,
            'message' => 'Posts Fetched Successfully',
            'data' => $posts,
        ], 200);
    }

    public function pagination()
    {
        $posts = PostsFacade::postsPaginate();

        return response()->json([
            'status' => true,
            'message' => 'Posts Fetched Successfully',
            'data' => $posts,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $post = posts::create($request->all());
        // return response()->json($post, 201);


        // return PostsFacade::store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return posts::with('category')->find($id);
        $post = PostsFacade::show($id);

        return response()->json([
            'status' => true,
            'message' => 'Post Fetched Successfully',
            'data' => $post,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        // $post = posts::find($id);
        // $post->update($request->all());
        // return response()->json($post, 200);


        // $post = PostsFacade::update($request->all(), $id);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post Updated Successfully',
        //     'post' => $post,
        // ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // posts::destroy($id);
        // return response()->json(null, 204);


        // $post =  PostsFacade::destroy($id);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Post Deleted Successfully',
        //     'post' => $post,
        // ], 200);
    }

    public function recentPosts()
    {
        $posts = PostsFacade::recentPosts();

        return response()->json([
            'status' => true,
            'message' => 'Posts Fetched Successfully',
            'data' => $posts,
        ], 200);
    }

    public function trendingPosts()
    {
        $posts = PostsFacade::getTrendingPosts();

        return response()->json([
            'status' => true,
            'message' => 'Posts Fetched Successfully',
            'data' => $posts,
        ], 200);
    }

    public function getPostByCategory($id)
    {
        $posts = PostsFacade::getPostByCategory($id);

        return response()->json([
            'status' => true,
            'message' => 'Posts Fetched Successfully',
            'data' => $posts,
        ], 200);
    }

    public function getPostBySearch($search)
    {
        $posts = PostsFacade::getPostBySearch($search);

        return response()->json([
            'status' => true,
            'message' => 'Posts Fetched Successfully',
            'data' => $posts,
        ], 200);
    }
}
