<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DonationController;
use App\Http\Controllers\Web\GeneralController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminMediaController;
use App\Http\Controllers\Admin\AdminQueryController;
use App\Http\Controllers\Admin\AdminCMSController;
use App\Http\Controllers\Admin\AdminCampaignsController;
use App\Http\Controllers\Admin\AdminVolunteerController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DistributorshipController;
use App\Http\Controllers\Web\EnquiryController;
Auth::routes();

//-------------------------- Admin Setup 11-Nov-2022 --------------------------------------------------
//---------------------------------------------Web Routes---------------------------------------------
Route::get('/', [GeneralController::class, 'home']);

Route::get('web/subcats/{id}', [GeneralController::class, 'subcats']);
Route::get('/distributor/{slug}', [GeneralController::class, 'listingdetail'])->name('dist.details');
Route::get('/franchise/{slug}', [GeneralController::class, 'listingdetail_fr'])->name('fran.details');;
Route::get('/salesagent/{slug}', [GeneralController::class, 'listingdetail_sa'])->name('sale.details');;
Route::post('/web/search/distributor', [GeneralController::class, 'searchresult']);

//search details

// Route::get('/web/search-details/distributor/{type}/{id}', [GeneralController::class, 'searchDetails'])->name('dist.search.details');

// Route::get('/web/search-details/sale/{type}/{id}', [GeneralController::class, 'searchDetails'])->name('sale.search.details');
// Route::get('/web/search-details/franchise/{type}/{id}', [GeneralController::class, 'searchDetails'])->name('fran.search.details');
Route::post('/web/send/inquiry', [EnquiryController::class, 'store'])->name('send.inquiry');
Route::post('/web/search/franchise', [GeneralController::class, 'searchresult'])->name('search.fran');;
Route::post('/web/search/salesagent', [GeneralController::class, 'searchresult'])->name('search.sales');
Route::get('web/about-us', [GeneralController::class, 'aboutUs']);
Route::get('web/contact-us', [GeneralController::class, 'contactUsShow']);

/*** ---------------------------- Below are not in use **********************/

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [GeneralController::class, 'dashboard']);
    Route::get('/dashboard/profile', [GeneralController::class, 'profile'])->name('profile');
    Route::post('/dashboard/update-profile', [GeneralController::class, 'updateProfile'])->name('update.profile');
    
    Route::get('/dashboard/inbox', [EnquiryController::class, 'index'])->name('inbox.inquiry');
    
    Route::get('/dash/gallery/{id}', [GeneralController::class, 'dash_gallery']);
    //distributor
    Route::get('/add-listing', [GeneralController::class, 'add_listing']);
    Route::post('web/listsubmit',[GeneralController::class, 'listsubmit']);
    Route::post('web/addgallery',[GeneralController::class, 'addgallery']);

    //edit listing
    Route::get('/edit-frenchise/{id}', [GeneralController::class, 'edit_french'])->name('french.edit');
    Route::get('/edit-sales-agent/{id}', [GeneralController::class, 'edit_sale'])->name('sales.edit');
    Route::get('/edit-distributor/{id}', [GeneralController::class, 'edit_distributor'])->name('dist.edit');

    //update listing
    Route::post('web/update_dist',[GeneralController::class, 'update_dist'])->name('update.dist');
    Route::post('web/update_franchise',[GeneralController::class, 'update_fran'])->name('update.fran');
    Route::post('web/update_sale',[GeneralController::class, 'update_sale'])->name('update.sale');

    //view 
    Route::post('/view', [GeneralController::class, 'view'])->name('view');
    Route::post('/image-delete', [GeneralController::class, 'deleteImg'])->name('img.delete');

});




Route::post('web/contact-us-form',[GeneralController::class, 'contactUs']);

Route::get('web/our-donor', [GeneralController::class, 'ourDonorList']);
Route::get('web/campaigns', [GeneralController::class, 'campaigns']);
Route::get('web/campaign-details/{slug}', [GeneralController::class, 'campaignDetail']);
Route::get('web/media', [GeneralController::class, 'mediaList']);
Route::get('web/join-us-volunteer', [GeneralController::class, 'joinVolunteer']);
Route::get('web/blog', [GeneralController::class, 'blogList']);
Route::get('web/blog-detail/{slug}', [GeneralController::class, 'blogDetail']);
Route::post('web/subscribeform', [GeneralController::class, 'subscribeForm']);
Route::get('web/donate', [DonationController::class, 'donate']);
Route::post('web/donation-payment',[DonationController::class, 'donationPayment']);
Route::post('web/donation-payment-monthly',[DonationController::class, 'donationPaymentMonthly']);
Route::get('web/donation-payment-success',[DonationController::class, 'donationPaymentSuccess']);
Route::get('web/donation-payment-details',[DonationController::class, 'donationPaymentSuccessDetails']);
Route::get('web/coming-soon', [GeneralController::class, 'comingSoon']);

//---------------------------------------------Admin Routes---------------------------------------------
Route::get('admin',[AdminLoginController::class, 'loginScreen']);
Route::post('admin/login',[AdminLoginController::class, 'login']);
Route::post('admin/logout',[AdminLoginController::class, 'logout']);
Route::get('admin/dashboard',[AdminDashboardController::class, 'dashBoard']);
Route::get('admin/categories',[AdminCategoriesController::class, 'index']);
Route::post('admin/category/store',[AdminCategoriesController::class, 'store']);
Route::put('admin/categories/{id}',[AdminCategoriesController::class, 'update']);

//Route::resource('category', 'CategoryController');
//-----------------------------------------------Blogs Routes---------------------------------------------
Route::get('admin/blog-list',[AdminBlogController::class, 'blogList']);
Route::get('admin/add-blog',[AdminBlogController::class, 'blogAdd']);
Route::get('admin/edit-blog/{id}',[AdminBlogController::class, 'blogEdit']);
Route::post('admin/blog-store',[AdminBlogController::class, 'blogStore']);
Route::post('admin/blog-detail',[AdminBlogController::class, 'blogDetail']);
Route::post('admin/deleteblog',[AdminBlogController::class, 'blogDelete']);

//-----------------------------------------------Media Routes---------------------------------------------
Route::get('admin/media-photo-list',[AdminMediaController::class, 'mediaPhotoList']);
Route::get('admin/media-video-list',[AdminMediaController::class, 'mediaVideoList']);
Route::get('admin/media-news-list',[AdminMediaController::class, 'mediaNewsList']);
Route::post('admin/media-photo-upload',[AdminMediaController::class, 'mediaPhotoUpload']);
Route::post('admin/media-video-upload',[AdminMediaController::class, 'mediaVideoUpload']);
Route::post('admin/single-media',[AdminMediaController::class, 'singleRecord']);
Route::get('admin/add-news',[AdminMediaController::class, 'mediaNewsAdd']);
Route::post('admin/submit-news',[AdminMediaController::class, 'mediaNewsSubmit']);
Route::get('admin/edit-news/{id}',[AdminMediaController::class, 'newsEdit']);

//-----------------------------------------------Queries Routes---------------------------------------------
Route::get('admin/queries-list',[AdminQueryController::class, 'queryList']);
Route::post('admin/single-email',[AdminQueryController::class, 'singleMail']);
Route::post('admin/send-reply',[AdminQueryController::class, 'sendReply']);

//-----------------------------------------------CMS Routes---------------------------------------------
Route::get('admin/terms-conditions',[AdminCMSController::class, 'termsConditions']);
Route::post('admin/terms-conditions-store',[AdminCMSController::class, 'termsConditionsStore']);
Route::get('admin/privacy-policy',[AdminCMSController::class, 'privacyPolicy']);
Route::post('admin/privacy-policy-store',[AdminCMSController::class, 'privacyPolicyStore']);

//-----------------------------------------------Campaigns Routes---------------------------------------------
Route::get('admin/campaigns-list',[AdminCampaignsController::class, 'campaignsList']);
Route::get('admin/add-campaign',[AdminCampaignsController::class, 'campaignAdd']);
Route::get('admin/edit-campaign/{id}',[AdminCampaignsController::class, 'campaignEdit']);
Route::post('admin/campaign-store',[AdminCampaignsController::class, 'campaignStore']);
Route::post('admin/campaign-status-update',[AdminCampaignsController::class, 'campaignStatus']);
Route::post('admin/deletecampaign',[AdminCampaignsController::class, 'campaignDelete']);

//-----------------------------------------------Volunteer Routes---------------------------------------------
Route::get('admin/volunteer-list',[AdminVolunteerController::class, 'volunteerList']);

//-----------------------------------------------Subscription Routes---------------------------------------------
Route::get('admin/users-list',[AdminUserController::class, 'userList']);

//-----------------------------------------------Distributionship Routes---------------------------------------------
Route::get('admin/{type}-list',[DistributorshipController::class, 'index'])->name('dists.list');

Route::post('admin/featured', [DistributorshipController::class, 'UpdateFeatured'])->name('featured');
Route::post('admin/view', [DistributorshipController::class, 'view'])->name('admin.view');
