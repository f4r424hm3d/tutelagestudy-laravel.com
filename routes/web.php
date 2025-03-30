<?php

use App\Http\Controllers\admin\AddressC;
use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\admin\AdminLogin;
use App\Http\Controllers\admin\AuthorC;
use App\Http\Controllers\admin\CourseCategoryC;
use App\Http\Controllers\admin\CourseModeC;
use App\Http\Controllers\admin\CourseSpecializationC;
use App\Http\Controllers\admin\DefaultSeoC;
use App\Http\Controllers\admin\DestinationC;
use App\Http\Controllers\admin\DestinationContentC;
use App\Http\Controllers\admin\DestinationGalleryC;
use App\Http\Controllers\admin\DestinationPageFaqC;
use App\Http\Controllers\admin\DestinationTabC;
use App\Http\Controllers\admin\ExamC;
use App\Http\Controllers\admin\ExamPageC;
use App\Http\Controllers\admin\ExamPageContentC;
use App\Http\Controllers\admin\ExamPageFaqC;
use App\Http\Controllers\admin\InstituteTypeC;
use App\Http\Controllers\admin\LevelC;
use App\Http\Controllers\admin\BlogC;
use App\Http\Controllers\admin\BlogCategoryC;
use App\Http\Controllers\admin\BlogContentC;
use App\Http\Controllers\admin\BlogFaqC;
use App\Http\Controllers\admin\ExamPaperC;
use App\Http\Controllers\admin\ExamTypeC;
use App\Http\Controllers\admin\ExamTypeContentC;
use App\Http\Controllers\admin\ExamTypeFaqC;
use App\Http\Controllers\admin\ExamTypeYearC;
use App\Http\Controllers\admin\ExamTypeYearContentC;
use App\Http\Controllers\admin\ExamTypeYearFaqC;
use App\Http\Controllers\admin\ExamTypeYearPaperC;
use App\Http\Controllers\admin\PaperContentC;
use App\Http\Controllers\admin\PaperFaqC;
use App\Http\Controllers\admin\ProgramC;
use App\Http\Controllers\admin\SeoC;
use App\Http\Controllers\admin\ServiceC;
use App\Http\Controllers\admin\ServiceContentC;
use App\Http\Controllers\admin\StudentC;
use App\Http\Controllers\admin\StudyModeC;
use App\Http\Controllers\admin\TestimonialC;
use App\Http\Controllers\admin\UniversityC;
use App\Http\Controllers\admin\UniversityFaqC;
use App\Http\Controllers\admin\UniversityGalleryC;
use App\Http\Controllers\admin\UniversityOverviewC;
use App\Http\Controllers\admin\UniversityVideoGalleryC;
use App\Http\Controllers\admin\UploadFilesC;
use App\Http\Controllers\admin\UserC;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CurrencyConverterController;
use App\Http\Controllers\front\AboutFc;
use App\Http\Controllers\front\AuthorFc;
use App\Http\Controllers\front\BlogFc;
use App\Http\Controllers\front\ContactFc;
use App\Http\Controllers\front\DestinationFc;
use App\Http\Controllers\front\ExamFc;
use App\Http\Controllers\front\ExamPaperDownloadFc;
use App\Http\Controllers\front\ExamPaperFc;
use App\Http\Controllers\front\HomeFc;
use App\Http\Controllers\front\InquiryController;
use App\Http\Controllers\front\ServiceFc;
use App\Http\Controllers\front\TestFc;
use App\Http\Controllers\front\UniversityFc;
use App\Http\Controllers\front\UniversityProfileFc;
use App\Http\Controllers\sitemap\SitemapController;
use App\Http\Controllers\student\StudentFc;
use App\Http\Controllers\student\StudentLoginFc;
use App\Models\Destination;
use App\Models\Exam;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ExamType;
use App\Models\University;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/run-storage-link', function () {
  \Illuminate\Support\Facades\Artisan::call('storage:link');
  return 'Storage link created!';
});

//Reoptimized class loader:
Route::get('/optimize/', function () {
  $exitCode = Artisan::call('optimize:clear');
  return '<h1>Reoptimized class loader</h1>';
});
Route::get('/f/optimize/', function () {
  $exitCode = Artisan::call('optimize:clear');
  return true;
});

//For MIgrate:
Route::get('/migrate/', function () {
  $exitCode = Artisan::call('migrate');
  return '<h1>Migrated</h1>';
});
Route::get('/f/migrate/', function () {
  $exitCode = Artisan::call('migrate');
  return true;
});

/* FRONT ROUTES */
Route::get('/', [HomeFc::class, 'index']);
Route::get('/home/', [HomeFc::class, 'index']);
Route::get('/about-us/', [AboutFc::class, 'index']);
Route::get('/contact-us/', [ContactFc::class, 'index']);
Route::get('/term-and-condition/', [HomeFc::class, 'termsConditions']);
Route::get('/privacy-policy/', [HomeFc::class, 'privacyPolicy']);

Route::get('/currency-converter/', [TestFc::class, 'index']);
Route::get('/convert-currency', [CurrencyConverterController::class, 'convert']);
Route::get('/currency', function () {
  return view('currency'); // Ensure the Blade file exists
});
Route::get('/currencies', [CurrencyConverterController::class, 'getCurrencies']);

$blogs = Blog::all();
foreach ($blogs as $row) {
  Route::get('blog/' . $row->slug . '/', function () use ($row) {
    return redirect('blog/' . $row->getCategory->slug . '/' . $row->slug . '/', 301);
  });
  Route::get($row->slug . '/', function () use ($row) {
    return redirect('blog/' . $row->getCategory->slug . '/' . $row->slug . '/', 301);
  });
}

// Define your broken URLs and their new redirects
$redirects = [
  '/list-medical-school-in-malaysia/' => '/blog/mbbs-abroad/best-private-and-public-medical-schools-in-malaysia/',
  '/top-private-medical-colleges-bangladesh/' => '/blog/mbbs-abroad/top-private-medical-colleges-in-bangladesh/',
  '/blog/mbbs-abroad/countries-for-indian-students-to-study-mbbs-abroad/' => '/blog/mbbs-abroad/top-15-countries-offering-affordable-mbbs-for-indian-students/',
];

foreach ($redirects as $oldUrl => $newUrl) {
  Route::get($oldUrl, function () use ($newUrl) {
    return redirect($newUrl, 301);
  });
}

Route::get('/blog/', [BlogFc::class, 'index'])->name('blog');
Route::get('blog/{category_slug}', [BlogFc::class, 'blogByCategory'])->name('blog.category');
Route::get('blog/{category_slug}/{slug}', [BlogFc::class, 'blogdetail'])->name('blog.detail');

Route::get('/mbbs-in-abroad/', [HomeFc::class, 'mbbsAbroad']);

Route::get('/destinations/', [DestinationFc::class, 'index'])->name('destinations');
Route::get('/destinations/{destination_slug}/', [DestinationFc::class, 'destinationDetail'])->name('destination.detail');

Route::get('/remove-filter/', [UniversityFc::class, 'removeFilter']);

Route::get('/services/', [ServiceFc::class, 'index']);
Route::get('/services/{slug}/', [ServiceFc::class, 'serviceDetail']);

$exams = Exam::all();
foreach ($exams as $row) {
  Route::get('/' . $row->exam_slug . '/', [ExamFc::class, 'examPage']);
  Route::get('/' . $row->exam_slug . '/{slug}' . '/', [ExamFc::class, 'examPageDetail']);
}

Route::get('author/{slug}/', [AuthorFc::class, 'index']);

Route::post('/inquiry/submit-university-inquiry/', [InquiryController::class, 'universityIniquiry']);

Route::get('/mbbs-abroad-counselling/', [InquiryController::class, 'mbbs']);
Route::post('/inquiry/submit-mbbs-inquiry/', [InquiryController::class, 'submitMbbsInquiry']);

Route::get('/neet-counselling/', [InquiryController::class, 'neet']);
Route::post('/inquiry/submit-neet-inquiry/', [InquiryController::class, 'submitNeetInquiry']);

Route::post('/inquiry/get-brochure/', [InquiryController::class, 'submitBrochureInquiry']);

Route::post('/inquiry/download-brochure/', [InquiryController::class, 'submitDownloadBrochureInquiry']);

Route::get('/thank-you/', [InquiryController::class, 'thankyou']);

Route::get('/form/getCountryCode/', [InquiryController::class, 'getCountryCode']);
Route::get('/form/getCountry/', [InquiryController::class, 'getCountry']);

$universities2 = University::all();
foreach ($universities2 as $row) {
  Route::get('medical-universities/' . $row->uname . '/', [UniversityProfileFc::class, 'index']);
  Route::get('medical-universities/' . $row->uname . '/gallery', [UniversityProfileFc::class, 'gallery']);
  Route::get($row->country_slug . '/' . $row->uname . '/', function () use ($row) {
    return redirect('medical-universities/' . $row->uname . '/', 301);
  });
}

$destinations = Destination::all();
foreach ($destinations as $row) {
  Route::get($row->slug, function () use ($row) {
    return redirect('destinations/' . $row->slug . '/', 301);
  });
}



Route::get('/medical-universities/', [UniversityFc::class, 'index']);
Route::get('/medical-universities/{destination_slug}', [UniversityFc::class, 'universitybyCountry']);

Route::get('/university/remove-filter/', [UniversityFc::class, 'removeFilter']);

Route::get('/downloads/', [ExamPaperFc::class, 'index']);
Route::get('/get-exam-types/', [ExamPaperFc::class, 'getExamTypes']);
Route::get('/get-papers/', [ExamPaperFc::class, 'getPapers']);
Route::post('/download/submit-form/', [ExamPaperFc::class, 'submitForm'])->name('inquiry.download.paper');

// Route::get('/downloads/', function () {
//   return view('front.downloads');
// });

// $universities = University::select('country_slug')->groupBy('country_slug')->get();
// foreach ($universities as $row) {
//   Route::get('/medical-universities-in-' . $row->country_slug . '/', [UniversityFc::class, 'universitybyCountry']);
// }

/* STUDENT ROUTES BEFORE LOGIN */
Route::middleware(['studentLoggedOut'])->group(function () {
  Route::get('/sign-up', [StudentLoginFc::class, 'signup']);
  Route::post('/sign-up', [StudentLoginFc::class, 'register']);
  Route::get('/sign-in', [StudentLoginFc::class, 'login']);
  Route::post('/login', [StudentLoginFc::class, 'signin']);
  Route::get('/confirmed-email', [StudentLoginFc::class, 'confirmedEmail']);
  Route::post('/submit-email-otp', [StudentLoginFc::class, 'submitOtp']);
  Route::get('/account/password/reset', [StudentLoginFc::class, 'viewForgetPassword']);
  Route::post('/forget-password', [StudentLoginFc::class, 'forgetPassword']);
  Route::get('/forget-password/email-sent', [StudentLoginFc::class, 'emailSent']);
  Route::get('/email-login', [StudentLoginFc::class, 'emailLogin']);
  Route::get('/password/reset', [StudentLoginFc::class, 'viewResetPassword']);
  Route::post('/reset-password', [StudentLoginFc::class, 'resetPassword']);
  Route::get('/account/invalid_link', [StudentLoginFc::class, 'invalidLink']);
});
/* STUDENT ROUTES AFTER LOGIN */
Route::middleware(['studentLoggedIn'])->group(function () {
  Route::prefix('/student')->group(function () {
    Route::prefix('profile')->group(function () {
      Route::get('', [StudentFc::class, 'profile']);
      Route::post('/update', [StudentFc::class, 'updateProfile']);
    });
    Route::get('/change-password', [StudentFc::class, 'viewChangePassword']);
    Route::post('/change-password', [StudentFc::class, 'changePassword']);
    Route::get('/logout', function () {
      session()->forget('studentLoggedIn');
      session()->forget('student_id');
      return redirect('sign-in');
    });
  });
});

/* ADMIN ROUTES BEFORE LOGIN */
Route::middleware(['adminLoggedOut'])->group(function () {
  Route::prefix('/admin')->group(function () {
    Route::get('/login/', [AdminLogin::class, 'index']);
    Route::post('/login/', [AdminLogin::class, 'login']);
    Route::get('/account/password/reset', [AdminLogin::class, 'viewForgetPassword']);
    Route::post('/forget-password', [AdminLogin::class, 'forgetPassword']);
    Route::get('/forget-password/email-sent', [AdminLogin::class, 'emailSent']);
    Route::get('/email-login', [AdminLogin::class, 'emailLogin']);
    Route::get('/password/reset', [AdminLogin::class, 'viewResetPassword']);
    Route::post('/reset-password', [AdminLogin::class, 'resetPassword']);
    Route::get('/account/invalid_link', [AdminLogin::class, 'invalidLink']);
  });
});
/* ADMIN ROUTES AFTER LOGIN */
Route::middleware(['adminLoggedIn'])->group(function () {
  Route::get('/admin/logout/', function () {
    session()->forget('adminLoggedIn');
    return redirect('admin/login');
  });
  Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index']);
    Route::get('/dashboard/', [AdminDashboard::class, 'index']);
    Route::get('/profile/', [AdminDashboard::class, 'profile']);
    Route::post('/update-profile/', [AdminDashboard::class, 'updateProfile']);

    Route::prefix('/destinations')->group(function () {
      Route::get('', [DestinationC::class, 'index']);
      Route::post('/store/', [DestinationC::class, 'store']);
      Route::get('/delete/{id}/', [DestinationC::class, 'delete']);
      Route::get('/update/{id}/', [DestinationC::class, 'index']);
      Route::post('/update/{id}/', [DestinationC::class, 'update']);
    });
    Route::prefix('/destination-content/')->group(function () {
      Route::get('/delete/{id}/', [DestinationContentC::class, 'delete']);
      Route::get('{page_id}/{tab_id?}/', [DestinationContentC::class, 'index']);
      Route::post('store/', [DestinationContentC::class, 'store']);
      Route::get('{page_id}/{tab_id}/update/{id}/', [DestinationContentC::class, 'index']);
      Route::post('update/{id}/', [DestinationContentC::class, 'update']);
    });
    Route::prefix('/destination-gallery/')->group(function () {
      Route::get('/delete/{id}/', [DestinationGalleryC::class, 'delete']);
      Route::get('{destination_id}/', [DestinationGalleryC::class, 'index']);
      Route::post('store/', [DestinationGalleryC::class, 'store']);
      Route::get('{destination_id}/update/{id}/', [DestinationGalleryC::class, 'index']);
      Route::post('update/{id}/', [DestinationGalleryC::class, 'update']);
    });
    Route::prefix('/destination-faq/')->group(function () {
      Route::get('/delete/{id}/', [DestinationPageFaqC::class, 'delete']);
      Route::get('{page_id}/', [DestinationPageFaqC::class, 'index']);
      Route::post('store/', [DestinationPageFaqC::class, 'store']);
      Route::get('{page_id}/update/{id}/', [DestinationPageFaqC::class, 'index']);
      Route::post('update/{id}/', [DestinationPageFaqC::class, 'update']);
    });
    Route::prefix('/destination-tabs')->group(function () {
      Route::get('', [DestinationTabC::class, 'index']);
      Route::post('/store/', [DestinationTabC::class, 'store']);
      Route::get('/delete/{id}/', [DestinationTabC::class, 'delete']);
      Route::get('/update/{id}/', [DestinationTabC::class, 'index']);
      Route::post('/update/{id}/', [DestinationTabC::class, 'update']);
    });

    Route::prefix('/course-category')->group(function () {
      Route::get('', [CourseCategoryC::class, 'index']);
      Route::post('/store/', [CourseCategoryC::class, 'store']);
      Route::get('/delete/{id}/', [CourseCategoryC::class, 'delete']);
      Route::get('/update/{id}/', [CourseCategoryC::class, 'index']);
      Route::post('/update/{id}/', [CourseCategoryC::class, 'update']);
      Route::post('/import/', [CourseCategoryC::class, 'import']);
    });
    Route::prefix('/course-specialization')->group(function () {
      Route::get('', [CourseSpecializationC::class, 'index']);
      Route::post('/store/', [CourseSpecializationC::class, 'store']);
      Route::get('/delete/{id}/', [CourseSpecializationC::class, 'delete']);
      Route::get('/update/{id}/', [CourseSpecializationC::class, 'index']);
      Route::post('/update/{id}/', [CourseSpecializationC::class, 'update']);
      Route::post('/import/', [CourseSpecializationC::class, 'import']);
      Route::get('/export/', [CourseSpecializationC::class, 'export']);
      Route::get('/get-by-category/', [CourseSpecializationC::class, 'getByCategory']);
    });
    Route::prefix('/programs')->group(function () {
      Route::get('', [ProgramC::class, 'index']);
      Route::post('/store/', [ProgramC::class, 'store']);
      Route::get('/delete/{id}/', [ProgramC::class, 'delete']);
      Route::get('/update/{id}/', [ProgramC::class, 'index']);
      Route::post('/update/{id}/', [ProgramC::class, 'update']);
      Route::post('/import/', [ProgramC::class, 'import']);
      Route::get('/get-by-spc-and-cat', [ProgramC::class, 'getBySpcCat']);
    });
    Route::prefix('/levels')->group(function () {
      Route::get('', [LevelC::class, 'index']);
      Route::post('/store/', [LevelC::class, 'store']);
      Route::get('/delete/{id}/', [LevelC::class, 'delete']);
      Route::get('/update/{id}/', [LevelC::class, 'index']);
      Route::post('/update/{id}/', [LevelC::class, 'update']);
      Route::post('/import/', [LevelC::class, 'import']);
    });

    Route::prefix('/institute-types')->group(function () {
      Route::get('', [InstituteTypeC::class, 'index']);
      Route::post('/store/', [InstituteTypeC::class, 'store']);
      Route::get('/delete/{id}/', [InstituteTypeC::class, 'delete']);
      Route::get('/update/{id}/', [InstituteTypeC::class, 'index']);
      Route::post('/update/{id}/', [InstituteTypeC::class, 'update']);
    });
    Route::prefix('/study-modes')->group(function () {
      Route::get('', [StudyModeC::class, 'index']);
      Route::post('/store/', [StudyModeC::class, 'store']);
      Route::get('/delete/{id}/', [StudyModeC::class, 'delete']);
      Route::get('/update/{id}/', [StudyModeC::class, 'index']);
      Route::post('/update/{id}/', [StudyModeC::class, 'update']);
    });
    Route::prefix('/course-modes')->group(function () {
      Route::get('', [CourseModeC::class, 'index']);
      Route::post('/store/', [CourseModeC::class, 'store']);
      Route::get('/delete/{id}/', [CourseModeC::class, 'delete']);
      Route::get('/update/{id}/', [CourseModeC::class, 'index']);
      Route::post('/update/{id}/', [CourseModeC::class, 'update']);
    });
    Route::prefix('/university')->group(function () {
      Route::get('add', [UniversityC::class, 'add']);
      Route::get('', [UniversityC::class, 'index']);
      Route::post('/store/', [UniversityC::class, 'store']);
      Route::get('/delete/{id}/', [UniversityC::class, 'delete']);
      Route::get('/update/{id}/', [UniversityC::class, 'index']);
      Route::post('/update/{id}/', [UniversityC::class, 'update']);
      Route::post('/import/', [UniversityC::class, 'import']);
    });
    Route::prefix('/university-overview')->group(function () {
      Route::get('/get-data', [UniversityOverviewC::class, 'getData']);
      Route::get('/get-position', [UniversityOverviewC::class, 'getPosition']);
      Route::get('/delete/{id}', [UniversityOverviewC::class, 'delete']);
      Route::post('/store', [UniversityOverviewC::class, 'store']);
      Route::get('/{university_id}/', [UniversityOverviewC::class, 'index']);
      Route::get('{university_id}/update/{id}', [UniversityOverviewC::class, 'index']);
      Route::post('{university_id}/update/{id}', [UniversityOverviewC::class, 'update']);
    });
    Route::prefix('/university-faqs/')->group(function () {
      Route::get('/get-data', [UniversityFaqC::class, 'getData']);
      Route::get('/delete/{id}', [UniversityFaqC::class, 'delete']);
      Route::post('/store', [UniversityFaqC::class, 'store']);
      Route::get('/{university_id}/', [UniversityFaqC::class, 'index']);
      Route::get('{university_id}/update/{id}', [UniversityFaqC::class, 'index']);
      Route::post('{university_id}/update/{id}', [UniversityFaqC::class, 'update']);
    });
    Route::prefix('/university-gallery')->group(function () {
      Route::get('/{university_id}', [UniversityGalleryC::class, 'index']);
      Route::post('/{university_id}/store', [UniversityGalleryC::class, 'store']);
      Route::get('/delete/{id}/', [UniversityGalleryC::class, 'delete']);
      Route::get('/{university_id}/update/{id}/', [UniversityGalleryC::class, 'index']);
      Route::post('/{university_id}/update/{id}/', [UniversityGalleryC::class, 'update']);
    });
    Route::prefix('/university-video-gallery')->group(function () {
      Route::get('/{university_id}', [UniversityVideoGalleryC::class, 'index']);
      Route::post('/{university_id}/store', [UniversityVideoGalleryC::class, 'store']);
      Route::get('/delete/{id}/', [UniversityVideoGalleryC::class, 'delete']);
      Route::get('/{university_id}/update/{id}/', [UniversityVideoGalleryC::class, 'index']);
      Route::post('/{university_id}/update/{id}/', [UniversityVideoGalleryC::class, 'update']);
    });

    Route::prefix('/services')->group(function () {
      Route::get('', [ServiceC::class, 'index']);
      Route::post('/store/', [ServiceC::class, 'store']);
      Route::get('/delete/{id}/', [ServiceC::class, 'delete']);
      Route::get('/update/{id}/', [ServiceC::class, 'index']);
      Route::post('/update/{id}/', [ServiceC::class, 'update']);
    });
    Route::prefix('/service-content')->group(function () {
      Route::get('/{service_id}/', [ServiceContentC::class, 'index']);
      Route::post('/{service_id}/store/', [ServiceContentC::class, 'store']);
      Route::get('/delete/{id}/', [ServiceContentC::class, 'delete']);
      Route::get('/{service_id}/update/{id}/', [ServiceContentC::class, 'index']);
      Route::post('/{service_id}/update/{id}/', [ServiceContentC::class, 'update']);
    });
    Route::prefix('/exams')->group(function () {
      Route::get('', [ExamC::class, 'index']);
      Route::post('/store/', [ExamC::class, 'store']);
      Route::get('/delete/{id}/', [ExamC::class, 'delete']);
      Route::get('/update/{id}/', [ExamC::class, 'index']);
      Route::post('/update/{id}/', [ExamC::class, 'update']);
    });
    Route::prefix('/exam-pages')->group(function () {
      Route::get('/{exam_id}/', [ExamPageC::class, 'index']);
      Route::post('/store/', [ExamPageC::class, 'store']);
      Route::get('/delete/{id}/', [ExamPageC::class, 'delete']);
      Route::get('/{exam_id}/update/{id}/', [ExamPageC::class, 'index']);
      Route::post('/update/{id}/', [ExamPageC::class, 'update']);
    });
    Route::prefix('/exam-page-contents')->group(function () {
      Route::get('/{page_id}/', [ExamPageContentC::class, 'index']);
      Route::post('/store/', [ExamPageContentC::class, 'store']);
      Route::get('/delete/{id}/', [ExamPageContentC::class, 'delete']);
      Route::get('/{page_id}/update/{id}/', [ExamPageContentC::class, 'index']);
      Route::post('/update/{id}/', [ExamPageContentC::class, 'update']);
    });
    Route::prefix('/exam-page-faqs')->group(function () {
      Route::get('/{page_id}/', [ExamPageFaqC::class, 'index']);
      Route::post('/store/', [ExamPageFaqC::class, 'store']);
      Route::get('/delete/{id}/', [ExamPageFaqC::class, 'delete']);
      Route::get('/{page_id}/update/{id}/', [ExamPageFaqC::class, 'index']);
      Route::post('/update/{id}/', [ExamPageFaqC::class, 'update']);
    });

    Route::prefix('/blog-category')->group(function () {
      Route::get('/', [BlogCategoryC::class, 'index']);
      Route::post('/store/', [BlogCategoryC::class, 'store']);
      Route::get('/delete/{id}/', [BlogCategoryC::class, 'delete']);
      Route::get('/update/{id}/', [BlogCategoryC::class, 'index']);
      Route::post('/update/{id}/', [BlogCategoryC::class, 'update']);
    });
    Route::prefix('/blogs')->group(function () {
      Route::get('/', [BlogC::class, 'index']);
      Route::post('/store/', [BlogC::class, 'store']);
      Route::get('/delete/{id}/', [BlogC::class, 'delete']);
      Route::get('/update/{id}/', [BlogC::class, 'index']);
      Route::post('/update/{id}/', [BlogC::class, 'update']);
    });
    Route::prefix('/blog-contents/')->group(function () {
      Route::get('/get-data', [BlogContentC::class, 'getData']);
      Route::get('/get-position', [BlogContentC::class, 'getPosition']);
      Route::get('/delete/{id}', [BlogContentC::class, 'delete']);
      Route::post('/store', [BlogContentC::class, 'store']);
      Route::get('/{blog_id}/', [BlogContentC::class, 'index']);
      Route::get('{blog_id}/update/{id}', [BlogContentC::class, 'index']);
      Route::post('{blog_id}/update/{id}', [BlogContentC::class, 'update']);
    });
    Route::prefix('/blog-faqs/')->group(function () {
      Route::get('/get-data', [BlogFaqC::class, 'getData']);
      Route::get('/delete/{id}', [BlogFaqC::class, 'delete']);
      Route::post('/store', [BlogFaqC::class, 'store']);
      Route::get('/{blog_id}/', [BlogFaqC::class, 'index']);
      Route::get('{blog_id}/update/{id}', [BlogFaqC::class, 'index']);
      Route::post('{blog_id}/update/{id}', [BlogFaqC::class, 'update']);
    });
    Route::prefix('/testimonials')->group(function () {
      Route::get('/', [TestimonialC::class, 'index']);
      Route::post('/store/', [TestimonialC::class, 'store']);
      Route::get('/delete/{id}/', [TestimonialC::class, 'delete']);
      Route::get('/update/{id}/', [TestimonialC::class, 'index']);
      Route::post('/update/{id}/', [TestimonialC::class, 'update']);
    });
    Route::prefix('/authors')->group(function () {
      Route::get('/', [AuthorC::class, 'index']);
      Route::post('/store/', [AuthorC::class, 'store']);
      Route::get('/delete/{id}/', [AuthorC::class, 'delete']);
      Route::get('/update/{id}/', [AuthorC::class, 'index']);
      Route::post('/update/{id}/', [AuthorC::class, 'update']);
    });
    Route::prefix('/seos')->group(function () {
      Route::get('/', [SeoC::class, 'index']);
      Route::post('/store/', [SeoC::class, 'store']);
      Route::get('/delete/{id}/', [SeoC::class, 'delete']);
      Route::get('/update/{id}/', [SeoC::class, 'index']);
      Route::post('/update/{id}/', [SeoC::class, 'update']);
    });
    Route::prefix('/default-seos')->group(function () {
      Route::get('/', [DefaultSeoC::class, 'index']);
      Route::get('add/', [DefaultSeoC::class, 'index']);
      Route::post('/store/', [DefaultSeoC::class, 'store']);
      Route::get('/delete/{id}/', [DefaultSeoC::class, 'delete']);
      Route::get('/update/{id}/', [DefaultSeoC::class, 'index']);
      Route::post('/update/{id}/', [DefaultSeoC::class, 'update']);
    });
    Route::prefix('/addresses')->group(function () {
      Route::get('/', [AddressC::class, 'index']);
      Route::post('/store/', [AddressC::class, 'store']);
      Route::get('/delete/{id}/', [AddressC::class, 'delete']);
      Route::get('/update/{id}/', [AddressC::class, 'index']);
      Route::post('/update/{id}/', [AddressC::class, 'update']);
    });
    Route::prefix('leads')->group(function () {
      Route::get('', [StudentC::class, 'index']);
      Route::get('/move', [StudentC::class, 'move']);
      Route::get('/add', [StudentC::class, 'add']);
      Route::get('/update/{id}', [StudentC::class, 'add']);
      Route::post('/update/{id}', [StudentC::class, 'update']);
      Route::get('/delete/{id}', [StudentC::class, 'delete']);
      Route::post('/store', [StudentC::class, 'store']);
      Route::get('get-quick-info', [StudentC::class, 'getQuickInfo']);
      Route::get('/update-quick-info/', [StudentC::class, 'updateQuickInfo']);
      Route::get('/fetch-last-updated-record/{id}', [StudentC::class, 'fetchLastRecord']);


      Route::get('/add2', [StudentC::class, 'add2']);
      Route::post('/store-ajax', [StudentC::class, 'storeAjax']);
    });

    Route::prefix('/users')->group(function () {
      Route::get('/', [UserC::class, 'index']);
      Route::post('/store/', [UserC::class, 'store']);
      Route::get('/delete/{id}/', [UserC::class, 'delete']);
      Route::get('/update/{id}/', [UserC::class, 'index']);
      Route::post('/update/{id}/', [UserC::class, 'update']);
    });

    Route::prefix('/upload-files')->group(function () {
      Route::get('/', [UploadFilesC::class, 'index']);
      Route::get('/get-data', [UploadFilesC::class, 'getData']);
      Route::get('/delete/{id}', [UploadFilesC::class, 'delete']);
      Route::post('/store-ajax', [UploadFilesC::class, 'storeAjax']);
      Route::get('/update/{id}', [UploadFilesC::class, 'index']);
      Route::post('/update/{id}', [UploadFilesC::class, 'update']);
    });
    Route::prefix('/exam-types')->group(function () {
      Route::get('/', [ExamTypeC::class, 'index']);
      Route::get('get-data/', [ExamTypeC::class, 'getData']);
      Route::get('/delete/{id}/', [ExamTypeC::class, 'delete']);
      Route::get('/update/{id}/', [ExamTypeC::class, 'index']);
      Route::post('/update/{id}/', [ExamTypeC::class, 'update']);
      Route::post('/store/', [ExamTypeC::class, 'store']);
      Route::post('/import/', [ExamTypeC::class, 'import']);
    });
    Route::prefix('/exam-papers')->group(function () {
      Route::get('/', [ExamPaperC::class, 'index']);
      Route::get('/delete/{id}/', [ExamPaperC::class, 'delete']);
      Route::get('/update/{id}/', [ExamPaperC::class, 'index']);
      Route::post('/update/{id}/', [ExamPaperC::class, 'update']);
      Route::post('/store/', [ExamPaperC::class, 'store']);
      Route::post('/import/', [ExamPaperC::class, 'import']);
    });

    Route::prefix('/exam-type-contents/')->group(function () {
      Route::get('/get-data', [ExamTypeContentC::class, 'getData']);
      Route::get('/get-position', [ExamTypeContentC::class, 'getPosition']);
      Route::get('/get-parent-headings', [ExamTypeContentC::class, 'getParentHeadings']);
      Route::get('/delete/{id}', [ExamTypeContentC::class, 'delete']);
      Route::post('/store', [ExamTypeContentC::class, 'store']);
      Route::get('/{exam_type_id}/', [ExamTypeContentC::class, 'index']);
      Route::get('{exam_type_id}/update/{id}', [ExamTypeContentC::class, 'index']);
      Route::post('{exam_type_id}/update/{id}', [ExamTypeContentC::class, 'update']);
    });
    Route::prefix('/exam-type-faqs/')->group(function () {
      Route::get('/get-data', [ExamTypeFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ExamTypeFaqC::class, 'delete']);
      Route::post('/store', [ExamTypeFaqC::class, 'store']);
      Route::get('/{exam_type_id}/', [ExamTypeFaqC::class, 'index']);
      Route::get('{exam_type_id}/update/{id}', [ExamTypeFaqC::class, 'index']);
      Route::post('{exam_type_id}/update/{id}', [ExamTypeFaqC::class, 'update']);
    });
    Route::prefix('/exam-type-years/')->group(function () {
      Route::get('/get-data', [ExamTypeYearC::class, 'getData']);
      Route::get('/delete/{id}', [ExamTypeYearC::class, 'delete']);
      Route::post('/store', [ExamTypeYearC::class, 'store']);
      Route::get('/{exam_type_id}/', [ExamTypeYearC::class, 'index']);
      Route::get('{exam_type_id}/update/{id}', [ExamTypeYearC::class, 'index']);
      Route::post('{exam_type_id}/update/{id}', [ExamTypeYearC::class, 'update']);
    });

    Route::prefix('/exam-type-year-contents/')->group(function () {
      Route::get('/get-data', [ExamTypeYearContentC::class, 'getData']);
      Route::get('/get-position', [ExamTypeYearContentC::class, 'getPosition']);
      Route::get('/get-parent-headings', [ExamTypeYearContentC::class, 'getParentHeadings']);
      Route::get('/delete/{id}', [ExamTypeYearContentC::class, 'delete']);
      Route::post('/store', [ExamTypeYearContentC::class, 'store']);
      Route::get('/{exam_type_year_id}/', [ExamTypeYearContentC::class, 'index']);
      Route::get('{exam_type_year_id}/update/{id}', [ExamTypeYearContentC::class, 'index']);
      Route::post('{exam_type_year_id}/update/{id}', [ExamTypeYearContentC::class, 'update']);
    });
    Route::prefix('/exam-type-year-faqs/')->group(function () {
      Route::get('/get-data', [ExamTypeYearFaqC::class, 'getData']);
      Route::get('/delete/{id}', [ExamTypeYearFaqC::class, 'delete']);
      Route::post('/store', [ExamTypeYearFaqC::class, 'store']);
      Route::get('/{exam_type_year_id}/', [ExamTypeYearFaqC::class, 'index']);
      Route::get('{exam_type_year_id}/update/{id}', [ExamTypeYearFaqC::class, 'index']);
      Route::post('{exam_type_year_id}/update/{id}', [ExamTypeYearFaqC::class, 'update']);
    });

    Route::prefix('/exam-type-year-papers/')->group(function () {
      Route::get('/get-data', [ExamTypeYearPaperC::class, 'getData']);
      Route::get('/delete/{id}', [ExamTypeYearPaperC::class, 'delete']);
      Route::post('/store', [ExamTypeYearPaperC::class, 'store']);
      Route::get('/{exam_type_year_id}/', [ExamTypeYearPaperC::class, 'index']);
      Route::get('{exam_type_year_id}/update/{id}', [ExamTypeYearPaperC::class, 'index']);
      Route::post('{exam_type_year_id}/update/{id}', [ExamTypeYearPaperC::class, 'update']);
    });
    Route::prefix('/paper-contents/')->group(function () {
      Route::get('/get-data', [PaperContentC::class, 'getData']);
      Route::get('/get-position', [PaperContentC::class, 'getPosition']);
      Route::get('/get-parent-headings', [PaperContentC::class, 'getParentHeadings']);
      Route::get('/delete/{id}', [PaperContentC::class, 'delete']);
      Route::post('/store', [PaperContentC::class, 'store']);
      Route::get('/{paper_id}/', [PaperContentC::class, 'index']);
      Route::get('{paper_id}/update/{id}', [PaperContentC::class, 'index']);
      Route::post('{paper_id}/update/{id}', [PaperContentC::class, 'update']);
    });
    Route::prefix('/paper-faqs/')->group(function () {
      Route::get('/get-data', [PaperFaqC::class, 'getData']);
      Route::get('/delete/{id}', [PaperFaqC::class, 'delete']);
      Route::post('/store', [PaperFaqC::class, 'store']);
      Route::get('/{paper_id}/', [PaperFaqC::class, 'index']);
      Route::get('{paper_id}/update/{id}', [PaperFaqC::class, 'index']);
      Route::post('{paper_id}/update/{id}', [PaperFaqC::class, 'update']);
    });
  });
});

Route::prefix('common')->group(function () {
  Route::get('/change-status/', [CommonController::class, 'changeStatus']);
  Route::get('/update-field', [CommonController::class, 'updateFieldById']);
  Route::get('/update-bulk-field/', [CommonController::class, 'updateBulkField']);
  Route::get('/slugify/', [CommonController::class, 'slugifyString']);
  Route::get('/bulk-delete', [CommonController::class, 'bulkDelete']);
});

// SITE MAP
Route::get('sitemap.xml', [SitemapController::class, 'sitemap']);
Route::get('sitemap-home.xml', [SitemapController::class, 'home']);
Route::get('sitemap-blog.xml', [SitemapController::class, 'blog']);
Route::get('sitemap-medical-universities.xml', [SitemapController::class, 'medicalUniversity']);
Route::get('sitemap-destinations.xml', [SitemapController::class, 'destination']);
Route::get('sitemap-services.xml', [SitemapController::class, 'services']);
Route::get('sitemap-exams.xml', [SitemapController::class, 'exam']);
Route::get('sitemap-exam-papers.xml', [SitemapController::class, 'examPapers']);
Route::get('sitemap-university.xml', [SitemapController::class, 'university']);

Route::get('exams/{exam_type_slug}/{exam_type_title_slug}/', [ExamPaperDownloadFc::class, 'index'])->name('paper1');
Route::get('exams/{exam_type_slug}/{exam_type_title_slug}/{year_slug}', [ExamPaperDownloadFc::class, 'yearDetail'])->name('paper2');
Route::get('exams/{exam_type_slug}/{exam_type_title_slug}/{year_slug}/{paper_slug}', [ExamPaperDownloadFc::class, 'paperDetail'])->name('paper3');
