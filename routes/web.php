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

Route::get('/', function () {
    return view('welcome');
});
Route::get('index',[
	'as'=> 'trang-chu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{type}',[
    'as'=> 'loaisanpham',
    'uses'=>'PageController@getLoaiSP'

]);
Route::get('chi-tiet-san-pham/{id}',[
      'as'=>'chitietsanpham',
      'uses'=>'PageController@getChitiet'  

]);
Route::get('dang-nhap',[
        'as'=>'login',
        'uses'=>'PageController@getLogin'
]);
Route::get('dang-ky',[
        'as'=>'sigin',
        'uses'=>'PageController@getSigin'
]);
Route::post('dang-ky',[
        'as'=>'sigin',
        'uses'=>'PageController@postSigin'
]);
Route::post('dang-nhap',[
        'as'=>'login',
        'uses'=>'PageController@postLogin'
]);
Route::get('logout',[
        'as'=>'logout',
        'uses'=>'PageController@postLogout'
]);
Route::get('add-post',[
        'as'=>'addPost',
        'uses'=>'PageController@getAddPost'
]);
Route::post('save-post',[
        'as'=>'savePost',
        'uses'=>'PageController@savePost'
]);
Route::get('creat/{id?}',[
        'as'=>'creat',
        'uses'=>'PageController@savePost'
]);
Route::get('search',[
		'as'=>'search',
		'uses'=>'PageController@getSearch'


]);
Route::get('tang',[
	'as'=>'tang',
	'uses'=>'PageController@getTang'


]);
Route::get('thue',[
	'as'=>'thue',
	'uses'=>'PageController@getThue'


]);
Route::get('traodoi',[
	'as'=>'traodoi',
	'uses'=>'PageController@getTraodoi'


]);
Route::get('muon',[
	'as'=>'muon',
	'uses'=>'PageController@getMuon'


]);
Route::get('tang',[
	'as'=>'tang',
	'uses'=>'PageController@getTang'


]);
Route::get('thoathuan',[
	'as'=>'thoathuan',
	'uses'=>'PageController@getThoathuan'


]);