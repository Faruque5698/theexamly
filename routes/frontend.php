<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ContactUs\ContactUsController as ContactUsController;

Route::get('/','FrontendController@index')->name('frontend.index');
Route::get('/courses/{slug}','FrontendController@courses')->name('frontend.courses');
Route::get('/courses/sortBy/{id}','FrontendController@sortBy')->name('frontend.courses.sortBy');
Route::get('/courseDetails/{id}','FrontendController@courseDetails')->name('frontend.course_details');
Route::get('/courses/subject/{id}/{id2}','FrontendController@getSubject')->name('courses.subject');
Route::get('/courses/subjects/{id}','FrontendController@getSubjectAll')->name('courses.subjects');
Route::get('/aboutUs','FrontendController@aboutUs')->name('aboutUs');
Route::get('/userManual','FrontendController@userManual')->name('userManual');
Route::get('/userManual/details','FrontendController@userManualAll')->name('userManual.detail');
Route::get('/userManual/details/{id}','FrontendController@userManualDetails')->name('userManual.details');
Route::get('/blog','FrontendController@blog')->name('blog');
Route::get('/blog/blogDetails/{id}','FrontendController@blogDetails')->name('blog.blogDetails');
Route::get('/privacyPolicy','FrontendController@privacyPolicy')->name('privacyPolicy');
Route::get('/termsAndConditions','FrontendController@termsCondition')->name('termsAndConditions');

Route::get('/courses/course-details/{slug}','FrontendController@courses')->name('frontend.courseDetails');

// Route::get('/register','FrontendController@showAdmissionForm')->name('frontend.register');
Route::get('/user/login','FrontendController@login')->name('user.login');
Route::post('/user/userLogin','FrontendController@userLogin')->name('user.userLogin');
Route::get('/frontend/forget-password','FrontendController@forgetPassword')->name('frontend.forget-password');
Route::post('/frontend/forget-password/update','FrontendController@forgetPasswordUpdate')->name('frontend.forget-password.update');
//online admission route
// Route::get('/admission','FrontendController@showAdmission')->name('frontend.showAdmission');
Route::get('/admission/form','FrontendController@showAdmissionForm')->name('frontend.showAdmissionForm');
Route::post('/admission/registration','FrontendController@registration')->name('frontend.registration');
// Route::get('/admission/form/course/{id}','FrontendController@getGroup2')->name('admission.form.course');
// Route::get('/admission/form/subject/{id}/{id2}','FrontendController@getSubject2')->name('admission.form.subject');
// Route::get('/admission/form/fee/{id}','FrontendController@getFee')->name('admission.form.fee');
// Route::get('/admission/form/totalFee/{id}','FrontendController@totalFee')->name('admission.form.totalFee');
// Route::post('/admission/form/confirm','FrontendController@confirm')->name('admission.form.confirm');
// Route::post('/admission/form/registration','PaymentController@registration')->name('admission.form.registration');
// Route::post('/admission/form/registration/payment/success', 'PaymentController@frontPaymentSuccess')->name('admission.form.frontPayment.success');
Route::get('/admission/form/emailValidation/{user}','FrontendController@emailValidation')->name('admission.form.emailValidation');
Route::get('/admission/form/getCouponInfo/','FrontendController@getCouponInfo')->name('admission.form.getCouponInfo');

/* Shurjo Payment in Frontend Registration Route Start*/
Route::get('/admission/form/registration/return-url', 'PaymentController@frontendReturn')->name('admission.form.registration.frontendReturn-url');
Route::get('/admission/form/registration/cancel-url', 'PaymentController@frontendCancel')->name('admission.form.registration.frontendCancel-url');
/* Shurjo Payment in Frontend Registration Route End*/

/* buyer login and registration with course route start*/
Route::get('/buyer/login/{slug}','FrontendController@buyerLogin')->name('buyer.login');
Route::get('/admission/form/{slug}','FrontendController@showAdmissionFormSlug')->name('frontend.showAdmissionFormSlug');
Route::get('/admission/form/subject/slug/{slug}/{id}/{id2}','FrontendController@getSubject3')->name('admission.form.subject.slug');
Route::get('/admission/form/totalFee/slug/{slug}/{id}','FrontendController@totalFee2')->name('admission.form.totalFee.slug');
/* buyer login and registration with course route end*/

// Route::get('/admission/form/batch/{id}','FrontendController@getBatch')->name('admission.form.batch');

// Route::get('/admission/form/group/{id}','FrontendController@getGroup')->name('admission.form.group');
// Route::get('/admission/form/subject/{id}','FrontendController@getSubject')->name('admission.form.subject');
// Route::get('/admission/form/fee/{id}','FrontendController@getFee')->name('admission.form.fee');
// // Route::get('/admission/form/fee/{id}','FrontendController@getFee')->name('admission.form.fee');
// Route::get('/admission/form/getCouponInfo','FrontendController@getCouponInfo')->name('admission.form.getCouponInfo');
// Route::post('/admission/form/confirm','FrontendController@confirm')->name('admission.form.confirm');

Route::post('/admission/form/payment','PaymentController@paymentByStudent')->name('admission.form.payment');
Route::get('/admission/form/payment/return-url', 'PaymentController@return')->name('admission.form.payment.return-url');
Route::get('/admission/form/payment/cancel-url', 'PaymentController@cancel')->name('admission.form.payment.cancel-url');

Route::post('/admission/form/payment/success', 'PaymentController@paymentSuccess')->name('admission.form.payment.success');
Route::post('/admission/form/payment/fail', 'PaymentController@paymentFail')->name('admission.form.payment.fail');
Route::post('/admission/form/payment/cancel', 'PaymentController@paymentCancel')->name('admission.form.payment.cancel');
Route::post('/admission/form/payment/paymentIPN', 'PaymentController@paymentIPN')->name('admission.form.payment.paymentIPN');
//cashOnPayment Success Message
Route::get('/admission/form/message','PaymentController@cashOnPaymentMessage')->name('admission.form.message');
//cashOnPayment Success Message
Route::get('/admission/form/message2','PaymentController@onlinePaymentMessage')->name('admission.form.message2');
//online payment route
// Route::group(['namespace' => 'Payment'], function () {
//     // Route::resource('/payment', 'PaymentController');
//     Route::get('/payment', 'PaymentController@paymentByStudent')->name('payment');
//     Route::post('/payment-success', 'PaymentController@paymentSuccess')->name('payment.success');
//     Route::post('/payment-fail', 'PaymentController@paymentFail')->name('payment.fail');
//     Route::post('/payment-cancel', 'PaymentController@paymentCancel')->name('payment.cancel');
// });
//Teacher Registration
Route::get('/teacher-registration','FrontendController@TeacherRegistration')->name('teacher_registration');
Route::get('/teacher_registration/course/{id}','FrontendController@getCourse')->name('teacher_registration.course');
Route::get('/teacher_registration/subject/{id}','FrontendController@getAssignSubject')->name('teacher_registration.subject');
Route::post('/teacher_registration/store','FrontendController@TeacherRegistrationStore')->name('teacher_registration.store');
Route::get('/teacher-registration/confirmation','FrontendController@teacherValidation')->name('teacher-registration.confirmation');

Route::get('/gallery','FrontendController@gallery')->name('frontend.gallery');

Route::get('/events','FrontendController@events')->name('frontend.events');

Route::get('/news','FrontendController@news')->name('frontend.news');
Route::get('/news/{news}/details','FrontendController@newsDetails')->name('frontend.news.details');

Route::get('/notices','FrontendController@notices')->name('frontend.notices');
Route::get('/notices/{notice}/details','FrontendController@noticeDetails')->name('frontend.notices.details');

Route::get('/contact','FrontendController@contact')->name('frontend.contact');
Route::post('/contact/store', 'FrontendController@contactStore')->name('frontend.contactus.store');

// Return default 404
Route::fallback(function () {
    if (strpos(url()->current(), 'admin') !== false) {
        return view('pages.error-pages.error-404');
    }else{
        return view('frontend.errors.404');
    }

  });

Route::get('/test', function () {

    return view('mail');
});

//full site down route
Route::get('/s_down', function(){
    return Artisan::call('down');
});

Route::get('/s_live', function(){
     Artisan::call('up');
});
