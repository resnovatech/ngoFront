<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NGO\OtherformController;
use App\Http\Controllers\NGO\FormeightController;
use App\Http\Controllers\NGO\NgomemberController;
use App\Http\Controllers\NGO\NgomemberdocController;
use App\Http\Controllers\NGO\NgodocumentController;
use App\Http\Controllers\NGO\FdoneformController;
use App\Http\Controllers\NGO\RegsubmitController;
use App\Http\Controllers\NGO\NamechangeController;
use App\Http\Controllers\NGO\RenewController;
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

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return redirect()->route('index');
});




Route::controller(NamechangeController::class)->group(function () {


    Route::get('add_other_doc', 'add_other_doc')->name('add_other_doc');
    Route::post('store_other_doc', 'store_other_doc')->name('store_other_doc');
    Route::post('update_other_doc', 'update_other_doc')->name('update_other_doc');

    Route::get('final_submit_name_change', 'final_submit_name_change')->name('final_submit_name_change');


    Route::get('all_ngo_related_document', 'all_ngo_related_document')->name('all_ngo_related_document');


    Route::get('ngo_member_id_and_images', 'ngo_member_id_and_images')->name('ngo_member_id_and_images');
    Route::get('ngo_member_id_and_images_add', 'ngo_member_id_and_images_add')->name('ngo_member_id_and_images_add');
    Route::post('ngo_member_id_and_images_store', 'ngo_member_id_and_images_store')->name('ngo_member_id_and_images_store');
    Route::post('ngo_member_id_and_images_update', 'ngo_member_id_and_images_update')->name('ngo_member_id_and_images_update');


    Route::get('view_form_8_for_change', 'view_form_8_for_change')->name('view_form_8_for_change');
    Route::get('view_form_8_for_change_add', 'view_form_8_for_change_add')->name('view_form_8_for_change_add');
    Route::get('view_form_8_for_change_edit/{id}', 'view_form_8_for_change_edit')->name('view_form_8_for_change_edit');
    Route::post('view_form_8_for_change_store', 'view_form_8_for_change_store')->name('view_form_8_for_change_store');
    Route::post('view_form_8_for_change_update', 'view_form_8_for_change_update')->name('view_form_8_for_change_update');
    Route::post('view_form_8_for_change_delete/{id}','delete')->middleware(['auth'])->name('view_form_8_for_change_delete');


    Route::get('committee_ngo_member', 'committee_ngo_member')->name('committee_ngo_member');
    Route::get('committee_ngo_member_add', 'committee_ngo_member_add')->name('committee_ngo_member_add');
    Route::get('committee_ngo_member_edit/{id}', 'committee_ngo_member_edit')->name('committee_ngo_member_edit');
    Route::post('committee_ngo_member_store', 'committee_ngo_member_store')->name('committee_ngo_member_store');
    Route::post('committee_ngo_member_update', 'committee_ngo_member_update')->name('committee_ngo_member_update');



    Route::get('send_name_change_page', 'send_name_change_page')->name('send_name_change_page');

    Route::get('name_change_page', 'name_change_page')->name('name_change_page');


    Route::get('/form_one_pdf/{main_id}/{id}',  'form_one_pdf')->name('form_one_pdf');
    Route::get('/form_eight_pdf/{main_id}','form_eight_pdf')->name('form_eight_pdf');
    Route::get('/source_of_fund/{id}', 'source_of_fund')->name('source_of_fund');
    Route::get('/other_pdf_view/{id}','other_pdf_view')->name('other_pdf_view');

    Route::get('/ngo_doc/{id}','ngo_doc')->name('ngo_doc');
    Route::get('/ngo_member_doc/{id}','ngo_member_doc')->name('ngo_member_doc');
});


Route::controller(RenewController::class)->group(function () {

    Route::get('renew_page', 'renew_page')->name('renew_page');
    Route::get('ngo_renew_list_new', 'ngo_renew_list_new')->name('ngo_renew_list_new');
    Route::post('store_renew_information_list', 'store_renew_information_list')->name('store_renew_information_list');


    Route::post('update_renew_information_list', 'update_renew_information_list')->name('update_renew_information_list');





    Route::get('all_staff_information_for_renew', 'all_staff_information_for_renew')->name('all_staff_information_for_renew');
    Route::post('all_staff_information_for_renew_store', 'all_staff_information_for_renew_store')->name('all_staff_information_for_renew_store');
    Route::get('other_information_for_renew', 'other_information_for_renew')->name('other_information_for_renew');
    Route::post('other_information_for_renew_get', 'other_information_for_renew_get')->name('other_information_for_renew_get');
});



Route::controller(RegsubmitController::class)->group(function () {

    Route::get('regSubmitList', 'regSubmitList')->name('regSubmitList');
});

Route::controller(AuthController::class)->group(function () {
    ///


    Route::get('/check_mail_already_registered_or_not','check_mail_already_registered_or_not')->name('check_mail_already_registered_or_not');



    Route::get('/check_mail_from_list','check_mail_from_list')->name('check_mail_from_list');
    Route::post('/send_mail_get_from_list','send_mail_get_from_list')->name('send_mail_get_from_list');
    Route::get('/password_reset_page/{id}','password_reset_page')->name('password_reset_page');
    Route::get('/successfully_mail_send/{id}','successfully_mail_send')->name('successfully_mail_send');

    Route::post('/password_change_confirmed','password_change_confirmed')->name('password_change_confirmed');

    Route::get('/password_reset','showLinkRequestForm')->name('admin.password.request');

    ////

Route::get('login', 'index')->name('login');
Route::post('post_login','postLogin')->name('login.post');
Route::get('registration','registration')->name('register');
Route::post('post_registration','postRegistration')->name('register.post');
Route::post('update_registration','updateRegistration')->name('register.update');
Route::get('logout','logout')->name('logout');

/* New Added Routes */
Route::get('dashboard','dashboard')->middleware(['auth', 'is_verify_email'])->name('dashboard');
Route::get('account/verify/{token}','verifyAccount')->name('user.verify');

});

Route::controller(OtherformController::class)->group(function () {


    Route::get('informationResetPage', 'informationResetPage')->name('informationResetPage');
    Route::get('frequentlyAskQuestion', 'frequentlyAskQuestion')->name('frequentlyAskQuestion');
    Route::post('final_submit_reg_form', 'final_submit_reg_form')->name('final_submit_reg_form');
    Route::post('check_status_reg_from', 'check_status_reg_from')->name('check_status_reg_from');
    Route::get('statusPage', 'statusPage')->name('statusPage');
    Route::get('email_verify_page', 'email_verify_page')->name('email_verify_page');
    Route::get('email_verified_page', 'email_verified_page')->name('email_verified_page');
    Route::get('ngoInstructionPage', 'ngoInstructionPage')->name('ngoInstructionPage');
    Route::get('ngoRegistrationFeeList', 'ngoRegistrationFeeList')->name('ngoRegistrationFeeList');
    Route::get('lang/change', 'change')->name('changeLang');
    Route::get('change_language', 'change_language')->name('change_language');

    Route::group(['middleware' => ['auth']], function() {

    Route::post('update_user','update_user')->name('update_user');
    Route::post('reset_all_data','reset_all_data')->name('reset_all_data');
    Route::post('ngoTypeAndLanguagePost','ngoTypeAndLanguagePost')->name('ngoTypeAndLanguagePost');
    Route::post('ngoTypeAndLanguageDelete/{id}','ngoTypeAndLanguageDelete')->name('ngoTypeAndLanguageDelete');
    Route::get('ngoTypeAndLanguage','ngoTypeAndLanguage')->name('ngoTypeAndLanguage');
    Route::get('ngoRegistrationFirstInfo','ngoRegistrationFirstInfo')->name('ngoRegistrationFirstInfo');
    Route::post('ngoRegistrationFirstInfoPost','ngoRegistrationFirstInfoPost')->name('ngoRegistrationFirstInfoPost');
    // Route::get('ngo_registration_second_info','ngo_registration_second_info')->name('ngo_registration_second_info');
    // Route::post('ngo_registration_second_info_post','ngo_registration_second_info_post')->name('ngo_registration_second_info_post');
    Route::get('ngoAllRegistrationForm','ngoAllRegistrationForm')->name('ngoAllRegistrationForm');
});


});


Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');

});


Route::controller(FdoneformController::class)->group(function () {

    Route::group(['middleware' => ['auth']], function() {

    Route::post('/upload_from_one_pdf', 'upload_from_one_pdf')->name('upload_from_one_pdf');
    Route::get('/back_from_step_two', 'back_from_step_two')->name('back_from_step_two');
    Route::get('/source_of_fund_doc_download/{id}', 'source_of_fund_doc_download')->middleware(['auth'])->name('source_of_fund_doc_download');
    Route::get('/other_info_from_one_download/{id}', 'other_info_from_one_download')->middleware(['auth'])->name('other_info_from_one_download');
    Route::get('/adviser_data_delete', 'adviser_data_delete')->name('adviser_data_delete');
    Route::get('/adviser_data_update', 'adviser_data_update')->name('adviser_data_update');
    Route::get('/other_information_a_delete', 'other_information_a_delete')->name('other_information_a_delete');
    Route::post('/other_information_a_update', 'other_information_a_update')->name('other_information_a_update');
    Route::get('/source_of_fund_delete', 'source_of_fund_delete')->name('source_of_fund_delete');
    Route::post('/source_of_fund_update', 'source_of_fund_update')->name('source_of_fund_update');
    Route::get('/fdOneFormEdit', 'fdOneFormEdit')->name('fdOneFormEdit');
    Route::get('/fdFormOneInfoPdf', 'fdFormOneInfoPdf')->name('fdFormOneInfoPdf');
    Route::get('/fdFormOneInfo', 'fdFormOneInfo')->name('fdFormOneInfo');
    Route::get('/particularsOfOrganisation', 'particularsOfOrganisation')->name('particularsOfOrganisation');
    Route::post('/particularsOfOrganisationPost', 'particularsOfOrganisationPost')->name('particularsOfOrganisationPost');
    Route::post('/particularsOfOrganisationUpdate', 'particularsOfOrganisationUpdate')->name('particularsOfOrganisationUpdate');
    Route::get('/fieldOfProposedActivities', 'fieldOfProposedActivities')->name('fieldOfProposedActivities');
    Route::post('/fieldOfProposedActivitiesPost', 'fieldOfProposedActivitiesPost')->name('fieldOfProposedActivitiesPost');
    Route::post('/fieldOfProposedActivitiesUpdate', 'fieldOfProposedActivitiesUpdate')->name('fieldOfProposedActivitiesUpdate');
    Route::get('/allStaffDetailsInformation', 'allStaffDetailsInformation')->name('allStaffDetailsInformation');
    Route::post('/allStaffDetailsInformationPost', 'allStaffDetailsInformationPost')->name('allStaffDetailsInformationPost');
    Route::post('/allStaffDetailsInformationUpdate', 'allStaffDetailsInformationUpdate')->name('allStaffDetailsInformationUpdate');
    Route::get('/othersInformation', 'othersInformation')->name('othersInformation');
    Route::post('/othersInformationPost', 'othersInformationPost')->name('othersInformationPost');
    Route::post('/othersInformationUpdate', 'othersInformationUpdate')->name('othersInformationUpdate');

});

});


Route::controller(NgomemberdocController::class)->group(function () {

    Route::get('/ngoMemberDocumentDownload/{id}', 'ngoMemberDocumentDownload')->middleware(['auth'])->name('ngoMemberDocumentDownload');



    Route::get('/ngoMemberDocument', 'ngoMemberDocument')->middleware(['auth'])->name('ngoMemberDocument');
    Route::get('/ngoMemberDocumentCreate', 'ngoMemberDocumentCreate')->middleware(['auth'])->name('ngoMemberDocumentCreate');
    Route::post('/ngoMemberDocumentStore', 'ngoMemberDocumentStore')->middleware(['auth'])->name('ngoMemberDocumentStore');
    Route::post('/ngoMemberDocumentUpdate', 'ngoMemberDocumentUpdate')->middleware(['auth'])->name('ngoMemberDocumentUpdate');
    Route::get('/ngoMemberDocumentView', 'ngoMemberDocumentView')->middleware(['auth'])->name('ngoMemberDocumentView');
    Route::get('/ngoMemberDocumentEdit/{id}', 'ngoMemberDocumentEdit')->middleware(['auth'])->name('ngoMemberDocumentEdit');
    Route::post('ngoMemberDocumentDelete/{id}','delete')->middleware(['auth'])->name('ngoMemberDocumentDelete');
});


Route::controller(NgomemberController::class)->group(function () {
    Route::get('/ngoMember', 'ngoMember')->middleware(['auth'])->name('ngoMember');
    Route::get('/ngoMemberCreate', 'ngoMemberCreate')->middleware(['auth'])->name('ngoMemberCreate');
    Route::post('/ngoMemberStore', 'ngoMemberStore')->middleware(['auth'])->name('ngoMemberStore');
    Route::post('/ngoMemberUpdate', 'ngoMemberUpdate')->middleware(['auth'])->name('ngoMemberUpdate');
    Route::get('/ngoMemberView', 'ngoMemberView')->middleware(['auth'])->name('ngoMemberView');
    Route::get('/ngoMemberEdit/{id}', 'ngoMemberEdit')->middleware(['auth'])->name('ngoMemberEdit');
    Route::post('ngoMemberDelete/{id}','delete')->middleware(['auth'])->name('ngoMemberDelete');
});

Route::controller(NgodocumentController::class)->group(function () {

    Route::get('/ngoDocumentDownload/{id}', 'ngoDocumentDownload')->middleware(['auth'])->name('ngoDocumentDownload');


    Route::get('/ngoDocument', 'ngoDocument')->middleware(['auth'])->name('ngoDocument');
    Route::get('/ngoDocumentCreate', 'ngoDocumentCreate')->middleware(['auth'])->name('ngoDocumentCreate');
    Route::post('/ngoDocumentStore', 'ngoDocumentStore')->middleware(['auth'])->name('ngoDocumentStore');
    Route::post('/ngoDocumentUpdate', 'ngoDocumentUpdate')->middleware(['auth'])->name('ngoDocumentUpdate');
    Route::get('/ngoDocumentView', 'ngoDocumentView')->middleware(['auth'])->name('ngoDocumentView');
    Route::get('/ngoDocumentEdit/{id}', 'ngoDocumentEdit')->middleware(['auth'])->name('ngoDocumentEdit');
    Route::post('ngoDocumentDelete/{id}','delete')->middleware(['auth'])->name('ngoDocumentDelete');
});



Route::controller(FormeightController::class)->group(function () {

    Route::group(['middleware' => ['auth']], function() {

    Route::post('/upload_from_eight_pdf', 'upload_from_eight_pdf')->name('upload_from_eight_pdf');

    Route::get('/formEightNgoCommitteeMemberTotalView', 'formEightNgoCommitteeMemberTotalView')->name('formEightNgoCommitteeMemberTotalView');
    Route::get('/form_8_ngo_committee_total_year', 'form_8_ngo_committee_total_year')->name('form_8_ngo_committee_total_year');
    Route::get('/form_8_ngo_committee_member_pdf', 'form_8_ngo_committee_member_pdf')->name('form_8_ngo_committee_member_pdf');
    Route::get('/form_8_ngo_committee_member_view_from_edit', 'form_8_ngo_committee_member_view_from_edit')->name('form_8_ngo_committee_member_view_from_edit');
    Route::get('/formEightNgoCommitteeMember', 'formEightNgoCommitteeMember')->name('formEightNgoCommitteeMember');
    Route::get('/formEightNgoCommitteeMemberCreate', 'formEightNgoCommitteeMemberCreate')->name('formEightNgoCommitteeMemberCreate');
    Route::post('/formEightNgoCommitteeMemberStore', 'formEightNgoCommitteeMemberStore')->name('formEightNgoCommitteeMemberStore');
    Route::post('/formEightNgoCommitteeMemberUpdate', 'formEightNgoCommitteeMemberUpdate')->name('formEightNgoCommitteeMemberUpdate');
    Route::get('/formEightNgoCommitteeMemberView', 'formEightNgoCommitteeMemberView')->name('formEightNgoCommitteeMemberView');
    Route::get('/formEightNgoCommitteeMemberEdit/{id}', 'formEightNgoCommitteeMemberEdit')->name('formEightNgoCommitteeMemberEdit');
    Route::post('/formEightNgoCommitteeMemberDelete/{id}','delete')->name('formEightNgoCommitteeMemberDelete');
});
});
