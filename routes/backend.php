<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin/dashboard');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/referral-settings', 'DashboardController@referral')->name('referral');
Route::post('/dashboard/referral/save', 'DashboardController@referral_save')->name('referral.save');
Route::get('/dashboard/referral/delete/{id}', 'DashboardController@referral_delete')->name('referral.delete');
Route::get('/dashboard/refer', 'DashboardController@refer')->name('referral.refer');

/*cashback-way route*/
Route::get('/dashboard/cashback-way', 'DashboardController@cashback_way')->name('dashboard.cashback-way');
Route::post('/dashboard/cashback-way/store', 'DashboardController@cashback_wayStore')->name('dashboard.cashback-way.store');

Route::group(['namespace' => 'RolePermission'], function () {
    Route::post('/modules/update_module', 'ModuleController@updateModule')->name('modules.update_module');
    Route::resource('/settings/modules', 'ModuleController');
    Route::resource('/settings/permissions', 'PermissionController');
    Route::resource('/settings/roles', 'RoleController');
    Route::resource('/settings/weekDays', 'WeekDayController');
    Route::get('/settings/changeStatusDay', 'WeekDayController@changeStatusDay')->name('changeStatusDay');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('/role/permissions', 'UserController@getPermissionsByRole')->name('users.get_permissions_by_role');
    Route::resource('/settings/users', 'UserController');
    Route::get('/profile/changePassword', 'UserController@changePassword');
    Route::post('/profile/changePassword', 'UserController@updatePassword')->name('change.password');
});

//ExamCategory Route
Route::group(['namespace' => 'ExamCategory'], function () {
    Route::resource('/examCategory', 'ExamCategoryController');
    Route::get('changeExamStatus', 'ExamCategoryController@changeExamStatus');
    Route::delete('examCategory/{id}', 'ExamCategoryController@destroy')->name('examCategory.delete');
});

//Course Route
Route::group(['namespace' => 'Course'], function () {
    Route::resource('/course', 'CourseController');
    Route::get('changeStatus', 'CourseController@changeStatus');
    Route::delete('courseDelete/{id}', 'CourseController@destroy')->name('courseDelete.delete');
});

//BatchCategory Route
Route::group(['namespace' => 'BatchCategory'], function () {
    Route::resource('/batchCategory', 'BatchCategoryController');
    Route::delete('batchCategorys/delete/{id}', 'BatchCategoryController@destroy')->name('batchCategory.delete');
});

//Batch Route
Route::group(['namespace' => 'Batch', 'middleware'=>['permission_check:batch']], function () {
    Route::get('batch/getCourseBatchCount/{id}', 'BatchController@getBatchCount');
    Route::resource('/batch', 'BatchController');
    Route::get('changeStatusPublish', 'BatchController@changeStatusPublish');
    Route::delete('/runningBatch/{id}', 'BatchController@destroy')->name('runningBatch.delete');
    Route::get('/archive', 'BatchController@archive');
    Route::get('archiveBatch/{id}', 'BatchController@show')->name('archiveBatch.get');
});

//Subject Route
Route::group(['namespace' => 'Subject'], function () {
    Route::resource('/subject', 'SubjectController');
    Route::get('subjectChangeStatus', 'SubjectController@subjectChangeStatus');
    Route::delete('/subject/delete/{id}', 'SubjectController@destroy')->name('subject.delete');
    Route::get('subject/create/getGroup/{id}', 'SubjectController@getGroup')->name('subject.create.getGroup');
});

//Student Route
Route::group(['namespace' => 'Student'], function () {
    Route::get('/students/batchWiseCheck', 'StudentController@batchWiseCheck')->name('students.batchWiseCheck');
    Route::post('/students/batchWiseCheck/batchWiseView', 'StudentController@batchWiseView')->name('students.batchWiseView');
    Route::get('/students/batchWiseCheck/batchWiseView/show/{id}', 'StudentController@show');
    Route::delete('/students/batchWiseCheck/batchWiseView/{id}', 'StudentController@destroy');
    Route::get('/students/reAdmission', 'StudentController@reAdmission')->name('students.reAdmission');
    Route::get('/students/reAdmission/studentPhone', 'StudentController@studentPhone')->name('studentPhone');
    Route::get('/students/reAdmission/studentId', 'StudentController@studentId')->name('studentId');
    Route::post('/students/reAdmission/batchStore', 'StudentController@batchStore')->name('students.batchStore');
    Route::get('/students/batchTransfer', 'StudentController@batchTransfer')->name('students.batchTransfer');
    Route::get('/students/batchTransfer/batch/{id}','StudentController@getBatchStudent')->name('students.reAdmission.batch');
    // student course permission
    Route::get('/students/course-permission', 'StudentController@coursePermissionList')->name('course-permission');
    Route::get('/students/course-permission/edit/{id}', 'StudentController@coursePermissionEdit')->name('student.course-permission.edit');
    Route::get('/students/course-permission/edits/{id}/{id2}', 'StudentController@changeCoursePermissionStatusPublish')->name('students.course-permission.edits');
    // end
    Route::post('/students/batchTransfer/transferStore', 'StudentController@transferStore')->name('students.transferStore');
    Route::get('/students/fetch_data', 'StudentController@fetch_data')->name('students.fetch_data');
    Route::get('/students/admit', 'StudentController@admit')->name('students.admit');
    Route::get('/students/admit/batch/{id}','StudentController@getBatch')->name('students.admit.batch');
    Route::get('/students/admit/fee/{id}','StudentController@getFee')->name('students.admit.fee');
    Route::get('/students/getStudentData','StudentController@getStudentData')->name('students.getData');
    Route::post('/students/admitStore','StudentController@admitStore')->name('students.admitStore');
    Route::get('/students/getCouponInfo','StudentController@getCouponInfo')->name('students.getCouponInfo');
    //Student Search by merit,thana,district...
    Route::get('/students/studentSearch','StudentController@studentSearch')->name('students.studentSearch');
    Route::get('/students/studentSearchResult','StudentController@studentSearchResult')->name('students.studentSearchResult');
    //cashback-list
    Route::get('/students/cashback-list','StudentController@cashbackList')->name('students.cashback-list');
    //idCard generator route
    Route::get('/students/selectBatch', 'StudentController@selectBatch')->name('students.selectBatch');
    Route::post('/students/idcardGeneration', 'StudentController@idcardGeneration')->name('students.idcardGeneration');
    //subjectBuyFormRouteStart
    Route::get('/dashboard/buySubject/{id}', 'StudentController@subjectAssignForm')->name('dashboard.buySubject');
    Route::get('/dashboard/buySubject/subject/{id}/{id2}','StudentController@getSubject')->name('dashboard.buySubject.subject');
    Route::get('/dashboard/buySubject/fee/{id}','StudentController@getFees')->name('dashboard.buySubject.fee');
    Route::get('/dashboard/buySubject/totalFee/{id}','StudentController@getTotalFees')->name('dashboard.buySubject.totalFee');
    /*batch details*/
    Route::get('/dashboard/buySubject/batch-details/{id}','StudentController@getBatchDetails')->name('dashboard.buySubject.batch-details');
    Route::get('/dashboard/buySubject/batchDetails/{id}','StudentController@getBatchDetailsWithCourse')->name('dashboard.buySubject.batchDetails');
    /*batch details end*/
     //pre_buy_subject list start
     Route::get('/dashboard/buySubject/pre_subject/{id}/{id2}','StudentController@getPreSubject')->name('dashboard.buySubject.pre_subject');
     Route::get('/dashboard/buySubject/pre_subject_id/{id}','StudentController@get_pre_subject_id')->name('dashboard.buySubject.pre_subject_id');
    //pre_buy_subject list end

    //subjectBuyFormRouteEnd
    Route::resource('/students', 'StudentController');
});

//Teacher Route
Route::group(['namespace' => 'Teacher'], function () {
    Route::match(['GET', 'POST'], '/teacher', 'TeacherController@index')->name('teacher.index');

    /* applied teacher list start */
    Route::get('/teacher/applied-teacher', 'TeacherController@appliedList')->name('teacher.applied-teacher');
    Route::get('/teacher/approval/{id}', 'TeacherController@teacherDetails')->name('teacher.approval');
    Route::post('/teacher/approval/update', 'TeacherController@teacherDetailsUpdate')->name('teacher.approval.update');
    Route::delete('/teacher/applied-teacher/delete/{id}', 'TeacherController@destroy')->name('teacher.applied-teacher.delete');
    /* applied teacher list end */

    /* training teacher list start */
    Route::get('/teacher/training-teacher', 'TeacherController@trainingList')->name('teacher.training-teacher');
    Route::get('/teacher/training-teacher/changeTeacherTrainingStatus', 'TeacherController@changeTeacherTrainingStatus')->name('teacher.training-teacher.changeTeacherTrainingStatus');
    Route::get('/teacher/training-teacher/{id}', 'TeacherController@showTrainingTeacher')->name('teacher.training-teacher.get');
    Route::get('/teacher/training-teacher/trainingComplete/{id}', 'TeacherController@trainingComplete')->name('teacher.training-teacher.trainingComplete');
    Route::delete('/teacher/training-teacher/delete/{id}', 'TeacherController@destroy')->name('teacher.training-teacher.delete');
    /* training teacher list end */

     /*paid teacher start*/
    Route::get('/teacher/paid-teacher', 'TeacherController@paidTeacherSearch')->name('teacher.paid-teacher');
    Route::get('/teacher/paid-teacher-index', 'TeacherController@paidTeacherIndex')->name('teacher.paid-teacher-index');
    Route::get('/teacher/paid-teacher-add/{id}', 'TeacherController@paidTeacherAdd')->name('teacher.paid-teacher-add');
    Route::post('/teacher/paid-teacher-store', 'TeacherController@paidTeacherStore')->name('teacher.paid-teacher-store');
    Route::get('/teacher/paid-teacher-edit/{id}', 'TeacherController@paidTeacherEdit')->name('teacher.paid-teacher-edit');
    Route::post('/teacher/paid-teacher-update', 'TeacherController@paidTeacherUpdate')->name('teacher.paid-teacher-update');
    /*paid teacher end*/

    //assign
    Route::get('/teacher/assignIndex', 'TeacherController@assignIndex')->name('teacher.assignIndex');
    Route::get('/teacher/assign', 'TeacherController@assign')->name('teacher.assign');
    Route::get('teacher/assign/batch/{id}','TeacherController@getExamGroup')->name('teacher.assign.batch');

    Route::get('/teacher/assignEdit/batch/{id}','TeacherController@getEditBatch')->name('teacher.assignEdit.batch');

    Route::get('/teacher/assign/subject/{id}','TeacherController@getSubject')->name('teacher.assign.subject');

    Route::get('/teacher/assignEdit/subject/{id}/{id2}','TeacherController@getEditSubject')->name('teacher.assignEdit.subject');

    Route::post('/teacher/assignStore', 'TeacherController@assignStore')->name('teacher.assignStore');
    Route::get('/teacher/assignEdit/{id}', 'TeacherController@assignEdit')->name('teacher.assignEdit');
    Route::match(['put', 'patch'], '/teacher/assignUpdate/{id}', 'TeacherController@assignUpdate')->name('teacher.assignUpdate');
    Route::delete('/teacher/assignDelete/{id}', 'TeacherController@assignDestroy')->name('teacher.assignDelete');
    //endAssign
    //Teacher Responsibility Menu start
    Route::get('/teacher/teacher_responsibility_index', 'TeacherController@teacherResponsibilityIndex')->name('teacher.teacher_responsibility_index');
    Route::get('/teacher/teacher_responsibility_create', 'TeacherController@teacherResponsibilityCreate')->name('teacher.teacher_responsibility_create');
    Route::post('/teacher/teacher_responsibility_store', 'TeacherController@teacherResponsibilityStore')->name('teacher.teacherResponsibilityStore');
    Route::get('/teacher/teacher_responsibility_edit/{id}', 'TeacherController@teacherResponsibilityEdit')->name('teacher.teacher_responsibility_edit');
    Route::match(['put', 'patch'], '/teacher/teacher_responsibility_update/{id}', 'TeacherController@teacherResponsibilityUpdate')->name('teacher.teacher_responsibility_update');
    Route::delete('/teacher/teacher_responsibility_delete/{id}', 'TeacherController@teacherResponsibilityDestroy')->name('teacher.teacher_responsibility_delete');
    Route::get('teacher/teacher_responsibility_index/changeTeacherResponsibilityStatus', 'TeacherController@changeTeacherResponsibilityStatus')->name('teacher.teacher_responsibility_index.changeTeacherResponsibilityStatus');
    Route::get('/teacher/teacher_responsibility_index/{id}', 'TeacherController@showResponsibility')->name('teacher.teacher_responsibility_index.get');
    //Teacher Responsibility Menu end
    Route::get('/teacher/create', 'TeacherController@create')->name('teacher.create');
    Route::post('/teacher/create', 'TeacherController@store')->name('teacher.store');
    Route::get('/teacher/edit/{id}', 'TeacherController@edit')->name('teacher.edit');
    Route::match(['put', 'patch'], '/teacher/update/{id}', 'TeacherController@update')->name('teacher.update');
    Route::get('/teacher/{id}', 'TeacherController@show')->name('teacher.get');
    Route::delete('/teacher/delete/{id}', 'TeacherController@destroy')->name('teacher.delete');
    Route::get('changeTeacherStatus', 'TeacherController@changeTeacherStatus');
});

//Staff Route
Route::group(['namespace' => 'Staff'], function () {
    Route::match(['GET', 'POST'], '/staff', 'StaffController@index')->name('staff.index');
    Route::get('/staff/create', 'StaffController@create')->name('staff.create');
    Route::post('/staff/create', 'StaffController@store')->name('staff.store');
    Route::get('/staff/edit/{id}', 'StaffController@edit')->name('staff.edit');
    Route::match(['put', 'patch'], '/staff/update/{id}', 'StaffController@update')->name('staff.update');
    Route::get('/staff/{id}', 'StaffController@view')->name('staff.get');
    Route::delete('/staff/delete/{id}', 'StaffController@destroy')->name('staff.delete');
    Route::get('changeStaffStatus', 'StaffController@changeStaffStatus');
});

//Payment Route
Route::group(['namespace' => 'Payment'], function () {
    Route::get('/payment/batchWise', 'OfflinePaymentController@batchWise');
    Route::post('/payment/collectFees/indexs', 'OfflinePaymentController@indexs')->name('collectFees.indexs');
    Route::get('/payment/collectFees/indexs', 'OfflinePaymentController@indexs');
    Route::post('/payment/collectFees/indexIndividual/{id}/{id2}', 'OfflinePaymentController@indexIndividual')->name('collectFees.indexIndividual');
    //test
    Route::get('/payment/collectFees/indexIndividual/{id}/{id2}', 'OfflinePaymentController@indexIndividual');

    Route::get('/payment/Individual', 'OfflinePaymentController@Individual')->name('payment.Individual');
    Route::post('/payment/Individual/indexIndividual2', 'OfflinePaymentController@indexIndividual2')->name('Individual.indexIndividual2');

    Route::get('/payment/getstudent/{id}', 'OfflinePaymentController@getStudent');
    Route::get('/payment/getstudentphone/{id}', 'OfflinePaymentController@getStudentPhone');
    Route::get('/payment/collectFees/creates/{id}/{id2}', 'OfflinePaymentController@create')->name('collectFees.creates');

    Route::get('/payment/couponCheck/{id}/{batch_id}', 'OfflinePaymentController@couponCheck')->name('payment.couponCheck');
    //edit
    Route::get('/payment/edit/{p_id}/{bs_id}', 'OfflinePaymentController@edit')->name('payment.edit');
    Route::match(['put', 'patch'], '/payment/update/{p_id}/{bs_id}', 'OfflinePaymentController@update')->name('payment.update');
    //delete
    Route::get('/payment/delete/{id}/{batch_id}', 'OfflinePaymentController@destroy')->name('payment.delete');
    //enddelete
    //due payment
    Route::get('/payment/duePayment', 'OfflinePaymentController@duePayment')->name('payment.duePayment');
    Route::post('/payment/collectFees/index', 'OfflinePaymentController@index')->name('payment.collectFees.index');
    //end due payment
    //payment/income Report
    Route::get('/report/payment/paymentReport', 'OfflinePaymentController@paymentReport')->name('report.payment.paymentReport');
    Route::post('/report/payment/paymentReport/index', 'OfflinePaymentController@paymentReportIndex')->name('report.payment.paymentReport.index');
    //end payment/income Report
    //test 2nd version(50%)
    Route::get('/payment/collectFees/create2/{id}/{id2}', 'OfflinePaymentController@create2')->name('collectFees.create2');
    Route::post('/payment/collectFees/store2', 'OfflinePaymentController@store2')->name('collectFees.store2');
    //test 4th version(use coupon then full)
    Route::get('/payment/collectFees/create4/{id}/{id2}', 'OfflinePaymentController@create4')->name('collectFees.create4');
    Route::get('/payment/couponCheck4/{id}/{batch_id}', 'OfflinePaymentController@couponCheck4')->name('payment.couponCheck4');
    Route::post('/payment/collectFees/store4', 'OfflinePaymentController@store4')->name('collectFees.store4');
    //test 3rd version(monthly)
    Route::get('/payment/collectFees/create3/{id}/{id2}', 'OfflinePaymentController@create3')->name('collectFees.create3');
    Route::resource('/payment/collectFees', 'OfflinePaymentController');
});

//Account Route
Route::group(['namespace' => 'Payment'], function () {
    Route::get('/account/daily/show', 'OfflinePaymentController@showDaily')->name('account.daily.show');
    Route::get('/account/income', 'OfflinePaymentController@findIncome')->name('account.income');
    Route::post('/account/income/show', 'OfflinePaymentController@showIncome')->name('account.income.show');
    Route::get('/account/incomeView', 'OfflinePaymentController@findIncomeView')->name('account.incomeView');
    Route::post('/account/incomeView/show', 'OfflinePaymentController@showIncomeView')->name('account.incomeView.show');
    // Route::resource('/account', 'AccountController');
});

//Expense Route
Route::group(['namespace' => 'Expense'], function () {
    Route::delete('expense/expenseCategory/delete/{id}', 'ExpenseController@destroyCategory')->name('expenseCategory.delete');
    Route::match(['put', 'patch'], 'expense/expenseCategory/update/{expenseCategory}', 'ExpenseController@updateCategory')->name('expenseCategory.update');
    Route::post('expense/expenseCategory/store', 'ExpenseController@storeCategory')->name('expenseCategory.store');
    Route::get('expense/expenseCategory', 'ExpenseController@indexCategory')->name('expenseCategory.index');
    Route::get('expense/expenseCategory/create', 'ExpenseController@createCategory')->name('expenseCategory.create');
    Route::get('expense/expenseCategory/edit/{expenseCategory}', 'ExpenseController@editCategory')->name('expenseCategory.edit');
    //Expense Report
    Route::get('/report/expense/expenseReport', 'ExpenseController@expenseReport')->name('report.expense.expenseReport');
    Route::post('/report/expense/expenseReportList', 'ExpenseController@expenseReportIndex')->name('report.expense.expenseReportList');
    //end Expense Report
    Route::resource('/expense', 'ExpenseController');
    Route::delete('expense/delete/{id}', 'ExpenseController@destroy')->name('expense.delete');

});

//Coupon
Route::group(['namespace' => 'Coupon'], function () {
    Route::get('/coupon/search', 'CouponController@search')->name('coupon.search');
    Route::get('/coupon/searchResult', 'CouponController@searchResult')->name('coupon.searchResult');
    Route::resource('/coupon', 'CouponController');
});

//Notification Route
Route::group(['namespace' => 'Notification'], function () {
    Route::get('/notification/onlineApplicant', 'NotificationController@cashOnPaymentList')->name('notification.onlineApplicant');
    Route::get('/notification/cashOnPayment/approve/{id}/{id2}', 'NotificationController@cashOnPaymentApproved')->name('notification.cashOnPayment.approve');
    Route::resource('/notification', 'NotificationController');
});

//Notice
Route::group(['namespace' => 'Notice'], function () {
    Route::resource('/notice', 'NoticeController');
    Route::get('changeNoticeStatusPublish', 'NoticeController@changeNoticeStatusPublish');
    Route::delete('/notice/delete/{id}', 'NoticeController@destroy')->name('notice.delete');
});

//FrontendNoticeController Route
Route::group(['namespace' => 'Student'], function () {

    Route::get('/exam/archieve', 'StudentController@examArchieve')->name('exam.archieve');
});

//Blogs
Route::group(['namespace' => 'Blog'], function () {
    Route::resource('/blogs', 'BlogController');
    Route::get('changeBlogStatusPublish', 'BlogController@changeBlogStatusPublish');
    Route::delete('/blogs/delete/{id}', 'BlogController@destroy')->name('blog.delete');
});

//Achievement
Route::group(['namespace' => 'Achievement'], function () {
    Route::resource('/achievement', 'AchievementController');
    Route::delete('/achievement/delete/{id}', 'AchievementController@destroy')->name('achievement.delete');
    Route::get('changeAchievementStatus', 'AchievementController@changeAchievementStatus');
});

//GeneralSetting and moodle Route
Route::group(['namespace' => 'GeneralSettings'], function () {
    Route::post('/settings/moodle/update', 'GeneralSettingsController@moodleUpdate')->name('settings.moodleUpdate');
    Route::get('/settings/moodle/create', 'GeneralSettingsController@create_moodle')->name('settings.moodle');
    Route::post('/settings/moodle', 'GeneralSettingsController@moodleStore')->name('settings.moodleStore');
    Route::get('/settings/moodle/{moodle}/edit', 'GeneralSettingsController@moodleEdit')->name('settings.moodleEdit');
    Route::resource('/settings', 'GeneralSettingsController');
});

//message template Route
Route::group(['namespace' => 'Sms'], function () {
    Route::get('/sms/livetable/fetch_data', 'LiveTableController@fetch_data')->name('sms.livetable.fetch_data');
    Route::post('/sms/livetable/add_data', 'LiveTableController@add_data')->name('sms.livetable.add_data');
    Route::post('/sms/livetable/update_data', 'LiveTableController@update_data')->name('sms.livetable.update_data');
    Route::post('/sms/livetable/delete_data', 'LiveTableController@delete_data')->name('sms.livetable.delete_data');
});

//SMS & Phone Book Route
Route::group(['namespace' => 'Sms'], function () {

    /* CSV Uploader in phone book start */
    Route::get('/sms/phoneBook/csvUploader', 'SmsController@csvUploader')->name('sms.phoneBook.csvUploader');
    Route::post('/sms/phoneBook/csvImport', 'SmsController@csvImport')->name('sms.phoneBook.csvImport');
    /* CSV Uploader in phone book end */
    /* phone book start */
    Route::get('/sms/phoneBook', 'SmsController@phoneBook')->name('sms.phoneBook');
    Route::post('/sms/phoneBook/phoneBookStore', 'SmsController@phoneBookStore')->name('sms.phoneBook.phoneBookStore');
    Route::get('/sms/phoneBook/phoneBookEdit/{id}', 'SmsController@phoneBookEdit')->name('sms.phoneBook.phoneBookEdit');
    Route::match(['put', 'patch'],'/sms/phoneBook/phoneBookUpdate/{id}', 'SmsController@phoneBookUpdate')->name('sms.phoneBook.phoneBookUpdate');
    Route::get('/sms/phoneBook/{id}', 'SmsController@viewPhoneBook')->name('sms.phoneBook.get');
    Route::delete('/sms/phoneBook/delete/{id}', 'SmsController@deletePhoneBook')->name('sms.phoneBook.delete');
    /* phone book end */
    Route::get('/sms/phoneBook/csvUploader', 'SmsController@csvUploader')->name('sms.phoneBook.csvUploader');
    /* phone book group start */
    Route::get('/sms/phoneBookGroup/createGroup', 'SmsController@phoneBookGroup')->name('sms.phoneBookGroup.createGroup');
    Route::post('/sms/phoneBookGroup/storeGroup', 'SmsController@phoneBookGroupStore')->name('sms.phoneBookGroup.storeGroup');
    Route::get('/sms/phoneBookGroup/phoneBookGroupEdit/{id}', 'SmsController@phoneBookGroupEdit')->name('sms.phoneBookGroup.phoneBookGroupEdit');
    Route::match(['put', 'patch'],'/sms/phoneBookGroup/phoneBookGroupUpdate/{id}', 'SmsController@phoneBookGroupUpdate')->name('sms.phoneBookGroup.phoneBookGroupUpdate');
    Route::delete('/sms/phoneBookGroup/createGroup/delete/{id}', 'SmsController@deletePhoneBookGroup')->name('sms.phoneBookGroup.createGroup.delete');
    /* phone book group end */

    //end test
    Route::resource('/sms', 'SmsController');
    Route::post('/sms/getstudent', 'SmsController@getStudent')->name('sms.getstudent');
    Route::post('/sms/search', 'SmsController@search')->name('sms.search');
    Route::post('/sms/search2', 'SmsController@search2')->name('sms.search2');
    Route::get('/sms/subject/{id}', 'SmsController@subject')->name('sms.subject');
    Route::post('/sms/searchResult', 'SmsController@searchResult')->name('sms.searchResult');

    Route::post('/sms/create', 'SmsController@store')->name('sms.store');
    Route::get('/sms/inbox', 'SmsController@show');
    // Route::get('/sms/inbox/{id}', 'StaffController@view')->name('sms.get');
    Route::delete('/sms/inbox/delete/{id}', 'SmsController@destroy')->name('sms.delete');

});

//Communication(zoom) Route
Route::group(['namespace' => 'Zoom'], function () {
    Route::get('/communication/zoomIndex','MeetingController@indexApiList')->name('communication.zoomIndex');
    Route::get('/communication/zoomCreate','MeetingController@createApi')->name('communication.zoomCreate');
    Route::post('/communication/storeApi','MeetingController@storeApi')->name('communication.storeApi');
    Route::get('/communication/editApiData/{id}', 'MeetingController@editApi')->name('communication.editApiData');
    Route::match(['put', 'patch'],'/communication/updateApiData/{id}', 'MeetingController@updateApi')->name('communication.updateApiData');
    Route::delete('/communication/deleteApiData/delete/{id}', 'MeetingController@destroyApi')->name('communication.deleteApiData.delete');
    Route::get('/communication/changeAPIStatus', 'MeetingController@changeAPIStatus');
    Route::get('/communication/meetingsList', 'MeetingController@list')->name('communication.meetingsList');
    Route::get('/communication/meetingsIndex', 'MeetingController@IndexZoomMeeting')->name('communication.meetingsIndex');
    Route::get('/communication/zoomMeetingCreate','MeetingController@createZoomMeeting')->name('communication.zoomMeetingCreate');
    Route::get('communication/zoomMeetingCreate/batch/{id}','MeetingController@getBatch')->name('communication.zoomMeetingCreate.batch');
    Route::post('/communication/meetings', 'MeetingController@create')->name('communication.meetings');
    Route::get('/communication/changeMeetingStatus', 'MeetingController@changeMeetingStatus');
    Route::delete('/communication/meetings/delete/{id}', 'MeetingController@destroyZoomMeeting')->name('communication.meetings.delete');
    Route::resource('/communication', 'MeetingController');

});

//Payment form Route
Route::group(['namespace' => 'Payment'], function () {
    // Route::resource('/payment', 'PaymentController');
    Route::resource('/payment/studentForm', 'PaymentFormController');
});

//AboutUsController Route
Route::group(['namespace' => 'AboutUs'], function () {
    Route::resource('/aboutUs', 'AboutUsController');
    Route::delete('aboutUs/delete/{id}', 'AboutUsController@destroy')->name('aboutUs.delete');
    Route::get('/aboutUs/{id}', 'AboutUsController@show')->name('aboutUs.get');
});

//UserManualController Route
Route::group(['namespace' => 'UserManual'], function () {
    Route::resource('/userManual', 'UserManualController');
    Route::delete('userManual/delete/{id}', 'UserManualController@destroy')->name('userManual.delete');
    Route::get('changeUserManualStatusPublish', 'UserManualController@changeUserManualStatusPublish');
    Route::get('/userManual/{id}', 'UserManualController@show')->name('userManual.get');
});

//UserCommentsController Route
Route::group(['namespace' => 'UserComments'], function () {
    Route::resource('/userComments', 'UserCommentsController');
    Route::delete('userComments/delete/{id}', 'UserCommentsController@destroy')->name('userComments.delete');
    Route::get('changePublishStatus', 'UserCommentsController@changePublishStatus');
    Route::get('/userComments/{id}', 'UserCommentsController@show')->name('userComments.get');
});

//Slider Images
Route::group(['namespace' => 'Slider'], function () {
    Route::delete('/slider/delete/{id}', 'SliderController@destroy')->name('slider.delete');
    Route::resource('/slider', 'SliderController');
    Route::get('changeSliderStatus', 'SliderController@changeSliderStatus');
});

//FeaturesController Route
Route::group(['namespace' => 'Features'], function () {
    Route::resource('/feature', 'FeaturesController');
    Route::delete('feature/delete/{id}', 'FeaturesController@destroy')->name('feature.delete');
    Route::get('changeFeatureStatus', 'FeaturesController@changeFeatureStatus');
    Route::get('/feature/{id}', 'FeaturesController@show')->name('feature.get');
});

//FrontendNoticeController Route
Route::group(['namespace' => 'FrontendNotice'], function () {
    Route::resource('/frontendNotice', 'FrontendNoticeController');
    Route::delete('frontendNotice/delete/{id}', 'FrontendNoticeController@destroy')->name('frontendNotice.delete');
    Route::get('changeFrontendNoticeStatus', 'FrontendNoticeController@changeFrontendNoticeStatus');
    Route::get('/frontendNotice/{id}', 'FrontendNoticeController@show')->name('frontendNotice.get');
});

//Modal
Route::group(['namespace' => 'Modal'], function () {
    Route::delete('/modal/delete/{id}', 'ModalController@destroy')->name('modal.delete');
    Route::resource('/modal', 'ModalController');
    Route::get('changeModalStatus', 'ModalController@changeModalStatus');
});

//PrivacyPolicyController Route
Route::group(['namespace' => 'PrivacyPolicy'], function () {
    Route::resource('/privacyPolicy', 'PrivacyPolicyController');
    Route::delete('privacyPolicy/delete/{id}', 'PrivacyPolicyController@destroy')->name('privacyPolicy.delete');
    Route::get('/privacyPolicy/{id}', 'PrivacyPolicyController@show')->name('privacyPolicy.get');
});

//TermsConditionController Route
Route::group(['namespace' => 'TermsCondition'], function () {
    Route::resource('/termsAndConditions', 'TermsConditionController');
    Route::delete('termsAndConditions/delete/{id}', 'TermsConditionController@destroy')->name('termsAndConditions.delete');
    Route::get('/termsConditiony/{id}', 'TermsConditionController@show')->name('termsAndConditions.get');
});

//Advertisement Route
Route::group(['namespace' => 'Advertisement'], function () {
    Route::resource('/advertisement-image', 'AdvertisementController');
    Route::delete('advertisement-image/delete/{id}', 'AdvertisementController@destroy')->name('advertisement-image.delete');
    Route::get('/advertisement-image/{id}', 'AdvertisementController@show')->name('advertisement-image.get');
    Route::get('changeAdvertisementStatus', 'AdvertisementController@changeAdvertisementStatus');
});

//News Route
Route::group(['namespace' => 'News'], function () {
    Route::resource('/news', 'NewsController');
    Route::delete('news/delete/{id}', 'NewsController@destroy')->name('news.delete');
    Route::get('/news/{id}', 'NewsController@show')->name('news.get');
    Route::get('changeNewsStatusPublish', 'NewsController@changeNewsStatusPublish');
});

//Contact us
Route::group(['namespace' => 'ContactUs'], function () {
    Route::resource('/contactus', 'ContactUsController');
});

Route::get('/clear-all', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return 'cache,view and route is cleared';
});

// /routes/api.php

// Get list of meetings.
Route::get('/meetings', 'Zoom\MeetingController@list');

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings', 'Zoom\MeetingController@create');

// Get information of the meeting room by ID.
Route::get('/meetings/{id}', 'Zoom\MeetingController@get')->where('id', '[0-9]+');
Route::patch('/meetings/{id}', 'Zoom\MeetingController@update')->where('id', '[0-9]+');
Route::delete('/meetings/{id}', 'Zoom\MeetingController@delete')->where('id', '[0-9]+');

// Route::get('/test', function () {

//     return view('frontend.pages.validation');
// });

