    <?php

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
Route::get('/', ['as'=>'home','uses'=>'Frontend\IndexController@index']);
Route::post('/login', 'Frontend\LoginController@PostLogin');
Route::get('/logout', 'Frontend\LoginController@Logout');
Route::get('/category/{id}', 'Frontend\CategoryController@index')->name('category');

Route::get('/logout', 'Frontend\LoginController@Logout');

Route::post('/post_register', 'Frontend\RegisterController@PostRegister');
Route::get('/register', ['as'=>'register','uses'=>'Frontend\RegisterController@GetRegister']);

Route::get('contact-us', 'Frontend\IndexController@contactUs');
Route::get('about-us', 'Frontend\IndexController@aboutUs');
Route::get('404', 'Frontend\IndexController@Get404');
Route::get('search', 'Frontend\SearchController@index');

Route::group(['prefix'=>'product'],function(){
    Route::get('{id}', 'Frontend\ProductController@GetProductDetail');

});
Route::group(['prefix'=>'category'],function(){
    Route::get('/', 'Frontend\CategoryController@getProducts');

});
Route::group(['prefix'=>'cart'],function(){
    Route::get('', 'Frontend\CartController@GetCart');
    Route::get('addtocart', 'Frontend\CartController@AddToCart');
    Route::get('update/{rowId}/{qty}', 'Frontend\CartController@UpdateCart');
    Route::get('del/{rowId}', 'Frontend\CartController@DeleteCart'); 
}); 
Route::get('checklogin', 'Frontend\CheckoutController@CheckLogin');
Route::get('checkout', 'Frontend\CheckoutController@GetCheckout')->middleware('CheckOut');
Route::post('checkout', 'Frontend\CheckoutController@PostCheckout')->middleware('CheckOut');
Route::get('/register', ['as'=>'register','uses'=>'Frontend\RegisterController@GetRegister']);
Route::group(['prefix'=>'user','middleware'=>'AccountUser'],function(){
    Route::get('account', ['as'=>'profileUser','uses'=>'Frontend\UserController@GetAccount']);
    Route::get('/edit', ['as'=>'EditUser','uses'=>'Frontend\UserController@GetEditUser']);
    Route::post('/edit', 'Frontend\UserController@PostEditUser');
    Route::get('/change', ['as'=>'ChangePassword','uses'=>'Frontend\UserController@GetChangePassword']);
    Route::post('/change', 'Frontend\UserController@PostChangePassword');
    Route::get('/order/{order_id}', ['as'=>'DetailOrder','uses'=>'Frontend\UserController@GetOrderDetail']);
   Route::get('/cancel_order/{order_id}', ['as'=>'DetailOrder','uses'=>'Frontend\UserController@GetCancelDetail']);
});
  

// Backend
Route::get('admin/login', 'Admin\AuthController@getLoginAdmin');
Route::get('admin/logout', 'Admin\AuthController@getLogoutAdmin')->name('logout');
Route::post('admin/login', 'Admin\AuthController@postLoginAdmin');
Route::group(['namespace' => 'Admin',
    'prefix' => 'admin',
    'as'=>'Admin::',
    'middleware' => 'adminLogin'], function () {
    Route::group(['prefix' => 'dashboard','as'=>'dashboard@'], function () {
        Route::get('/',['as'=>'index','uses'=>'DashboardController@index']);
    });
    Route::group(['prefix' => 'user','as'=>'user@'], function () {
        Route::get('/',['as'=>'index','uses'=>'UserController@index'] );
        Route::get('add',['as'=>'add','uses'=> 'UserController@getAdd']);
        Route::post('store',['as'=>'store','uses'=> 'UserController@store'] );
        Route::get('edit/{id}',['as'=>'edit','uses'=>'UserController@getEdit'] );
        Route::get('delete/{id}', ['as'=>'delete','uses'=>'UserController@getDelete']);
        Route::post('edit/{id}', ['as'=>'update','uses'=>'UserController@update']);

    });
    Route::group(['prefix' => 'category','as'=>'category@'], function () {
        Route::get('/',['as'=>'index','uses'=>'CategoryController@index'] );
        Route::get('add',['as'=>'add','uses'=> 'CategoryController@getAdd']);
        Route::post('store',['as'=>'store','uses'=> 'CategoryController@store'] );
        Route::get('edit/{id}',['as'=>'edit','uses'=>'CategoryController@getEdit'] );
        Route::get('delete/{id}', ['as'=>'delete','uses'=>'CategoryController@getDelete']);
        Route::post('edit/{id}', ['as'=>'update','uses'=>'CategoryController@update']);

    });
    Route::group(['prefix' => 'product','as'=>'product@'], function () {
        Route::get('/',['as'=>'index','uses'=>'ProductController@index'] );
        Route::get('add',['as'=>'add','uses'=> 'ProductController@getAdd']);
        Route::post('store',['as'=>'store','uses'=> 'ProductController@store'] );
        Route::get('edit/{id}',['as'=>'edit','uses'=>'ProductController@getEdit'] );
        Route::get('delete/{id}', ['as'=>'delete','uses'=>'ProductController@getDelete']);
        Route::post('edit/{id}', ['as'=>'update','uses'=>'ProductController@update']);
    });
});
