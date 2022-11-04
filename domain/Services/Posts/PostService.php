<?php

namespace domain\Services\Posts;

use App\Models\posts;

class PostService
{
    public function __construct()
    {
        $this->post = new posts();
    }

    public function all()
    {
        return $this->post->with('category')->get();
    }

    public function postsPaginate()
    {
        return $this->post->with('category')->paginate(5);
    }

    public function store($data, $image_name)
    {
        $data['image'] = $image_name;
        return $this->post->create($data);
    }

    public function show($id)
    {
        return $this->post->with('category')->findOrFail($id);
    }

    public function update($data, $id)
    {
        $post = $this->post->findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function updateImage($id, $image_name)
    {
        $data['image'] = $image_name;
        $post = $this->post->findOrFail($id);
        $post->update($data);
        return $post;
    }

    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $image = $post->image;
        if (file_exists(public_path('images/posts/' . $image))) {
            unlink(public_path('images/posts/' . $image));
        }
        $post->delete();
        return $post;
    }

    public function recentPosts()
    {
        return $this->post->with('category')->orderBy('id', 'desc')->take(4)->get();
    }

    public function getTrendingPosts()
    {
        return $this->post->with('category')->inRandomOrder()->take(4)->get();
    }

    public function getPostByCategory($id)
    {
        return $this->post->with('category')->where('category_id', $id)->paginate(5);
    }

    public function getPostBySearch($search)
    {
        return $this->post->with('category')->where('title', 'like', '%' . $search . '%')->get();
    }

    public function getPostsCount()
    {
        return $this->post->count();
    }
}
