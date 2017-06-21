<?php


Route::get('/', 'FrontController@index')->name('home');
Route::get('/about', 'FrontController@about')->name('about');

Auth::routes();

Route::get('/home', 'admin\HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');


Route::group(['prefix' => 'admin','middleware'=> ['auth','checkuser','web']], function(){
	Route::get('/',function(){
		return view('admin.dashboard');})->name('admin.index');
	Route::resource('note','admin\NotesController');
	Route::post('note/delete', 'admin\NotesController@delete')->name('note.delete');
	Route::resource('subject','admin\SubjectController');
	Route::resource('faculty', 'admin\FacultyController');
	Route::get('faculty/search', 'admin\FacultyController@search')->name('faculty.search');
	

	Route::group(['prefix' => 'member','middleware'=>['admin']], function(){
        Route::get('/', 'admin\MemberController@index')->name('member.index');
        Route::get('/create', 'admin\MemberController@create')->name('member.create');
        Route::post('/store', 'admin\MemberController@store')->name('member.store');
        Route::get('/status', 'admin\MemberController@status')->name('member.status');
        Route::post('/member-edit/{id}', 'admin\MemberController@member_edit')->name('member-update');

	});

});

Route::group(['middleware'=> 'auth'], function(){		
		Route::get('/notes','CheckoutController@notes')->name('front.notes'); 
		Route::get('/faculty/{id}','CheckoutController@faculty')->name('front.faculty');
		Route::get('/subject/{id}','CheckoutController@subject')->name('front.subject');
});

