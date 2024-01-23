<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::fallback(function(){
  //  return redirect('/');
//});
Route::get('image', function(){
    return view('image');
});
Route::get('food', function(){
    return view('food');
});
Route::prefix('lar')->group(function(){
    Route::get('/', function(){
        return view('test');
    });
Route::get('test', function(){
    return 'welcome my first laravel website';
});
Route::get('/test1/', function(){
    return view ('test1');
});
Route::get('/test2/{id?}', function($id = 0){
    return 'The ID 2 is :' . $id;
})->whereNumber('id');
Route::get('/test3/{name?}', function($name = null){
    return 'The name is :' . $name;
})->whereAlpha('name');

Route::get('/test4/{id?}/{name?}', function($id = 0, $name){
    return 'The ID 2 is :' . $id . "  ".'The name is :' . $name;
})->where(['id' => '[0-9]+', 'name'=>'[a-zA-Z]+']);

Route::get('/product/{category?}', function($cat){
    return 'The category is :' . $cat ;
})->whereIn('category',['pc','moile','tv']);
});

//task1
Route::get('about', function(){
    return 'My first project';
});

Route::get('ContactUs', function(){
    return view('contactus');
});

Route::prefix('Blog')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('science', function(){
        return '<h1> welcome Science Page <h1>';
    });

    Route::get('Sports', function(){
        return '<h1> welcome My Sports Page <h1>';
    });

    Route::get('Math', function(){
        return view('math');
    });

    Route::get('Medical', function(){
        return view('food');
    });

});

Route::get('login', function(){
    return view('login');
});
//Route::post('logged', function(){
  //  return 'you are loggrd in';
//})->name('logged');

Route::get('control', [ExampleController::class,'show']);
Route::post('imageUpload', [ExampleController::class,'upload'])->name('imageUpload');
//task3
Route::post('logged', [LoginController::class,'log'])->name('logged');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ Route::get('createCar', [CarController::class,'create'])->middleware('verified')->name('createCar');
        Route::get('cars', [CarController::class,'index'])->name('cars');
        Route::post('storeCar', [CarController::class,'store'])->name('storeCar');
        Route::get('updateCar/{id}', [CarController::class,'edit']);
        Route::put('update/{id}', [CarController::class,'update'])->name('update');
        Route::get('showCar/{id}', [CarController::class,'show']);
        Route::get('deleteCar/{id}', [CarController::class,'destroy']);
        Route::get('trashedCar', [CarController::class,'trashed'])->name('trashed');
        Route::get('forceDelete/{id}', [CarController::class,'forceDelete'])->name('forceDelete');
        Route::get('restoreCar/{id}', [CarController::class,'restore'])->name('restoreCar');
        Auth::routes(['verify'=>true]);
    });
//store data into car tale

// task4
Route::get('createPost', [PostController::class,'create'])->name('createPost');
Route::get('posts', [postController::class,'index'])->name('posts');
Route::post('storePost', [PostController::class,'store'])->name('storePost');
Route::get('showPost/{id}', [postController::class,'show']);
Route::get('updatePost/{id}', [postController::class,'edit']);
Route::put('updateP/{id}', [postController::class,'update'])->name('updateP');
Route::get('deletePost/{id}', [postController::class,'destroy']);
Route::get('trashedPost', [postController::class,'trashed'])->name('trashedPost');
Route::get('restorePost/{id}', [postController::class,'restore'])->name('restorePost');
Route::get('forceDelete/{id}', [postController::class,'forceDelete'])->name('forceDeletePost');

Route::get('testHome', function(){
    return view ('testHome');
})->name('testHome');

Route::get('404', function(){
    return view ('404');
})->name('404');
Route::get('contact', function(){
    return view ('contact');
})->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('test20', [ExampleController::class,'createsession']);
Route::post('contact_mail', [ExampleController::class, 'contact_mail_send'])->name('contact_mail');