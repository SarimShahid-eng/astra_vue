<?php

use App\Http\Controllers\Administrator\AboutController;
use App\Http\Controllers\Administrator\BlogController;
use App\Http\Controllers\Administrator\ContactController;
use App\Http\Controllers\Administrator\FrontProductController;
use App\Http\Controllers\Administrator\UserController;
use App\Http\Controllers\FrontEnd\HomeController as UserHomeController;
use App\Http\Controllers\Administrator\RoleController;
use App\Http\Controllers\Administrator\FrontPageController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\DeviceConfigurationController;
use App\Http\Controllers\DeviceProductController;
use App\Http\Controllers\DeviceRegistrationController;
use App\Http\Controllers\DistributorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false]);

Route::middleware(['auth', 'checkRole:user'])->prefix('user')->group(function () {
    Route::controller(UserHomeController::class)->group(function () {
        Route::get('/', 'profile')->name('profile');
        Route::get('complain', 'complain')->name('complain');
        Route::post('update_form', 'update_form')->name('user.update_form');
        Route::post('add_complain', 'add_complain')->name('user.add_complain');
    });
});
// for distributors
// Route::middleware(['auth', 'checkRole:distributor'])->prefix('distributor')->group(function () {

// });
// for distributors
Route::middleware(['auth', 'checkRole:distributor'])->group(function () {
    Route::controller(DeviceRegistrationController::class)->group(function () {
        Route::get('device-info-index', 'index')->name('device_info.index');
        Route::get('device-info-add', 'create')->name('device_info.add');
        Route::post('device-info-store-page', 'store')->name('device_info.save');
        Route::get('device-info-edit-page/{id}', 'edit')->name('device_info.edit');
        Route::get('device-info-get-configurations/{id}', 'get_configurations')->name('device_info.get_configurations');
        Route::get('device-info-delete/{id}', 'destroy')->name('device_info.delete');
    });
});
// common for distributors and admin
// Route::middleware(['auth', 'checkRole:distributor,admin'])->prefix('distributor')->group(function () {
//     Route::controller(DistributorController::class)->group(function () {

//     });
// });
Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->group(function () {

    //User Controller
    Route::controller(UserController::class)->group(function () {
        Route::get('user-index', 'index')->name('user.index');
        Route::get('user-add', 'create')->name('user.add');
        Route::post('user-save', 'store')->name('user.save');
        Route::get('user-edit/{id}', 'edit')->name('user.edit');
        Route::get('user-delete/{id}', 'delete')->name('user.delete');
        //View Products
        Route::get('user-products/{id}', action: 'user_products')->name('user.user_products');
        Route::get('compalint-box', 'user_complain')->name('user.complain');

        //Profile
        Route::get('profile/{id}', 'profile')->name('user.profile');
        Route::get('edit-profile/{id}', 'edit_profile')->name('user.edit_profile');
        Route::post('profile-update', 'profile_update')->name('user.profile_update');
    });
    //Role Controller
    Route::controller(RoleController::class)->group(function () {
        Route::get('role-index', 'index')->name('role.index');
        Route::get('role-add', 'create')->name('role.add');
        Route::post('role-save', 'store')->name('role.save');
        Route::get('role-edit/{id}', 'edit')->name('role.edit');
        Route::get('role-delete/{id}', 'delete')->name('role.delete');
        //Permission
        Route::get('role-permission/{id}', 'permission')->name('role.permission');
        Route::get('role-permission_change', 'permission_change')->name('role.permission_change');
    });
    Route::controller(BlogController::class)->group(function () {
        Route::get('blog-page', 'index')->name('blog.index');
        Route::get('blog-add-page', 'show')->name('blog.add');
        Route::get('blog-edit-page/{id}', 'edit')->name('blog.edit');

        Route::post('blog-store-page', 'store')->name('blog.save');

        Route::get('blog-delete/{id}', 'destroy')->name('blog.delete');
    });
    Route::controller(BusinessController::class)->group(function () {
        Route::get('business-show', 'index')->name('business.index');
        Route::get('business-add', 'create')->name('business.add');
        Route::post('business-store', 'store')->name('business.store');
        Route::get('business-edit/{id}', 'edit')->name('business.edit');
        Route::get('business-delete/{id}', 'destroy')->name('business.delete');
    });

    Route::controller(FrontPageController::class)->group(function () {
        Route::get('front-page', 'index')->name('front.index');
        Route::get('front-page-edit/{id}/{data}', 'edit')->name('front.edit');
        Route::get('front-partners-edit/{id}', 'partner_edit')->name('front.partner_edit');
        Route::post('front-page-update', 'update')->name('front.update');
        Route::post('partner-page-update', 'partner_update')->name('front.partner_update');
    });
    Route::controller(FrontProductController::class)->group(function () {
        // Category
        Route::get('category-show', 'category_index')->name('category.index');
        Route::get('category-add', 'category_create')->name('category.add');
        Route::post('category-store', 'category_store')->name('category.store');

        // Sub Category
        Route::get('sub-category-show', 'sub_category_index')->name('sub_category.index');
        Route::get('sub-category-add', 'sub_category_create')->name('sub_category.add');
        Route::post('sub-category-store', 'sub_category_store')->name('sub_category.store');

        // Product
        Route::get('product-show', 'index')->name('product.index');
        Route::get('product-add', 'create')->name('product.add');
        Route::get('product-edit/{id}', 'edit')->name('product.edit');
        Route::post('product-save', 'store')->name('product.save');

        //Get Sub Category
        Route::get('get-sub-cat/{id?}', 'sub_category_get')->name('sub_category_get');
        Route::get('get-product/{id?}', 'get_product')->name('get_product');
    });
    Route::controller(AboutController::class)->group(function () {
        Route::get('about-show', 'index')->name('about.index');
        Route::get('about-edit/{id}', 'edit')->name('about.edit');
        Route::post('about-save', 'store')->name('about.save');
    });
    Route::controller(ContactController::class)->group(function () {
        Route::get('contact-show', 'index')->name('contact.index');
        Route::get('contact-edit/{id}', 'edit')->name('contact.edit');
        Route::post('contact-save', 'store')->name('contact.save');
        Route::get('contact-comments', 'show_contacts')->name('contact.comments');
    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(DistributorController::class)->group(function () {
        Route::get('distributor-show', 'index')->name('distributor.index');
        Route::get('distributor-edit/{id}', 'edit')->name('distributor.edit');
        Route::get('distributor-delete/{id}', 'destroy')->name('distributor.delete');
        Route::post('distributor-store', 'store')->name('distributor.store');
        Route::post('get-distributor-country-dialcode', 'get_distributor_country_dialcode')->name('distributor.get_distributor_country_dialcode');
        Route::get('distributor-add', 'create')->name('distributor.add');
    });
    Route::controller(DeviceProductController::class)->group(function () {
        Route::get('device-product-index', 'index')->name('device_info.product_index');
        Route::get('device-product-edit/{id}', 'edit')->name('device_info.product_edit');
        Route::get('device-product-add', 'create')->name('device_info.product_add');
        Route::post('device-product-save', 'store')->name('device_info.product_store');
        Route::get('device-info-delete/{id}', 'destroy')->name('device_info.product_delete');
    });
    Route::controller(DeviceConfigurationController::class)->group(function () {
        Route::get('device-config-index', 'index')->name('device_info.product_config_index');
        Route::get('device-config-edit/{id}', 'edit')->name('device_info.product_config_edit');
        Route::get('device-config-add', 'create')->name('device_info.product_config_add');
        Route::post('device-config-save', 'store')->name('device_info.product_config_store');
        Route::get('device-config-delete/{id}', 'destroy')->name('device_info.product_config_delete');
    });
});
Route::controller(UserHomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('user-login', 'showLogin')->name('showLogin');

    Route::get('product-details/{id}', 'product_details')->name('product_details');
    Route::get('blog-page', 'blog_page')->name('blog_page');
    Route::get('blog-detail/{id}', 'blog_detail')->name('blog_detail');
    Route::get('contact-us', 'contact_us')->name('contact_us');
    Route::get('about', 'about')->name('about');
    Route::post('contacts_store', 'contact_store')->name('contacts.store');
});

Route::get('/logout', action: [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
