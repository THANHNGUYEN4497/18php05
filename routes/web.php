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
use App\sliderModel;

Route::get('/', function () {
    $dataSlider = sliderModel::all();
    return view('home.homepage.Homepage',['dataSlider' => $dataSlider]);
});
Route::get('admin/login','usercontroller@moveLogin');
Route::get('admin/logout','usercontroller@logout')->name('admin.logout');
Route::post('admin/login','usercontroller@checkLogin')->name('admin.login');

Route::group(['prefix' => 'admin','middleware' => 'adminCheck'], function () {
    Route::group(['prefix' => 'UserAction'], function () {
        // url : admin/UserAction/AddUser
        Route::get('DeleteUser/{id_user}','usercontroller@deleteuser');
        Route::get('ListUser','usercontroller@listuser')->name('ListUser');
        Route::get('AddUser','usercontroller@adduser')->name('AddUser');
        Route::post('AddUser','usercontroller@postadduser')->name('AddUser');
        Route::get('EditUser/{id_user}','usercontroller@edituser');
        Route::post('EditUser/{id_user}','usercontroller@postedituser');
        Route::get('test','usercontroller@test');
    });
    Route::group(['prefix' => 'CategoryAction'], function () {
        Route::get('DeleteCategory/{id_cate}','categoryPro@deleteCategory');
        Route::get('ListCategory','categoryPro@listCategory')->name('ListCategory');
        Route::get('AddCategory','categoryPro@addCategory')->name('AddCategory');
        Route::post('AddCategory','categoryPro@postAddCategory')->name('AddCategory');
        Route::get('EditCategory/{id_pro}','categoryPro@editCategory');
        Route::post('EditCategory','categoryPro@postEditCategory')->name('EditCategory');
        Route::get('/',function(){
            echo "enterd";
        });
    });
    Route::group(['prefix' => 'BrandAction'], function () {
        Route::get('DeleteBrand/{id_brand}','brandProduct@deleteBrand');
        Route::get('ListBrand','brandProduct@listBrand')->name('ListBrand');
        Route::get('AddBrand','brandProduct@addBrand')->name('AddBrand');
        Route::post('AddBrand','brandProduct@postAddBrand')->name('AddBrand');
        Route::get('EditBrand/{id_pro}','brandProduct@editBrand');
        Route::post('EditBrand','brandProduct@postEditBrand')->name('EditBrand');
        Route::get('test','product@test');
    });
    Route::group(['prefix' => 'ProductAction'], function () {
        Route::get('getDataBrand/{id_cate}','product@getdatabrand');
        Route::get('DeleteProduct/{id_pro}','product@deleteProduct');
        Route::get('ListProduct','product@listProduct')->name('ListProduct');
        Route::get('AddProduct','product@addProduct')->name('AddProduct');
        Route::post('AddProduct','product@postAddProduct')->name('AddProduct');
        Route::get('EditProduct/{id_pro}','product@editProduct');
        Route::post('EditProduct','product@postEditProduct')->name('postEditProduct');
        Route::get('test','product@test');
    });
    Route::group(['prefix' => 'SliderAction'], function () {
        Route::get('getDataBrand/{id_cate}','product@getdatabrand');
        Route::get('DeleteSlider/{id_sli}','slider@deleteSlider');
        Route::get('ListSlider','slider@listSlider')->name('ListSlider');
        Route::get('AddSlider','slider@addSlider');
        Route::post('AddSlider','slider@postAddSlider')->name('AddSlider');
        Route::get('EditSlider/{id_sli}','slider@editSlider');
        Route::post('EditSlider','slider@postEditSlider')->name('postEditSlider');
        Route::get('test','Slider@test');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
