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





//Auth::routes();
Auth::routes(['register' => false]); //removes registration





Route::get('/counter', function() {
    return view('livewire.counter');
});

Route::get('/hello', function() {
    return view('livewire.hello-world');
});

Route::get('/password', function() {
    return view('parent-set-password');
})->name('route.password');

Route::get('/teacher-password', function() {
    return view('teacher-password');
})->name('route.teacher_password');


Route::get('/video-upload', function() {
    return view('video-upload');
})->name('route.v-upload');


Route::get('/map-video', function() {
    return view('map-video');
})->name('route.map_video');



Route::get('/authenticate', function() {
    return view('parent-authenticate');
})->name('route.authenticate');


Route::get('/teacher-authenticate', function() {
    return view('teacher-authenticate');
})->name('route.teacher_authenticate');


Route::get('/forgot_password', function() {
    return view('forgot_password');
})->name('forgot.password');


Route::get('/online-class', function() {
    return view('online-class');
})->name('online.class');


Route::get('/courses', function() {
    return view('courses');
})->name('route.courses');


Route::group(['middleware' => 'web'], function() {
    Route::get('/', function() {
        return view('parent-login');
    })->name('route.parent_login');

    Route::get('/teacher-login', function() {
        return view('teacher-login');
    })->name('route.teacher_login');

    Route::get('/parent-verify', function() {
        return view('parent-verify');
    })->name('route.parent_verify');


    Route::get('/teacher-verify', function() {
        return view('teacher-verify');
    })->name('route.teacher_verify');
});


//Route::post('/users/store', 'UsersController@store')->name('parent.mobile');
Route::post('/users/parentLogin', 'ParentLoginController@parentLogin')->name('users.parent_login');
Route::post('/users/teacherLogin', 'TeacherLoginController@teacherLogin')->name('users.teacher_login');

Route::post('/users/parentVerify', 'ParentVerifyController@parentVerify')->name('users.parent_otp');
Route::post('/users/teacherVerify', 'TeacherVerifyController@teacherVerify')->name('users.teacher_otp');

Route::post('/users/parentSetPassword', 'ParentPasswordController@parentSetPassword')->name('users.parent_set_password');
Route::post('/users/teacherPassword', 'TeacherPasswordController@teacherPassword')->name('users.teacher_password');

Route::post('/users/parentAuthenticate', 'ParentPasswordController@parentAuthenticate')->name('users.parent_authenticate');
Route::post('/users/teacherAuthenticate', 'TeacherPasswordController@teacherAuthenticate')->name('users.teacher_authenticate');

//Route::post('v-upload', 'VideoUploadController@videoUpload')->middleware('auth');
Route::post('/save-video', 'VideoUploadController@save')->middleware('auth');
Route::post('/new-subject', 'CourseSubjectsController@save')->middleware('auth'); 
Route::post('/new-lesson', 'CourseLessonsController@save')->middleware('auth'); 
Route::post('/new-section', 'CourseSectionsController@save')->middleware('auth'); 
Route::post('/new-title', 'CourseTitlesController@save')->middleware('auth'); 

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/teacher', 'TeacherController@index')->name('teacher')->middleware('auth');
Route::get('/online-class', 'OnlineClassController@index')->name('oc')->middleware('auth');
Route::get('/courses', 'CourseController@index')->name('courses')->middleware('auth');
Route::get('/course-videos/{course}', 'CourseController@getCourseVideos')->middleware('auth');
Route::get('/map-video', 'CourseController@getCourseVideosForTeacher')->middleware('auth');




