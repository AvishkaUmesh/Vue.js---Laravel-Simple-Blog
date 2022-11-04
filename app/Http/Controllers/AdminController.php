<?php

namespace App\Http\Controllers;

use App\Models\posts;
use domain\Facades\Category\CategoryFacade;
use domain\Facades\Posts\PostsFacade;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $postCount = PostsFacade::getPostsCount();
        $categoryCount = CategoryFacade::getCategoryCount();
        return view('admin.dashboard', compact('postCount', 'categoryCount'));
    }

    //---------------------category-----------------------

    public function addCategoryPage()
    {
        return view('admin.category.addCategory');
    }

    public function StoreCategory(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $cat =  CategoryFacade::store($request->all());

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.addCategoryPage')->with($notification);
    }

    public function allCategories()
    {
        $categories = CategoryFacade::all();
        return view('admin.category.allCategories', compact('categories'));
    }

    public function deleteCategory($id)
    {
        $cat = CategoryFacade::destroy($id);
        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.allCategories')->with($notification);
    }

    public function showCategory($id)
    {
        $cat = CategoryFacade::show($id);
        return view('admin.category.editCategory', compact('cat'));
    }

    public function updateCategory(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $cat = CategoryFacade::update($request->all(), $id);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.allCategories')->with($notification);
    }


    //---------------------end category-----------------------


    //---------------------post-----------------------

    public function addPostPage()
    {
        $categories = CategoryFacade::all();
        return view('admin.posts.addPosts', compact('categories'));
    }

    public function storePost(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|unique:posts',
            'body' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'category_id' => 'required'
        ]);

        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/posts'), $image_name);

        $post = PostsFacade::store($request->all(), $image_name);

        $notification = array(
            'message' => 'Post Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.addPostPage')->with($notification);
    }

    public function allPosts()
    {
        $posts = PostsFacade::all();
        return view('admin.posts.allPosts', compact('posts'));
    }

    public function deletePost($id)
    {
        $post = PostsFacade::destroy($id);
        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.allPosts')->with($notification);
    }

    public function showPost($id)
    {
        $post = PostsFacade::show($id);
        $categories = CategoryFacade::all();
        return view('admin.posts.editPost', compact('post', 'categories'));
    }

    public function updatePost(Request $request, $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',

            'category_id' => 'required'
        ]);

        $post = PostsFacade::update($request->all(), $id);

        $notification = array(
            'message' => 'Post Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.allPosts')->with($notification);
    }

    public function updatePostImage(Request $request, $id)
    {
        $validateData = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);


        $post = posts::findOrFail($id);
        $image = $post->image;
        if (file_exists(public_path('images/posts/' . $image))) {
            unlink(public_path('images/posts/' . $image));
        }

        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/posts'), $image_name);

        $post = PostsFacade::updateImage($id, $image_name);

        $notification = array(
            'message' => 'Post Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.allPosts')->with($notification);
    }

    //---------------------end post-----------------------

}
