<?php

use App\Models\Cart;
use App\Models\Step;
use App\Mail\NewOrder;
use App\Models\contact;
use App\Models\ProductCategory;
use App\Models\AdditionSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SoicalController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlidWebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WorkHoursController;
use App\Http\Controllers\SettingEmailController;
use App\Http\Controllers\DisplayEditorController;
use App\Http\Controllers\PayamentMethodController;
use App\Http\Controllers\AdditionCategoryController;
use App\Http\Controllers\AdditionSubCategoryController;

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

Route::get('/',[IndexController::class,'index'])->name('index');

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth')->middleware('check:Admin')->name('dashboard');

Route::get('/menu', [ProductController::class,'indexProducts'])->name('user.products');

Route::get('/offers', [OfferController::class,'indexOffers'])->name('user.offers');

// Route::get('/checkout', function () {
//     return view('gloable');
// });

Route::middleware('auth')->middleware('check:Admin')->group(function(){
    Route::resource('/offer',OfferController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/product',ProductController::class);
Route::resource('/slid-web', SlidWebController::class);
Route::get('orders',[OrderController::class,'index'])->name('orders.index');
Route::get('videos',[VideoController::class,'index'])->name('videos.index');
Route::post('video/update',[VideoController::class,'update'])->name('video.update');
Route::post('video',[VideoController::class,'store'])->name('video.store');
Route::get('soical/edit',[SoicalController::class,'create'])->name('soical.create');
Route::post('soical/update',[SoicalController::class,'update'])->name('soical.update');
Route::post('soical',[SoicalController::class,'store'])->name('soical.store');
Route::resource('place', PlaceController::class)->except('index');

Route::get('/general',[GeneralController::class,'create'])->name('general.create');
Route::post('/general',[GeneralController::class,'store'])->name('general.store');
Route::post('/general/update',[GeneralController::class,'update'])->name('general.update');

Route::get('/hour',[WorkHoursController::class,'create'])->name('hour.create');
Route::post('/hour',[WorkHoursController::class,'store'])->name('hour.store');
Route::post('/hour/update',[WorkHoursController::class,'update'])->name('hour.update');

Route::get('order-completed',[OrderController::class,'indexComplete'])->name('order.complete');
Route::get('order-pending',[OrderController::class,'indexPending'])->name('order.pending');
Route::get('order-cancel',[OrderController::class,'indexDeclined'])->name('order.cancel');
Route::get('order/{id}',[OrderController::class,'edit'])->name('order.edit');
Route::post('order/{id}',[OrderController::class,'update'])->name('order.update');
Route::post('order-delete/{id}',[OrderController::class,'destroy'])->name('order.delete');

Route::post('order-complete/{id}',[OrderController::class,'statusComplete'])->name('order.statuscomplete');
Route::post('order-consle/{id}',[OrderController::class,'statusConsle'])->name('order.statusconsle');
Route::resource('step', StepController::class);

Route::get('customers',[CustomerController::class,'index'])->name('customers');
Route::get('emails',[EmailController::class,'index'])->name('emails');
Route::delete('email/{id}',[EmailController::class,'destroy'])->name('email.destroy');
Route::get('orders/customer/{id}',[OrderController::class,'indexOrdersCustomer'])->name('orders.customer');


Route::post('setting-email', [SettingEmailController::class,'store'])->name('setting-email.store');
Route::get('setting-email', [SettingEmailController::class,'index'])->name('setting-email.index');
Route::post('setting-email/update', [SettingEmailController::class,'update'])->name('setting-email.update');


Route::post('setting-payament', [PayamentMethodController::class,'store'])->name('setting-payament.store');
Route::get('setting-payament', [PayamentMethodController::class,'index'])->name('setting-payament.index');
Route::post('setting-payament/update', [PayamentMethodController::class,'update'])->name('setting-payament.update');

Route::post('element', [DisplayEditorController::class,'store'])->name('element.store');
Route::get('element', [DisplayEditorController::class,'index'])->name('element.index');
Route::post('element/update/{id}', [DisplayEditorController::class,'update'])->name('element.update');


Route::post('element/sectionone', [DisplayEditorController::class,'storeSectionOne'])->name('element.storeSectionOne');
Route::get('sectionone', [DisplayEditorController::class,'indexSectionOne'])->name('element.indexSectionOne');
Route::post('element/sectionone/update', [DisplayEditorController::class,'updateSectionOne'])->name('element.updateSectionOne');

Route::post('element/sectiontwo', [DisplayEditorController::class,'storeSectionTwo'])->name('element.storeSectionTwo');
Route::get('element/sectiontwo', [DisplayEditorController::class,'indexSectionTwo'])->name('element.indexSectionTwo');
Route::post('element/sectiontwo/update', [DisplayEditorController::class,'updateSectionTwo'])->name('element.updateSectionTwo');

Route::resource('addition-category', AdditionCategoryController::class);
Route::resource('addition-subcategory', AdditionSubCategoryController::class);
});

// Route::get('paypal/return','CheckoutController@paypalReturn')->name('paypal.return');
// Route::get('paypal/cancel','CheckoutController@paypalCancel')->name('paypal.cancel');

Auth::routes();

Route::post('orderUpdate', [OrderController::class,'update']);




Route::post('email',[EmailController::class,'store'])->name('email.store');
Route::post('address', [AddressController::class,'storeAddress'])->name('address.store');
Route::post('address', [AddressController::class,'index'])->name('address.index');
Route::post('order', [OrderController::class,'store'])->name('order.store');
Route::post('store', [OrderController::class,'orderStore'])->name('order.store-store');
Route::get('order\confirmation\{id}', [OrderController::class,'confirmation'])->name('order.confirmation');
Route::get('orderCustomer', [OrderController::class,'orderCustomer']);
Route::post('cartOffer/{id}', [CartController::class,'storeOffer'])->name('cartOffer.store');
Route::post('cartProduct/{id}', [CartController::class,'storeProduct'])->name('cartProduct.store');
Route::get('carts', [CartController::class,'index'])->name('cart.index');
Route::get('order', [OrderController::class,'indexUser'])->name('order.user');



Route::get('category-status', [CategoryController::class,'categoryStatus'])->name('category_status');
Route::get('category\sorte',[CategoryController::class,'order'])->name('category.sorte');
Route::get('category\active_home',[CategoryController::class,'active_home'])->name('category.active_home');


Route::get('firstproduct-status', [ProductController::class,'firstProductStatus'])->name('firstProduct_status');
Route::post('products-status', [ProductController::class,'productStatus'])->name('product_status');
Route::get('product\sorte',[ProductController::class,'order'])->name('product.sorte');
Route::get('product\active_home',[ProductController::class,'active_home'])->name('product.active_home');



Route::post('cart/delete/{id}', [CartController::class,'destroy'])->name('cart.delete');

Route::get('contact', function (){
    $contact = contact::first();
    return view('page-contact',[
        'contact' => $contact,
    ]);
})->name('contact');


Route::post('checkout',[CheckoutController::class,'createOrder'])->name('user.checkout');
Route::get('paypal/return',[CheckoutController::class,'paypalReturn'])->name('paypal.return');
Route::get('paypal/cancel',[CheckoutController::class,'paypalCancel'])->name('paypal.cancel');

Route::get('/checkout-stripe', [PaymentController::class, 'index'])->name('stripe');
Route::post('/transaction', [PaymentController::class, 'makePayment'])->name('make-payment');

Route::get('checkout', [CheckoutController::class,'index'])->name('checkout.index');

Route::get('/index.php/menu',function () {
    return abort(404);
});
Route::get('/index.php',function () {
    return abort(404);
});



// Route::post('checkout',[Payment::class,'createOrder'])->name('checkout');


