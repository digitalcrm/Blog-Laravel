<?php
//User Routes:

Route::group(['namespace' => 'User'], function(){
		
		Route::get('/','HomeController@index');
		Route::get('post/{post?}','PostController@post')->name('post');

		Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
		Route::get('post/category/{category}','HomeController@category')->name('category');
});

//Admin Routes:

Route::group(['namespace' => 'Admin'], function(){
			Route::get('admin/home','HomeController@index')->name('admin.home');
			//Route::resource('admin/post','Admin\PostController'); -> uses this if not resource controller
			//User routes
			Route::resource('admin/user','UserController');
			//Role routes
			Route::resource('admin/role','RoleController');
			//Permission routes
			Route::resource('admin/permission','PermissionController');
			//Post routes
			Route::resource('admin/post','PostController');
			//tag routes
			Route::resource('admin/tag','TagController');
			//category routes
			Route::resource('admin/category','CategoryController');
			//Admin Routes 1
			Route::get('admin-login','Auth\LoginController@showLoginForm')->name('admin.login');
			// Admin Routes2 copy 1,2 from Router.php auth code and edit yourself 
			Route::post('admin-login', 'Auth\LoginController@login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
