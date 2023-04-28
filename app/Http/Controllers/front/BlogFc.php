<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\DefaultSeo;
use App\Models\Destination;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class BlogFc extends Controller
{
  public function index(Request $request)
  {
    $categories = NewsCategory::all();
    $blogs = News::paginate(20)->withQueryString();
    $data = compact('blogs','categories');
    return view('front.blogs')->with($data);
  }
  public function blogByCategory($category_slug,Request $request)
  {
    $categories = NewsCategory::all();
    $category = NewsCategory::where('slug',$category_slug)->firstOrFail();
    $blogs = News::where('cate_id',$category->id)->paginate(20)->withQueryString();

    $page_url = url()->current();

    $wrdseo = ['url' => 'newscategory'];
    $dseo = DefaultSeo::where($wrdseo)->first();

    $title = $category->cate_name;
    $site =  'tutelagestudy.com';
    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $category->meta_title == '' ? $dseo->title : $category->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $category->meta_keyword == '' ? $dseo->keyword : $category->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $category->page_content == '' ? $dseo->page_content : $category->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $category->meta_description == '' ? $dseo->description : $category->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = null;

    $data = compact('category','blogs','categories','page_url','dseo','title','site','meta_title','meta_keyword','page_content','meta_description','og_image_path');
    return view('front.blog-by-category')->with($data);
  }
  public function blogdetail(Request $request)
  {
    $slug = $request->segment(1);
    $blog = News::where('slug',$slug)->firstOrFail();
    $blogs = News::where('id','!=',$blog->id)->limit(10)->get();
    $categories = NewsCategory::all();
    $destinations = Destination::where('status','1')->offset('0')->limit('8')->get();

    $page_url = url()->current();

    $wrdseo = ['url' => 'newsdetailpage'];
    $dseo = DefaultSeo::where($wrdseo)->first();

    $sub_slug = $blog->headline;
    $category = str_replace('-', ' ', $blog->cate_slug);
    $site = 'tutelagestudy.com';

    $tagArray = ['title' => $sub_slug, 'category' => $category, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $blog->meta_title == '' ? $dseo->title : $blog->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $blog->meta_keyword == '' ? $dseo->keyword : $blog->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $blog->page_content == '' ? $dseo->page_content : $blog->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $blog->meta_description == '' ? $dseo->description : $blog->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $blog->imgpath == '' ? $dseo->ogimgpath : $blog->imgpath;

    $data = compact('categories','blogs','blog','destinations','page_url','dseo','sub_slug','site','meta_title','meta_keyword','page_content','meta_description','og_image_path');
    return view('front.blog-detail')->with($data);
  }


}
