<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBlogs()
    {
        //
        $query=request('query');
        $blogs=Blog::where('title', 'like', '%' . $query . '%')->latest()->with('user')->get();
        return response()->json(['blogs'=>$blogs]);
    }

    public function getBlog(Request $request){
        $blog=Blog::where('id',$request->id)->first();
        return response()->json(['blog'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBlog(Request $request)
    {
        $blog=new Blog();

        $new_blog=$blog->postBlog($request,'create');
        return response()->json($new_blog);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateBlog(Request $request)
    {
        $blog=new Blog();
        $update_blog=$blog->postblog($request,'update');
        return response()->json($update_blog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function deleteBlog(Request $request)
    {

        return Blog::destroy($request->id);
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
