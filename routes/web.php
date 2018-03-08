<?php



Auth::routes();

route::get('/', 'PostController@index');

route::get('/post/{post}', [
  'uses' => 'PostController@show',
  'as' => 'post.show'
]);

Route::resource('/comment', 'CommentController');

Route::resource('/category', 'CategoryController');

Route::get('/admin', 'AdminPostController@index');

//Route::resource('/admin/post', 'AdminPostController');
Route::get('/admin/post', [
  'uses' => 'AdminPostController@showAll',
  'as' => 'admin.post.showall'
]);

Route::get('/admin/post/create', [
  'uses' => 'AdminPostController@create',
  'as' => 'admin.post.create'
]);

Route::post('/admin/post', [
  'uses' => 'AdminPostController@store',
  'as' => 'admin.post.store'
]);

Route::get('/admin/post/{id}/edit', [
  'uses' => 'AdminPostController@edit',
  'as' => 'admin.post.edit'
]);

Route::patch('/admin/post/{id}', [
  'uses' => 'AdminPostController@update',
  'as' => 'admin.post.update'
]);
