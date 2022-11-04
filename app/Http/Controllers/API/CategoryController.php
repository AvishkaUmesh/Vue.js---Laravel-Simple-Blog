<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use domain\Facades\Category\CategoryFacade;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryFacade::all();
        return response()->json([
            'status' => true,
            'message' => 'Categories Fetched Successfully',
            'data' => $data,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Category::create($request->all());
        // return response()->json('Category created', 201);

        // $cat =  CategoryFacade::store($request->all());
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Category Created Successfully',
        //     'data' => $cat,
        // ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Category::find($id);
        $cat = CategoryFacade::show($id);
        return response()->json([
            'status' => true,
            'message' => 'Category Fetched Successfully',
            'data' => $cat,
        ], 200);
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
        // // $category = Category::find($id);
        // // $category->update($request->all());
        // // return response()->json($category, 200);

        // $cat =  CategoryFacade::update($request->all(), $id);
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Category Updated Successfully',
        //     'data' => $cat,
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
        // Category::destroy($id);
        // return response()->json('Category deleted', 200);


        // $cat =  CategoryFacade::destroy($id);
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Category Deleted Successfully',
        //     'data' => $cat,
        // ], 200);
    }
}
