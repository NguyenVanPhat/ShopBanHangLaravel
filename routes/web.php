<?php

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
//frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem-home','HomeController@search_home');
Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');



//Category for home
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu-san-pham/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@details_product');


//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
// Route::post('/admin-dashboard','AdminController@dashboard');

Route::group(['middleware' => ['auth.roles']], function () {
     //category product
     Route::get('/add-category-product','CategoryProduct@add_category_product');
     Route::get('/all-category-product','CategoryProduct@all_category_product');
     Route::get('edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
     Route::get('/detele-category-product/{category_product_id}','CategoryProduct@detele_category_product');
     Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
     Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
     Route::post('/save-category-product','CategoryProduct@save_category_product');
     Route::post('/updata-category-product/{category_product_id}','CategoryProduct@updata_category_product');
     Route::post('/export-category','CategoryProduct@export_category');
     Route::post('/import-category','CategoryProduct@import_category');

     //brand product
    Route::get('/add-brand','BrandProduct@add_brand');
    Route::get('/all-brand','BrandProduct@all_brand');
    Route::get('edit-brand/{brand_id}','BrandProduct@edit_brand');
    Route::get('delete-brand/{brand_id}','BrandProduct@delete_brand');
    Route::get('/unactive-brand/{brand_id}','BrandProduct@unactive_brand');
    Route::get('/active-brand/{brand_id}','BrandProduct@active_brand');

    Route::post('/save-brand','BrandProduct@save_brand');
    Route::post('/updata-brand/{brand_id}','BrandProduct@updata_brand');


    //product
    Route::get('/add-product','ProductController@add_product');
    Route::get('/all-product','ProductController@all_product');
    Route::get('edit-product/{product_id}','ProductController@edit_product');
    Route::get('delete-product/{product_id}','ProductController@delete_product');
    Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
    Route::get('/active-product/{product_id}','ProductController@active_product');
    Route::post('/save-product','ProductController@save_product');
    Route::post('/updata-product/{product_id}','ProductController@updata_product');

    /// delivery 
    Route::get('/delivery','DeliveryController@delivery');
    Route::post('/select-delivery','DeliveryController@select_delivery');
    Route::post('/insert-delivery','DeliveryController@insert_delivery');
    Route::post('/select-feeship','DeliveryController@select_feeship');
    Route::post('/update-delivery','DeliveryController@update_delivery');

    /// slider
    Route::get('/manage-slider','SliderController@manage_slider');
    Route::get('/add-slider','SliderController@add_slider');
    Route::post('/save-slider','SliderController@save_slider');
    Route::get('/unactive-slide/{slide_id}','SliderController@unactive_slide');
    Route::get('/active-slide/{slide_id}','SliderController@active_slide');
    Route::get('/delete-slide/{slide_id}','SliderController@delete_slide');

    ///user
    Route::get('/users','UserController@index');
    Route::get('/delete-user-roles/{admin_id}','UserController@delete_user_roles');
    Route::post('/assign-roles','UserController@assign_roles');

   
    

   
   
    
});  
//card
Route::post('/save-cart','CardController@save_cart');
Route::post('/update-cart-quantity','CardController@update_cart_quantity');
Route::post('/update-cart-ajax','CardController@update_cart_ajax');
Route::post('/add-cart-ajax','CardController@add_cart_ajax');
Route::get('/show-cart','CardController@show_cart');
Route::get('/gio-hang','CardController@gio_hang');
Route::get('/delete-cart/{rowid}','CardController@delete_cart');
Route::get('/delete-sp/{cart_id}','CardController@delete_sp');
Route::get('/delete-all-cart','CardController@delete_all_cart');

//checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::get('/show-checkout','CheckoutController@show_checkout');
Route::get('/payment','CheckoutController@payment_cart');
Route::get('/del-fee','CheckoutController@del_fee');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::post('/confirm-order','CheckoutController@confirm_order');

//order
Route::get('/manager-order','OrderController@manager_order');
Route::get('/view-order/{order_id}','OrderController@view_order');
Route::get('/print-order/{order_id}','OrderController@print_order');


//sent mail
Route::get('/sent-mail','HomeController@sent_mail');

//check coupon
Route::post('/check-coupon','CouponController@check_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/all-coupon','CouponController@all_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::post('/add-coupon','CouponController@add_coupon');

///authentication role
Route::get('/register-auth','AuthController@register_auth');
Route::get('/admin','AuthController@login_auth');
Route::get('/logout-auth','AuthController@logout_auth');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');

//// post bên ngoài font end
Route::get('/danh-muc-bai-viet/{post_id}','HomeController@show_post');
Route::get('/detail-post/{post_id}','HomeController@detail_post');

 /// category post
 Route::get('/all-category-post','CategoryPost@all_category_post');
 Route::get('/add-category-post','CategoryPost@add_category_post');
 Route::get('/delete-cate-post/{cate_post_id}','CategoryPost@delete_cate_post');
 Route::get('/edit-cate-post/{cate_post_id}','CategoryPost@edit_cate_post');
 Route::post('/save-category-post','CategoryPost@save_category_post');
 Route::post('/save-edit-category-post/{cate_post_id}','CategoryPost@save_edit_category_post');

 ///// Post
 Route::get('/add-post','PostController@add_post');
 Route::get('/all-post','PostController@all_post');
 Route::get('/edit-post/{post_id}','PostController@edit_post');
 Route::get('/delete-post/{post_id}','PostController@delete_post');
 Route::post('/save-add-post','PostController@save_add_post');
 Route::post('/save-edit-post/{cate_post_id}','PostController@save_edit_post');

 //////paypal
Route::get('/paypal','PaypalController@getExpressCheckout');

/////////// gallery
Route::get('/show-gallery/{product_id}','GalleryController@show_gallery');
Route::post('/show-gallery-ajax','GalleryController@show_gallery_ajax');
Route::post('/insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('/edit-gal-name','GalleryController@edit_gal_name');
Route::post('/del-gal','GalleryController@del_gal');
