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

Auth::routes();
Route::get('/', 'WelcomeController@index');
Route::get('/faq', 'WelcomeController@faq')->name('faq');
Route::get('/news', 'WelcomeController@news')->name('news');
Route::get('/news/data/{slug}', 'WelcomeController@newsDetail')->name('newsDetail');
Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');
Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');

Route::post('send/mail', 'SendController@send')->name('send.mail');
Route::group(['prefix' => 'earn', 'as' => 'earn.'], function() {
  Route::get('/', ['as' => 'index', 'uses'=>'EarnController@index']);
  Route::post('stack', ['as' => 'stack', 'uses'=>'EarnController@stacking']);
});

Route::group(['prefix' => 'history', 'as' => 'history.'], function() {
  Route::get('/', ['as' => 'index', 'uses'=>'HistoryController@index']);
});

Route::group(['middleware' => ['auth','block-user','revalidate']], function() {
    Route::get('/home', ['as' => 'home', 'uses'=>'HomeController@index']);
   	// register package 
   	Route::group(['prefix' => 'staking', 'as' => 'program.'], function() {
      Route::get('/composition/{id}', ['as' => 'composition', 'uses' => 'ProgramController@getComposition']);
      Route::get('/invest', ['as' => 'index', 'uses' => 'ProgramController@index']);
      Route::get('/invest/admin', ['as' => 'by_admin', 'uses' => 'ProgramController@by_admin'])->middleware(['permission:administrator']);
      Route::post('/register', ['as' => 'register', 'uses' => 'ProgramController@register']);
      Route::post('/register/add_member', ['as' => 'register.add_member', 'uses' => 'ProgramController@register_add_member']);
      Route::post('/register/by_admin', ['as' => 'register_byadmin', 'uses' => 'ProgramController@register_byadmin'])->middleware(['permission:administrator']);
      Route::get('/history', ['as' => 'history', 'uses' => 'ProgramController@history']);
      Route::get('/list/{regby}', ['as' => 'list', 'uses' => 'ProgramController@list_program'])->middleware(['permission:administrator']);

      // stop & run capital back
      Route::get('/profit_capital/{type}/{desc}/{id}', ['as' => 'profit_capital', 'uses' => 'ProgramController@profit_capital'])->middleware(['permission:administrator']);
      
      // bonus
      Route::get('/commission/{type}', ['as' => 'bonus_active', 'uses' => 'BonusController@bonus_active']);
      Route::get('/commission/daily', ['as' => 'bonus_profit', 'uses' => 'BonusController@bonus_profit']);
      Route::get('/list/commission/{type}', ['as' => 'list_bonus_active', 'uses' => 'BonusController@list_bonus_active'])->middleware(['permission:administrator']);
   	});

    // user 
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
      Route::get('/profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
      Route::get('/add_member', ['as' => 'add_member', 'uses' => 'UserController@add_member']);
      Route::post('/update/password', ['as' => 'updatePassword', 'uses' => 'UserController@updatePassword']);
      Route::post('/update/password/trx', ['as' => 'updatePasswordtrx', 'uses' => 'UserController@updatePasswordtrx']);
      Route::get('/list/donwline', ['as' => 'list_donwline', 'uses' => 'UserController@list_donwline']);
      Route::get('/downline/{id}', ['as' => 'list_donwline_user', 'uses' => 'UserController@list_donwline_user']);
      Route::get('/create', ['as' => 'index', 'uses' => 'UserController@index'])->middleware(['permission:administrator']);
      Route::post('/create', ['as' => 'create', 'uses' => 'UserController@create'])->middleware(['permission:administrator']);
      Route::get('/list/{role}', ['as' => 'list_user', 'uses' => 'UserController@list_user'])->middleware(['permission:administrator']);
      Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'UserController@edit'])->middleware(['permission:administrator']);
      Route::post('/updateData/{id}', ['as' => 'updateData', 'uses' => 'UserController@updateData'])->middleware(['permission:administrator']);
      Route::get('/get_user', ['as' => 'get_user', 'uses' => 'UserController@getUsername']);
      Route::post('/uploadFoto', ['as' => 'uploadFoto', 'uses' => 'UserController@uploadFoto']);
      Route::get('/searchUser', ['as' => 'searchUser', 'uses' => 'UserController@searchUser']);
      Route::get('/block_unclock/{id}', ['as' => 'block_unclock', 'uses' => 'UserController@block_unclock'])->middleware(['permission:administrator']);
      Route::get('/list_sponsor', ['as' => 'list_sponsor', 'uses' => 'UserController@list_sponsor'])->middleware(['permission:administrator']);
    });

    // balance
    Route::group(['prefix' => 'wallet', 'as' => 'balance.'], function() {
      Route::get('/', ['as' => 'user', 'uses' => 'BalanceController@balance_user'])->middleware(['permission:administrator']);
      Route::get('/my_wallet', ['as' => 'my', 'uses' => 'BalanceController@balance_my']);
      Route::get('/harvest_wallet', ['as' => 'harvest', 'uses' => 'BalanceController@balance_harvest']);
      Route::get('/register_wallet', ['as' => 'register', 'uses' => 'BalanceController@balance_register']);
      Route::get('/my_wallet/{id}', ['as' => 'my_member', 'uses' => 'BalanceController@balance_my_member'])->middleware(['permission:administrator']);
      Route::get('/harvest_wallet/{id}', ['as' => 'harvest_member', 'uses' => 'BalanceController@balance_harvest_member'])->middleware(['permission:administrator']);
      Route::get('/register_wallet/{id}', ['as' => 'register_member', 'uses' => 'BalanceController@balance_register_member'])->middleware(['permission:administrator']);
    });

    // setting 
    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function() {
      Route::get('/', ['as' => 'index', 'uses' => 'SettingController@index'])->middleware(['permission:administrator']);
      Route::post('/update', ['as' => 'update', 'uses' => 'SettingController@update'])->middleware(['permission:administrator']);

      Route::get('/roi', ['as' => 'package', 'uses' => 'SettingController@package'])->middleware(['permission:administrator']);
      Route::post('/update/package', ['as' => 'updatePackage', 'uses' => 'SettingController@updatePackage'])->middleware(['permission:administrator']);
    });

    // log 
    Route::group(['prefix' => 'generate', 'as' => 'generate.'], function() {
      Route::get('/bonus', ['as' => 'viewGenerateBonus', 'uses' => 'GenerateController@viewGenerateBonus'])->middleware(['permission:administrator']);
      Route::get('/log', ['as' => 'log', 'uses' => 'GenerateController@log'])->middleware(['permission:administrator']);
      Route::get('/bonus_pasif', ['as' => 'bonus_pasif', 'uses' => 'GenerateController@bonus_pasif'])->middleware(['permission:administrator']);
      Route::get('/bonus_weekly', ['as' => 'bonus_weekly', 'uses' => 'GenerateController@bonus_weekly'])->middleware(['permission:administrator']);
    });

    // wallet
    Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function() {
      Route::get('/', ['as' => 'index', 'uses' => 'WalletController@index']);
      Route::get('/list', ['as' => 'list', 'uses' => 'WalletController@list'])->middleware(['permission:administrator']);
      Route::get('/create', ['as' => 'create', 'uses' => 'WalletController@createAddress']);
      Route::get('/send', ['as' => 'send', 'uses' => 'WalletController@sendTransaksi']);
    });

    // news
    Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
      Route::get('/list', ['as' => 'index', 'uses' => 'NewsController@index']);
      Route::get('/add', ['as' => 'add', 'uses' => 'NewsController@add']);
      Route::post('/store', ['as' => 'store', 'uses' => 'NewsController@store']);
      Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'NewsController@edit']);
      Route::post('/update/{id}', ['as' => 'update', 'uses' => 'NewsController@update']);
      Route::get('/delete/{id}', ['as' => 'delete', 'uses' => 'NewsController@delete']);
    });
}); 