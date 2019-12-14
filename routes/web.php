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

Route::get('/','frontEnd\FrontEndController@index')->name('frontEnd.home');
Route::get('/about-us','frontEnd\FrontEndController@aboutUs')->name('aboutUs');
Route::get('/contact-us','frontEnd\FrontEndController@contactForm')->name('contactUs');
Route::post('/contact-us','frontEnd\FrontEndController@contactStore');

 
//teacher route
Route::group(['prefix'=>'teacher','namespace'=>'Teacher'],function(){
  Route::get('login/','Auth\LoginController@showLoginForm')->name('teacher.login');
  Route::POST('login/process/','Auth\LoginController@login')->name('teacher.login.process');
  Route::post('/logout','Auth\LoginController@logout')->name('teacher.logout');
  Route::get('registrar/varify/{token}/','Auth\RegisterController@registrationVarify')->name('teacher.registrar.varify');

  //dashboard
	Route::get('dashboard/','DashboardController@index')->name('teacher.dashboard.index');

	//Update user profile 

	Route::get('/profile/edit/','Profile\ProfileUpdateController@ProfileUpdate')->name('teacher.profile.update');
	Route::post('/profile/store/','Profile\ProfileUpdateController@profileStore')->name('teacher.profile.store');
	Route::get('/profile/','Profile\ProfileUpdateController@index')->name('teacher.profile');


	//teacher change password

	Route::post('/profile/password/store/','Profile\ProfileUpdateController@passwordStore')->name('teacher.profile.password.store');
	Route::get('/profile/password-change','Profile\ProfileUpdateController@changePassword')->name('teacher.profile.password.change');

	//assign course

	Route::get('assign/courses/','TeacherCourseAssignController@index')->name('teacher.teacherAssign.index');



	//content upload
	Route::get('content/course-content-each-semester/create/','ContentController@create')->name('teacher.content.create');
	Route::get('content/course-content-each-semester/coursees/','ContentController@index')->name('teacher.content.index');
	Route::post('content/course-content-each-semester/store/','ContentController@store')->name('teacher.content.store');
	Route::get('content/course-content-each-semester/edit/{id}','ContentController@edit')->name('teacher.content.edit');
	Route::put('content/course-content-each-semester/update/{id}/','ContentController@update')->name('teacher.content.update');
	Route::delete('content/course-content-each-semester/delete/{id}/','ContentController@delete')->name('teacher.content.delete');

});

//users route
Route::group(['prefix'=>'user','namespace'=>'User'],function(){
	 //login

	Route::get('login/','Auth\LoginController@showLoginForm')->name('user.login');
	Route::POST('login/process/','Auth\LoginController@login')->name('user.login.process');
	Route::post('/logout','Auth\LoginController@logout')->name('user.logout');
    //regitration
	Route::get('registrar/','Auth\RegisterController@showRegistrationForm')->name('user.registrar');

	Route::post('registrar/','Auth\RegisterController@registrationProcess');
	Route::get('registrar/varify/{token}/','Auth\RegisterController@registrationVarify')->name('registrar.varify');
   //reset password
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('user.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('user.password.update');


    //Update user profile 

	Route::get('/profile/edit/','Profile\ProfileUpdateController@ProfileUpdate')->name('user.profile.update');
	Route::post('/profile/store/','Profile\ProfileUpdateController@profileStore')->name('user.profile.store');
	Route::get('/profile/','Profile\ProfileUpdateController@index')->name('user.profile');


	//user change password

	Route::post('/profile/password/store/','Profile\ProfileUpdateController@passwordStore')->name('user.profile.password.store');
	Route::get('/profile/password-change','Profile\ProfileUpdateController@changePassword')->name('user.profile.password.change');

	//view content each semester
	Route::get('view-content','UserViewContentController@viewContent')->name('user.content.view');
	Route::get('get-content','UserViewContentController@getContent')->name('user.content.get');


    //dashboard
	Route::get('dashboard/','DashboardController@index')->name('user.dashboard.index');


});


//comment area

Route::post('comment','Admin\CommentsController@commentStore')->name('comment.store');
Route::post('comment/reply','Admin\ReplyesController@replyStore')->name('reply.store');
//admin route

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){

	//dashboard
	Route::get('dashboard/','DashboardController@index')->name('admin.dashboard.index');
	
	
	//login 
	Route::get('login/','Auth\LoginController@showLoginForm')->name('admin.login');
	Route::POST('login/process/','Auth\LoginController@login')->name('admin.login.process');
	Route::post('/logout','Auth\LoginController@logout')->name('admin.logout');

	//faculty
	Route::get('faculty/create/','FacultyController@create')->name('admin.faculty.create');
	Route::get('faculty/faculties/','FacultyController@index')->name('admin.faculty.index');
	Route::post('faculty/store/','FacultyController@store')->name('admin.faculty.store');
	Route::get('faculty/edit/{id}','FacultyController@edit')->name('admin.faculty.edit');
	Route::put('faculty/update/{id}/','FacultyController@update')->name('admin.faculty.update');
	Route::delete('faculty/delete/{id}/','FacultyController@delete')->name('admin.faculty.delete');

	//department
	Route::get('department/create/','DepartmentController@create')->name('admin.department.create');
	Route::get('department/departments/','DepartmentController@index')->name('admin.department.index');
	Route::post('department/store/','DepartmentController@store')->name('admin.department.store');
	Route::get('department/edit/{id}','DepartmentController@edit')->name('admin.department.edit');
	Route::put('department/update/{id}/','DepartmentController@update')->name('admin.department.update');
	Route::delete('department/delete/{id}/','DepartmentController@delete')->name('admin.department.delete');

	//program
	Route::get('program/create/','ProgramController@create')->name('admin.program.create');
	Route::get('program/programs/','ProgramController@index')->name('admin.program.index');
	Route::post('program/store/','ProgramController@store')->name('admin.program.store');
	Route::get('program/edit/{id}','ProgramController@edit')->name('admin.program.edit');
	Route::put('program/update/{id}/','ProgramController@update')->name('admin.program.update');
	Route::delete('program/delete/{id}/','ProgramController@delete')->name('admin.program.delete');

	//semester
	Route::get('semester/create/','SemesterController@create')->name('admin.semester.create');
	Route::get('semester/semesters/','SemesterController@index')->name('admin.semester.index');
	Route::post('semester/store/','SemesterController@store')->name('admin.semester.store');
	Route::get('semester/edit/{id}','SemesterController@edit')->name('admin.semester.edit');
	Route::put('semester/update/{id}/','SemesterController@update')->name('admin.semester.update');
	Route::delete('semester/delete/{id}/','SemesterController@delete')->name('admin.semester.delete');

	//course
	Route::get('course/create/','CourseController@create')->name('admin.course.create');
	Route::get('course/courses/','CourseController@index')->name('admin.course.index');
	Route::post('course/store/','CourseController@store')->name('admin.course.store');
	Route::get('course/edit/{id}','CourseController@edit')->name('admin.course.edit');
	Route::put('course/update/{id}/','CourseController@update')->name('admin.course.update');
	Route::delete('course/delete/{id}/','CourseController@delete')->name('admin.course.delete');


	//content
	Route::get('content/course-content-each-semester/create/','ContentController@create')->name('admin.content.create');
	Route::get('content/course-content-each-semester/coursees/','ContentController@index')->name('admin.content.index');
	Route::post('content/course-content-each-semester/store/','ContentController@store')->name('admin.content.store');
	Route::get('content/course-content-each-semester/edit/{id}','ContentController@edit')->name('admin.content.edit');
	Route::put('content/course-content-each-semester/update/{id}/','ContentController@update')->name('admin.content.update');
	Route::delete('content/course-content-each-semester/delete/{id}/','ContentController@delete')->name('admin.content.delete');

	//accept teacher upload content
	
	Route::get('content/status/{id}','ContentController@teacherContentStatus')->name('admin.content.status');


//teacher assign

	Route::get('teacher/assign/create/','TeacherAssignController@create')->name('admin.teacherAssign.create');
	Route::get('teacher/assign/courses/','TeacherAssignController@index')->name('admin.teacherAssign.index');
	Route::post('teacher/assign/store/','TeacherAssignController@store')->name('admin.teacherAssign.store');
	Route::get('teacher/assign/edit/{id}','TeacherAssignController@edit')->name('admin.teacherAssign.edit');
	Route::put('teacher/assign/update/{id}/','TeacherAssignController@update')->name('admin.teacherAssign.update');
	Route::delete('teacher/assign/delete/{id}/','TeacherAssignController@delete')->name('admin.teacherAssign.delete');


	//Update admin profile 

	Route::get('/profile/edit/','Profile\ProfileUpdateController@ProfileUpdate')->name('admin.profile.update');
	Route::post('/profile/store/','Profile\ProfileUpdateController@profileStore')->name('admin.profile.store');
	Route::get('/profile/','Profile\ProfileUpdateController@index')->name('admin.profile');


	//admin change password

	Route::post('/profile/password/store/','Profile\ProfileUpdateController@passwordStore')->name('admin.profile.password.store');
	Route::get('/profile/password-change','Profile\ProfileUpdateController@changePassword')->name('admin.profile.password.change');




	
    //regitration teacher
	Route::get('teachers/registrar/','Auth\TeacherRegistrationController@showRegistrationForm')->name('admin.teacher.registrar');

	Route::post('teachers/registrar/','Auth\TeacherRegistrationController@registrationProcess');

	Route::get('teachers/','Auth\TeacherRegistrationController@index')->name('admin.teacher.index');

	Route::delete('teachers/delete/{id}','Auth\TeacherRegistrationController@delete')->name('admin.teacher.delete');
	//mail inbox
	Route::get('Users/contacts-message','ContactController@index')->name('admin.contact.index');
	Route::delete('Users/contacts-message/{id}','ContactController@delete')->name('admin.contact.delete');

	


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
