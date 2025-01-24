<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\DefaultSeo;
use App\Models\Destination;
use App\Models\DestinationGallery;
use App\Models\DestinationPageContent;
use App\Models\DestinationPageFaq;
use App\Models\DestinationPageTabs;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Testimonial;
use App\Models\University;
use Illuminate\Http\Request;

class DestinationFc extends Controller
{
  public function index(Request $request)
  {
    $destinations = Destination::where(['status' => 1])->get();
    $data = compact('destinations');
    return view('front.destination')->with($data);
  }
  public function destinationDetail($destination_slug, Request $request)
  {
    $tabTitle = $request->segment(3);
    $tab_title = $tabTitle == '' ? 'overview' : $tabTitle;
    $tabTitleDet = DestinationPageTabs::where(['slug' => $tab_title])->first();
    $seg1 = $destination_slug;
    $c_destination = Destination::where(['slug' => $destination_slug])->first();

    $testimonials = Testimonial::where(['country' => $c_destination->country])->get();
    $photos = DestinationGallery::where(['destination_id' => $c_destination->id])->get();

    $author = Author::find($c_destination->author_id);

    $faqs = DestinationPageFaq::where(['page_id' => $c_destination->id])->get();

    if ($tabTitle != '') {
      $wrdseo = ['url' => 'destination-detail-page-tab'];
    } else {
      $wrdseo = ['url' => 'destination-detail-page'];
    }
    $dseo = DefaultSeo::where($wrdseo)->first();

    $page_url = url()->current();
    $title = $c_destination->page_name;
    $site = 'tutelagestudy.com';

    $tagArray = ['title' => $title, 'currentmonth' => date('M'), 'currentyear' => date('Y'), 'site' => $site];

    $meta_title = $c_destination->meta_title == '' ? $dseo->title : $c_destination->meta_title;
    $meta_title = replaceTag($meta_title, $tagArray);

    $meta_keyword = $c_destination->meta_keyword == '' ? $dseo->keyword : $c_destination->meta_keyword;
    $meta_keyword = replaceTag($meta_keyword, $tagArray);

    $page_content = $c_destination->page_content == '' ? $dseo->page_content : $c_destination->page_content;
    $page_content = replaceTag($page_content, $tagArray);

    $meta_description = $c_destination->meta_description == '' ? $dseo->description : $c_destination->meta_description;
    $meta_description = replaceTag($meta_description, $tagArray);

    $og_image_path = $c_destination->image_path == '' ? $dseo->ogimgpath : $c_destination->image_path;

    $otherexam = Destination::inRandomOrder('id')->where(['status' => 1])->where('id', '!=', $c_destination->id)->limit(10)->get();

    $tu = University::where(['status' => 1, 'country' => $c_destination->country])->get();
    $brochureUniversities = University::where(['country' => $c_destination->country])->where('brochure_path', '!=', null)->get();

    $tslug = $tabTitleDet->id;
    $whrco = ['page_id' => $c_destination->id, 'tab_id' => $tslug];
    $content = DestinationPageContent::where($whrco)->orderBy('priority', 'ASC')->get();
    $count_content = $content->count();
    $tabs = DestinationPageContent::with('getTab')->select('tab_id')->groupBy('tab_id')->where(['page_id' => $c_destination->id])->get();
    // printArray($tabs->toArray());
    // die;
    $otabs = DestinationPageContent::with('getTab')->select('tab_id')->groupBy('tab_id')->where(['page_id' => $c_destination->id])->where('tab_id', '!=', $tslug)->get();

    $allcat = BlogCategory::all();
    $allnews = Blog::limit(20)->get();

    $data = compact('c_destination', 'tabTitleDet', 'testimonials', 'faqs', 'meta_title', 'meta_keyword', 'meta_description', 'page_content', 'og_image_path', 'otherexam', 'tu', 'site', 'tabs', 'otabs', 'allcat', 'allnews', 'page_url', 'brochureUniversities', 'tab_title', 'seg1', 'photos', 'author', 'content', 'count_content');

    return view('front.destination-details')->with($data);
  }
  public function getContent(Request $request)
  {
    $tab_title = $request->tab_title;
    $tabTitleDet = DestinationPageTabs::where(['slug' => $tab_title])->first();

    $c_destination = Destination::where(['slug' => $request->seg1])->first();

    $tslug = $tabTitleDet->id;
    $whrco = ['page_id' => $c_destination->id, 'tab_id' => $tslug];
    $content = DestinationPageContent::where($whrco)->orderBy('priority', 'ASC')->get();
    $count_content = $content->count();
    $output = '';
    foreach ($content as $c) {
      $output .= '<div class="ps-product__box mb-20" id="' . slugify($c->title) . '">
                <div class="ps-tabs">
                  <div class="ps-tab active">
                    <div class="ps-document">' . $c->tab_content . '</div>
                  </div>
                </div>
              </div>';
    }
    return $output;
  }
  public function getOverview(Request $request)
  {
    $c_destination = Destination::where(['slug' => $request->seg1])->first();
    $output = '';
    if ($request->seg2 == null) {
      $output .= '<div class="ps-product__box">
      <div class="ps-document">
        <center>
          <img src="' . asset($c_destination->image_path) . '"
            alt="' . $c_destination->page_name . '" class="img-responsive">
        </center>
      </div>
    </div>
    <div class="ps-product__box mb-20">
      <div class="ps-tabs">
        <div class="ps-tab active">
          <div class="ps-document">' . $c_destination->top_description . '</div>
        </div>
      </div>
    </div>';
    }
    return $output;
  }
  public function getTableContent(Request $request)
  {
    $tab_title = $request->tab_title;
    $tabTitleDet = DestinationPageTabs::where(['slug' => $tab_title])->first();

    $c_destination = Destination::where(['slug' => $request->seg1])->first();

    $tslug = $tabTitleDet->id;
    $whrco = ['page_id' => $c_destination->id, 'tab_id' => $tslug];
    $content = DestinationPageContent::where($whrco)->orderBy('priority', 'ASC')->get();
    $count_content = $content->count();
    $output = '';
    if ($count_content > 1) {
      $output .= '<div class="ps-product__box mb-20">
      <aside class="widget widget_best-sale">
        <h3 class="widget-title"> Table of Contents <span style="float:right;">
            <button class="btn btn-outline-info tglBtn hide-this">+</button>
            <button class="btn btn-outline-info tglBtn">-</button>
          </span>
        </h3>
        <div class="widget__content tbl-cntnt " id="tblCDiv">
          <ol style="list-style:circle;">';
      foreach ($content as $t) {
        $output .= '<li><a href="#' . slugify($t->title) . '">' . $t->title . '</a></li>';
      }
      $output .= '</ol>
        </div>
      </aside>
    </div>';
    }
    return $output;
  }
  public function getAuthor(Request $request)
  {
    $c_destination = Destination::where(['slug' => $request->seg1])->first();

    $author = Author::find($c_destination->author_id);
    $output = '';
    if ($c_destination->author_id != null) {
      $output .= '<div class="ps-page--product" style="background-color:white;">
      <div class="ps-container pt-10" id="topuniversities">
        <div class="ps-section--default pb-2" style="margin-bottom:0px">
          <div class="ps-section__header" style="margin-bottom:0px; padding-bottom:0px; border:0px">
            <div class="row author">
              <div class="col-md-2">
                <div class="img-div">
                  <img src="' . asset($author->profile_pic_path) . '"
                    alt="' . $author->name . '"><i class="fa fa-check-circle"></i>
                </div>
              </div>
              <div class="col-md-10">
                <div class="cont-div">
                  <h6>' . $author->name . '</h6>
                  <span>Content Curator | Updated on - ' . getFormattedDate($c_destination->updated_at, 'M d, Y') . '</span>';
      if ($author->shortnote != null) {
        $output .= '<p>' . $author->shortnote . '</p>
                  <br>';
      }
      $output .= '<a style="float:right" href="' . url("author/" . $author->slug) . '/"
                    class="bio-btn">Read Full Bio</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>';
    }
    return $output;
  }
  public function getTestimonial(Request $request)
  {
    $c_destination = Destination::where(['slug' => $request->seg1])->first();
    $testimonials = Testimonial::where(['country' => $c_destination->country])->get();

    $output = '';
    if ($testimonials->count() > 0) {
      $output .= '<div class="ps-section--vendor">
      <div class="container-fluid">
        <div class="ps-section__header pb-0">
          <p class="mb-2">WHAT STUDENTS SAY ABOUT US</p>
          <h4>' . $c_destination->page_name . ' Testimonials</h4>
        </div>
        <div class="ps-section__content">
          <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true"
            data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">';
      foreach ($testimonials as $test) {
        $imgSrc = $test->image != null ? asset($test->image) : asset('front/user-tesimonial-photo.jpg');
        $output .= '<div class="ps-block--testimonial pt-3 pb-3 pl-5 pr-5">
              <div class="ps-block__header"><img src="' . $imgSrc . '" alt="MBBS Abroad Testimonial"></div>
              <div class="ps-block__content pt-5 pb-3">
                <i class="icon-quote-close"></i>
                <span class="sph">' . $test->name . '</span>
                <p>' . $test->review . '</p>
              </div>
            </div>';
      }
      $output .= '</div></div></div></div>';
    }
    return $output;
  }
  public function getPhotos(Request $request)
  {
    $c_destination = Destination::where(['slug' => $request->seg1])->first();
    $photos = DestinationGallery::where(['destination_id' => $c_destination->id])->get();

    $output = '';
    if ($photos->count() > 0) {
      $output .= '<div class="ps-section--vendor pt-0">
      <div class="container-fluid">
        <div class="ps-section__header pb-0">
          <h4>Photo Gallery</h4>
          <p class="mb-5">
            ' . $c_destination->page_name . ' Practical Training, Classrooms, Indian Food, Hostel, Indian
            Students
          </p>
        </div>
        <div class="row">';
      foreach ($photos as $row) {
        $output .= '<div class="col-md-3 col-sm-6 col-6 mb-5">
            <img src="' . asset($row->image_path) . '" alt="' . $row->title . '" class="img-fluid rounded-lg"
              style="height: 100%;">
          </div>';
      }
      $output .= '</div>
      </div>';
    }
    return $output;
  }
}
