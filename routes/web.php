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
    return redirect()->route('login');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home',[
    'uses' => 'admin\HomeController@index',
    'as' => 'admin.HomeController.index'
    ]);

    // CRUD BANNER
    Route::post('/home/upload',[
        'uses' => 'admin\HomeController@upload_banner',
        'as' => 'admin.HomeController.upload_banner'
        ]);

    Route::delete('/home/delete/{id}',[
        'uses' => 'admin\HomeController@destroy_banner',
        'as' => 'admin.HomeController.destroy_banner'
        ]);

    Route::post('/home/aktif/{id}',[
        'uses' => 'admin\HomeController@aktif_banner',
        'as' => 'admin.HomeController.aktif_banner'
        ]);

    // CRUD STATISTIK BACKGROUND
    Route::post('/home/upload_stk_bg',[
        'uses' => 'admin\HomeController@upload_stk_bg',
        'as' => 'admin.HomeController.upload_stk_bg'
        ]);

    Route::delete('/home/delete_stk_bg/{id}',[
        'uses' => 'admin\HomeController@destroy_stk_bg',
        'as' => 'admin.HomeController.destroy_stk_bg'
        ]);

    Route::post('/home/aktif_stk/{id}',[
        'uses' => 'admin\HomeController@aktif_stk_bg',
        'as' => 'admin.HomeController.aktif_stk_bg'
        ]);
    
    Route::post('/home/insert_stk',[
        'uses' => 'admin\HomeController@input_stat',
        'as' => 'admin.HomeController.input_stat'
        ]);
    
    Route::post('/home/update_video',[
        'uses' => 'admin\HomeController@input_video_text',
        'as' => 'admin.HomeController.input_video_text'
        ]);

    // CRUD TESTIMONI

    Route::post('/home/insert_testi',[
        'uses' => 'admin\HomeController@input_testi',
        'as' => 'admin.HomeController.input_testi'
        ]);
    
    Route::post('/home/update_testi',[
        'uses' => 'admin\HomeController@update_testi',
        'as' => 'admin.HomeController.update_testi'
        ]);

// Route Cara Kerja Controller
Route::get('/carakerja',[
    'uses' => 'admin\CaraKerjaController@index',
    'as' => 'admin.CaraKerjaController.index'
    ]);

    Route::post('/flow',[
        'uses' => 'admin\CaraKerjaController@input_flow',
        'as' => 'admin.CaraKerjaController.input_flow'
        ]);
    
    Route::post('/syaratPerusahaan',[
        'uses' => 'admin\CaraKerjaController@update_syarat_perusahaan',
        'as' => 'admin.CaraKerjaController.update_syarat_perusahaan'
        ]);

    Route::post('/input_syaratPerusahaan',[
        'uses' => 'admin\CaraKerjaController@input_syarat_perusahaan',
        'as' => 'admin.CaraKerjaController.input_syarat_perusahaan'
        ]);

    Route::post('/input_syaratPerorangan',[
        'uses' => 'admin\CaraKerjaController@input_syarat_perorangan',
        'as' => 'admin.CaraKerjaController.input_syarat_perorangan'
        ]);

// Route Cara Kerja Controller
Route::get('/tentangkami',[
    'uses' => 'admin\TentangKamiController@index',
    'as' => 'admin.TentangKamiController.index'
    ]);

        Route::post('/tambah_deskripsi',[
            'uses' => 'admin\TentangKamiController@input_deskripsi',
            'as' => 'admin.TentangKamiController.input_deskripsi'
            ]);
    
        Route::post('/update_deskripsi',[
            'uses' => 'admin\TentangKamiController@update_deskripsi',
            'as' => 'admin.TentangKamiController.update_deskripsi'
            ]);

        Route::post('/tambah_team',[
            'uses' => 'admin\TentangKamiController@upload_team',
            'as' => 'admin.TentangKamiController.upload_team'
            ]);

        Route::post('/update_team',[
            'uses' => 'admin\TentangKamiController@update_team',
            'as' => 'admin.TentangKamiController.update_team'
            ]);

        Route::post('/update_stat_tk',[
            'uses' => 'admin\TentangKamiController@update_stat',
            'as' => 'admin.TentangKamiController.update_stat'
            ]);

// Route Bantuan Controller
Route::get('bantuan',[
    'uses' => 'admin\BantuanController@index',
    'as' => 'admin.BantuanController.index'
    ]);

    Route::post('/input_bantuan',[
        'uses' => 'admin\BantuanController@store',
        'as' => 'admin.BantuanController.store'
        ]);

    Route::post('/update_bantuan/{id}',[
        'uses' => 'admin\BantuanController@update',
        'as' => 'admin.BantuanController.update'
        ]);

// Route Cara Kerja Controller
Route::get('/karir',[
    'uses' => 'admin\KarirController@index',
    'as' => 'admin.KarirController.index'
    ]);

    Route::post('/input_karir',[
        'uses' => 'admin\KarirController@store',
        'as' => 'admin.KarirController.store'
        ]);

    Route::post('/edit_karir/{id}',[
        'uses' => 'admin\KarirController@edit',
        'as' => 'admin.KarirController.edit'
        ]);

    Route::post('/update_karir/{id}',[
        'uses' => 'admin\KarirController@update',
        'as' => 'admin.KarirController.update'
        ]);
