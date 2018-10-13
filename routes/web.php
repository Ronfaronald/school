<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('schools', 'Admin\SchoolsController');
    Route::post('schools_mass_destroy', ['uses' => 'Admin\SchoolsController@massDestroy', 'as' => 'schools.mass_destroy']);
    Route::post('schools_restore/{id}', ['uses' => 'Admin\SchoolsController@restore', 'as' => 'schools.restore']);
    Route::delete('schools_perma_del/{id}', ['uses' => 'Admin\SchoolsController@perma_del', 'as' => 'schools.perma_del']);
    Route::resource('schoolarships', 'Admin\SchoolarshipsController');
    Route::post('schoolarships_mass_destroy', ['uses' => 'Admin\SchoolarshipsController@massDestroy', 'as' => 'schoolarships.mass_destroy']);
    Route::post('schoolarships_restore/{id}', ['uses' => 'Admin\SchoolarshipsController@restore', 'as' => 'schoolarships.restore']);
    Route::delete('schoolarships_perma_del/{id}', ['uses' => 'Admin\SchoolarshipsController@perma_del', 'as' => 'schoolarships.perma_del']);
    Route::resource('exam_papers', 'Admin\ExamPapersController');
    Route::post('exam_papers_mass_destroy', ['uses' => 'Admin\ExamPapersController@massDestroy', 'as' => 'exam_papers.mass_destroy']);
    Route::post('exam_papers_restore/{id}', ['uses' => 'Admin\ExamPapersController@restore', 'as' => 'exam_papers.restore']);
    Route::delete('exam_papers_perma_del/{id}', ['uses' => 'Admin\ExamPapersController@perma_del', 'as' => 'exam_papers.perma_del']);
    Route::resource('ministries', 'Admin\MinistriesController');
    Route::post('ministries_mass_destroy', ['uses' => 'Admin\MinistriesController@massDestroy', 'as' => 'ministries.mass_destroy']);
    Route::post('ministries_restore/{id}', ['uses' => 'Admin\MinistriesController@restore', 'as' => 'ministries.restore']);
    Route::delete('ministries_perma_del/{id}', ['uses' => 'Admin\MinistriesController@perma_del', 'as' => 'ministries.perma_del']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    Route::get('/', 'ImportController@getImport')->name('import');
    Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
    Route::post('/import_process', 'ImportController@processImport')->name('import_process');

 
});
