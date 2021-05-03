<?php

/*application configration routes*/
/*
Route::group(['prefix'=>'clear'],function(){
	Route::get('cache', function () {
	    \Artisan::call('cache:clear');
	    dd("Cache is cleared");
	});
	Route::get('view', function () {
	    \Artisan::call('view:clear');
	    dd("View is cleared");
	});
	Route::get('route', function () {
		\Artisan::call('route:clear');
		dd("route is cleared");
	});
	Route::get('event', function () {
		\Artisan::call('event:clear');
		dd("Events is cleared");
	});
});

Route::get('config-cache', function () {
	\Artisan::call('config:cache');
	dd("Config is cached.");
});

Route::get('storage-link', function () {
	\Artisan::call('storage:link');
	dd("Storage link successfully.");
});

Route::get('sym-storage-link', function () {
	$targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
	$linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
	symlink($targetFolder,$linkFolder);
	dd('Symlink process successfully completed');
});

*/
/* end of application configration routes*/
Route::get('/','Admin\DashboardController@dashboard')->middleware('RedirectWhenNotLogin')->name('dash');

// checkin routes
Route::get('/checkin',"Admin\CheckInController@checkin")->name('admin.checkin.index');
Route::post('/checkin',"Admin\CheckInController@store")->name('admin.checkin.store');
Route::put('/checkin',"Admin\CheckInController@update")->name('admin.checkin.update');

Route::group(['namespace'=>'Admin','as'=>'admin.'],function(){
	
	Route::group(['namespace'=>'Auth'],function(){
		Route::get('/login','AuthController@showLogin')->name('showLogin');
		Route::post('/login','AuthController@login')->name('login');
	});

	Route::group(['middleware'=>'auth'],function(){
		Route::post("/logout",'Auth\AuthController@logout')->name('logout');

		// media related routes
		Route::post('/media', 'HelperController@storeMedia')->name('storeMedia');
		Route::get('/media/showMediaFromTempFolder/{name}', 'HelperController@showMediaFromTempFolder')->name('showMediaFromTempFolder');
		Route::post('/media/base64EncodedData', 'HelperController@storeMediaBase64')->name('storeMediaBase64');
		Route::post('/media/removeMediaFromTempFolder/{name}', 'HelperController@removeMediaFromTempFolder')->name('removeMediaFromTempFolder');
		Route::post('/media/removeMedia/{model}/{model_id}/{collection}', 'HelperController@removeMedia')->name('removeMedia');
		Route::post('/confirm/password', 'HelperController@confirmPassword')->name('confirmPassword');

		// Dashboard Routes
		Route::get("/dashboard",'DashboardController@dashboard')->name('dashboard');
		
		//admin profile route
		Route::get("/profile","ProfileController@index")->name('profile.index');
		Route::post("/profile","ProfileController@update")->name('profile.update');

		//position routes
		Route::resource('position','PositionController');
		Route::post('getdata/position',"PositionController@getData")->name('position.getData');
		Route::post('all-delete/position/',"PositionController@massDelete")->name('position.massDelete');

		//deduction routes
		Route::resource('deduction','DeductionController');
		Route::post('getdata/deduction',"DeductionController@getData")->name('deduction.getData');
		Route::post('all-delete/deduction/',"DeductionController@massDelete")->name('deduction.massDelete');

		//schedule routes
		Route::resource('schedule','ScheduleController');
		Route::post('getdata/schedule',"ScheduleController@getData")->name('schedule.getData');
		Route::post('all-delete/schedule/',"ScheduleController@massDelete")->name('schedule.massDelete');

		//employee routes
		Route::resource('employee','EmployeeController');
		Route::post('getdata/employee',"EmployeeController@getData")->name('employee.getData');
		Route::post('get-employees-data',"EmployeeController@getDataTable")->name('employee.getDataTable');
		Route::post('all-delete/employee/',"EmployeeController@massDelete")->name('employee.massDelete');

		//overtime routes
		Route::resource('overtime','OvertimeController');
		Route::post('getdata/overtime',"OvertimeController@getData")->name('overtime.getData');
		Route::post('get-overtime-data',"OvertimeController@getDataTable")->name('overtime.getDataTable');
		Route::post('all-delete/overtime/',"OvertimeController@massDelete")->name('overtime.massDelete');

		//cashadvance routes
		Route::resource('cashadvance','CashAdvanceController');
		Route::post('getdata/cashadvance',"CashAdvanceController@getData")->name('cashadvance.getData');
		Route::post('get-cashadvance-data',"CashAdvanceController@getDataTable")->name('cashadvance.getDataTable');
		Route::post('all-delete/cashadvance/',"CashAdvanceController@massDelete")->name('cashadvance.massDelete');

		//attendance routes
		Route::resource('attendance','AttendanceController');
		Route::post('getdata/attendance',"AttendanceController@getData")->name('attendance.getData');
		Route::post('get-attendance-data',"AttendanceController@getDataTable")->name('attendance.getDataTable');
		Route::post('all-delete/attendance/',"AttendanceController@massDelete")->name('attendance.massDelete');

		//payroll routes
		Route::get('payroll',"PayrollController@index")->name('payroll.index');
		Route::post('getdata/payroll',"PayrollController@getData")->name('payroll.getData');
		Route::post('get-payroll-data',"PayrollController@getDataTable")->name('payroll.getDataTable');
		Route::post('payroll/download-payroll',"PayrollController@payrollExportPDF")->name('payroll.payrollExportPDF');
		Route::post('payroll/download-payslip',"PayrollController@payslipExportPDF")->name('payroll.payslipExportPDF');
	});
});
