<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogFc extends Controller
{
  public function index(Request $request)
  {
    $blogs = Blog::paginate(9)->withQueryString();
    $data = compact('blogs');
    return view('front.blogs')->with($data);
  }
  public function blogByCategory(Request $request)
  {
    $category_slug = $request->segment(2);
    $category = BlogCategory::where('category_slug',$category_slug)->firstOrFail();
    $blogs = Blog::where('category_id',$category->id)->paginate(10)->withQueryString();
    $data = compact('category','blogs');
    return view('front.blogs')->with($data);
  }
  public function blogdetail(Request $request)
  {
    $slug = $request->segment(1);
    $blog = Blog::where('slug',$slug)->firstOrFail();
    $blogs = Blog::where('id','!=',$blog->id)->limit(10)->get();
    $category = BlogCategory::all();
    $data = compact('category','blogs','blog');
    return view('front.blog-detail')->with($data);
  }


}
