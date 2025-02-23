<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NgoTypeAndLanguage;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\FormEight;
use App\Models\DakListDetail;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoOtherDoc;
use App\Models\NgoStatus;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\App;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DateTime;
use DateTimezone;
use App\Models\FdOneOtherPdfList;
use App\Models\FdOneBankAccount;
use App\Models\FdOneAdviserList;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use Response;
use Session;
use App\Models\NgoRenew;
class OtherformController extends Controller
{

    public function error_404(){



        return view('front.other.error_404');


    }


    public function allNoticeBoard(){
        $url = DB::table('system_information')->first();

        if(!$url){

          $adminUrl = '';
        }else{
            $adminUrl = $url->system_admin_url;

        }

        $noticeList = DB::table('notices')->latest()->get();
        return view('front.other.allNoticeBoard',compact('noticeList','adminUrl'));
    }

    public function viewNotice($id){
        $url = DB::table('system_information')->first();

        if(!$url){

          $adminUrl = '';
        }else{
            $adminUrl = $url->system_admin_url;

        }
        $noticeList = DB::table('notices')->where('id',$id)->value('pdf');
        return view('front.other.viewNotice',compact('noticeList','adminUrl'));
    }


    public function frequentlyAskQuestion(){

        return view('front.other.frequently_ask_question');
    }


    public function informationResetPage(){

        return view('front.other.informationResetPage');
    }

    public function changeLanguage($lan){

        session()->put('locale',$lan);
        CommonController::checkNgotype($lan);

        return redirect()->back();

    }


    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function resetAllData(){

        $getFdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $all_ngo_member_doc = NgoMemberNidPhoto::where('fd_one_form_id',$getFdOneFormId )->count();
        $all_data_list = NgoMemberList::where('fd_one_form_id',$getFdOneFormId )->count();
        $ngo_list_all = NgoOtherDoc::where('fd_one_form_id',$getFdOneFormId )->count();
        $all_data_list1 = FormEight::where('fd_one_form_id',$getFdOneFormId) ->count();
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->count();
        $first_form_check = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->count();
        $first_form_check_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_staff = DB::table('fd_one_member_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_account = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_account_info = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$getFdOneFormId)->count();
        $first_form_check_sourceoffunds = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$getFdOneFormId)->count();
        $checkCompleteStatus = DB::table('form_complete_statuses')->where('user_id',Auth::user()->id)->count();

        $get_final_result = $checkCompleteStatus + $first_form_check_sourceoffunds+$first_form_check_account_info+$first_form_check_account+$first_form_check_staff+$first_form_check_adviser+$all_ngo_member_doc + $all_data_list + $ngo_list_all + $all_data_list + $all_parti + $first_form_check;

        if($get_final_result == 0){

            return redirect('/dashboard')->with('error','You did not add any information');

        }else{


          if($checkCompleteStatus == 0){

          }else{

              $checkCompleteStatus = DB::table('form_complete_statuses')->where('user_id',Auth::user()->id)->delete();

          }

          if($first_form_check_adviser == 0){


            }else{

                $all_ngo_member_doc = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }



           if($first_form_check_staff == 0){

            }else{

                $all_ngo_member_doc = DB::table('fd_one_member_lists')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }



           if($first_form_check_account == 0){

            }else{

                $all_ngo_member_doc = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($first_form_check_account_info == 0){

            }else{

                $all_ngo_member_doc = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

           if($first_form_check_sourceoffunds == 0){

            }else{

                $all_ngo_member_doc = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($all_ngo_member_doc == 0){

            }else{

                $all_ngo_member_doc = NgoMemberNidPhoto::where('fd_one_form_id',$getFdOneFormId)->delete();

            }


            if($all_data_list1 == 0){

            }else{

                $all_data_list1 = FormEight::where('fd_one_form_id',$getFdOneFormId)->delete();

            }


            if($all_data_list == 0){

            }else{

                $all_data_list = NgoMemberList::where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($ngo_list_all == 0){

            }else{

                $ngo_list_all = NgoOtherDoc::where('fd_one_form_id',$getFdOneFormId)->delete();

            }

            if($all_parti == 0){

            }else{

                $all_parti = FdOneForm::where('id',$getFdOneFormId)->delete();
            }


            if($first_form_check == 0){


            }else{
                $first_form_check = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->delete();

            }

            return redirect('/dashboard')->with('error','Successfully Deleted');

        }

    }
    public function ngoTypeAndLanguage(){

        return view('front.firstTwoStep.ngoTypeAndLanguage');
    }


    public function ngoTypeAndLanguagePost(Request $request){


        try{
            DB::beginTransaction();

            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

            $main_time = $dt->format('H:i:s');

            $category_list = new NgoTypeAndLanguage();
            $category_list->ngo_type = $request->ngo_origin;

            if($request->ngo_origin == 'দেশিও'){
            $category_list->ngo_language ='en';
            }else{
                $category_list->ngo_language ='sp';
            }

            $category_list->ngo_type_new_old = $request->ngo_type;
            if(empty($request->reg_number)){
            $category_list->registration =0;
            }else{
                $category_list->registration = $request->reg_number;
            }
            if(empty($request->last_renew_date)){
            $category_list->last_renew_date = 0;
            }else{
                $changeFormateOfLastRenewDate = date('Y-m-d', strtotime($request->last_renew_date));
                $category_list->last_renew_date = $changeFormateOfLastRenewDate;
            }

            if(empty($request->ngo_registration_date)){
                $category_list->ngo_registration_date = 0;
            }else{
                $changeFormateOfNgoRegistrationDate = date('Y-m-d', strtotime($request->ngo_registration_date));
                $category_list->ngo_registration_date = $changeFormateOfNgoRegistrationDate;
            }

            $category_list->user_id =Auth::user()->id;
            $category_list->time_for_api =$main_time;
            $category_list->save();

            if($request->ngo_origin == 'দেশিও'){

            App::setLocale('en');
            session()->put('locale','en');
            }else{
                App::setLocale('sp');
                session()->put('locale','sp');
            }

            $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_one_form_check_status');

            DB::commit();
            if($first_form_check == 1){

                return redirect('ngoAllRegistrationForm');

            }else{

                return redirect('ngoRegistrationFirstInfo');


            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function ngoRegistrationFirstInfo(){

        return view('front.firstTwoStep.ngoRegistrationFirstInfo');

    }


    public function ngoRegistrationFirstInfoPost(Request $request){

        DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->update(['first_one_form_check_status'=>1]);
        return redirect('ngoAllRegistrationForm');

    }



    public function ngoAllRegistrationForm(){
        try{
            DB::beginTransaction();

            CommonController::checkNgotype(1);

            $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('first_one_form_check_status');
            $ngoLanguage = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_language');
            $mainNgoType = CommonController::changeView();

            DB::commit();

            if($first_form_check == 1){

                $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');

                $newOldNgo = CommonController::newOldNgo();
                
                if($newOldNgo != 'Old'){
                $get_reg_id = DB::table('ngo_statuses')->where('fd_one_form_id',$fdOneFormId)->value('status');
                }else{
                $get_reg_id = DB::table('ngo_renews')->where('fd_one_form_id',$fdOneFormId)->value('status');
                }
                $mainNgoType = CommonController::changeView();

                if(empty($get_reg_id)){

                   
                $checkCompleteStatusData = DB::table('form_complete_statuses')
                ->where('user_id',Auth::user()->id)
                ->first();

                $checkCompleteStatus = DB::table('form_complete_statuses')
                ->where('user_id',Auth::user()->id)
                ->where('fd_one_form_step_one_status',1)
                ->where('fd_one_form_step_two_status',1)
                ->where('fd_one_form_step_three_status',1)
                ->where('fd_one_form_step_four_status',1)
                ->where('form_eight_status',1)
                ->where('ngo_member_status',1)
                ->where('ngo_member_nid_photo_status',1)
                ->where('ngo_other_document_status',1)
                ->value('id');

                    ///first process before submit strat
        $allParticularsOfOrganisation = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
        $allFormOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();

        if(!$allFormOneData){

            $getAllSourceOfFundData = DB::table('fd_one_source_of_funds')->Where('fd_one_form_id',0)->get();
            $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',0)->get();
            $checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type_new_old');
            $countUser = DB::table('fd_one_member_lists')->where('fd_one_form_id',0)->count();
            $getFormOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
            
          
            $get_all_data_adviser_bank_all = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',0)
                            ->get();
    
                            $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',0)->first();
                            $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',0)->get();
                            $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',0)->get();
                            $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',0)->get();
                            $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',0)->get();

        }else{
        $getAllSourceOfFundData = DB::table('fd_one_source_of_funds')->Where('fd_one_form_id',$allFormOneData->id)->get();
        $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allFormOneData->id)->get();
        $checkNgoTypeForForeginNgoNewOld = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type_new_old');
        $countUser = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allFormOneData->id)->count();
        $getFormOneData = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
        
      
        $get_all_data_adviser_bank_all = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allFormOneData->id)
                        ->get();

                        $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id',$allFormOneData->id)->first();
                        $get_all_data_other= DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id',$allFormOneData->id)->get();
                        $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id',$allFormOneData->id)->get();
                        $formOneMemberList = DB::table('fd_one_member_lists')->where('fd_one_form_id',$allFormOneData->id)->get();
                        $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id',$allFormOneData->id)->get();
        }
        

      
        $formEightData = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
        $formEightDataForSign = DB::table('form_eights')
        ->where('fd_one_form_id',$fdOneFormId)
        ->value('employee_add_status');

//dd(count($formEightData));
        $formEightDataForSignMain = DB::table('form_eights')
        ->where('fd_one_form_id',$fdOneFormId)
        ->first();
        $fromDateTo = DB::table('form_eights') ->where('fd_one_form_id',$fdOneFormId)->value('form_date');

                        if(empty($fromDateTo)){

$newDate1 = date("d-m-Y");
$newDate2 = date("d-m-Y");
$to_total_year = '';
}else{



$from_date_to = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('form_date');

$newDate1 = date("d-m-Y", strtotime($from_date_to));



$to_date_to = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('to_date');

// $newDate2 = \Carbon\Carbon::createFromFormat('d/m/Y', $to_date_to)
// ->format('Y-m-d');;
$newDate2 = date("d-m-Y", strtotime($to_date_to));
//dd($newDate2);
$to_total_year = DB::table('form_eights')->where('fd_one_form_id',$fdOneFormId)->value('total_year');
}


$ngoMemberLists = DB::table('ngo_member_lists')->where('fd_one_form_id',$fdOneFormId)->latest()->get();

                        $ngoMemberDocLists = DB::table('ngo_member_nid_photos')
                        ->where('fd_one_form_id',$fdOneFormId)->latest()->get();


    if($mainNgoType== 'দেশিও'){

        $localNgoTypemNew = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
        ->where('ngo_type','দেশিও')->value('ngo_type_new_old');


      

if($localNgoTypemNew == 'Old'){
    $ngoOtherDocLists = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
    $ngoOtherDocListsFirst = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->first();
}else{
    $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
}

                    }else{

                        $foreignNgoTypeNew = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
                        ->where('ngo_type','Foreign')->value('ngo_type_new_old');
 
                        if($foreignNgoTypeNew == 'Old'){
                            $ngoOtherDocLists = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
                            $ngoOtherDocListsFirst = DB::table('renewal_files')->where('fd_one_form_id',$fdOneFormId)->first();
                        }else{
                            $ngoOtherDocLists = DB::table('ngo_other_docs')->where('fd_one_form_id',$fdOneFormId)->latest()->get();
                        }


                    }


                    ///first process before submit end 

                    ///second process before submit strat

                    $oldNgoRegNumber = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');



                    ///second process before submit end 


                }else{


                    ///after submit all registration and Renew Data to ngo start


                   ///after submit all registration and Renew Data to ngo end

                }

                return view('front.firstTwoStep.ngoAllRegistrationForm',
                compact(
                    'get_all_source_of_fund_data',
                    'oldNgoRegNumber',
'ngoOtherDocListsFirst',
                    'ngoOtherDocLists',
                    'ngoMemberDocLists',
                    'ngoMemberLists',
                    'formEightDataForSignMain',
                    'formEightDataForSign',
                    'to_total_year',
                    'newDate1',
                    'newDate2',
                    'fromDateTo',
                    'formEightData',
                    'get_all_data_other',
                    'get_all_data_adviser_bank_all',
                    'get_all_data_adviser',
                    'get_all_data_adviser_bank',
                    'getFormOneData',
                    'countUser',
                    'checkNgoTypeForForeginNgoNewOld',
                    'formOneMemberList',
                    'allFormOneData',
                    'getAllSourceOfFundData',
                    'allParticularsOfOrganisation',
                    'checkCompleteStatusData',
                    'checkCompleteStatus',
                    'mainNgoType',
                    'get_reg_id',
                    'fdOneFormId',
                    'newOldNgo'
                ));

            }elseif(!empty($ngoLanguage)){
                return view('front.firstTwoStep.ngoRegistrationFirstInfo',compact('mainNgoType'));
            }else{
                return view('front.firstTwoStep.ngoTypeAndLanguage',compact('mainNgoType'));

            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }

    }

    public function ngoInstructionPage(){

        return view('front.instruction_page.ngo_instruction_page');
    }


    public function ngoRegistrationFeeList(){


        return view('front.ngo_registration_fee.ngo_registration_fee_list');
    }


    public function finalSubmitRegForm(Request $request){

        try{
            DB::beginTransaction();

            $mainNgoTypeOld = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->value('ngo_type_new_old');

            $NewDate=Date('Y-m-d', strtotime('+3 days'));

            if($mainNgoTypeOld == 'Old'){

                $get_reg_id = FdOneForm::where('user_id',Auth::user()->id)->first();

                $dt = new DateTime();
                $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

                $main_time = $dt->format('H:i:s a');

                $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

                $add_renew_request = new NgoRenew();
                $add_renew_request->fd_one_form_id = $ngo_list_all->id;
                $add_renew_request->time_for_api =$main_time;
                $add_renew_request->status = 'Ongoing';
                $add_renew_request->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
                $add_renew_request->save();

                $dt = new DateTime();
                $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
                $created_at = $dt->format('Y-m-d h:i:s ');

                $amPmValue = $dt->format('a');
               // $amPmValueFinal = 0;
                if($amPmValue == 'pm'){

                    $amPmValueFinal = 'অপরাহ্ন';
                }else{
                    $amPmValueFinal = 'পূর্বাহ্ন';

                }

                 $regDakData = new DakListDetail();
                 $regDakData->sender_admin_id =null;
                 $regDakData->receiver_admin_id = 2;
                 $regDakData->main_dak_id =$add_renew_request->id;
                 $regDakData->dak_type = 'renew';
                 $regDakData->receive_from_ngo = 1;
                 $regDakData->receive_status = 1;
         $regDakData->status = 1;
                 $regDakData->nothi_jat_id = 0;
                 $regDakData->nothi_jat_status = 0;
                 $regDakData->sent_status =null;
                 $regDakData->amPmValue = $amPmValueFinal;
                 $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
                 $regDakData->save();

                $get_v_email = Auth::user()->email;

                $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');

                Mail::send('emails.oldRenew', ['token' => $first_form_check,'organization_name' => $get_reg_id->organization_name], function($message) use($get_v_email){
                    $message->to($get_v_email);
                    $message->subject('Old NGOAB Renew Service');
                });

            }else{

                $get_reg_id = FdOneForm::where('user_id',Auth::user()->id)->first();


                $category_list = new NgoStatus();
                $category_list->fd_one_form_id = $get_reg_id->id;
                $category_list->reg_id = $get_reg_id->registration_number_given_by_admin;
                $category_list->reg_type = $request->reg_type;
                $category_list->status = 'Ongoing';
                $category_list->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
                $category_list->email = Auth::user()->email;
                $category_list->save();

                $dt = new DateTime();
                $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
                $created_at = $dt->format('Y-m-d h:i:s ');

                $amPmValue = $dt->format('a');
               // $amPmValueFinal = 0;
                if($amPmValue == 'pm'){

                    $amPmValueFinal = 'অপরাহ্ন';
                }else{
                    $amPmValueFinal = 'পূর্বাহ্ন';

                }

                 $regDakData = new DakListDetail();
                 $regDakData->sender_admin_id =null;
                 $regDakData->receiver_admin_id = 2;
                 $regDakData->main_dak_id =$category_list->id;
                 $regDakData->dak_type = 'registration';
                 $regDakData->receive_from_ngo = 1;
                 $regDakData->receive_status = 1;
         $regDakData->status = 1;
                 $regDakData->nothi_jat_id = 0;
                 $regDakData->nothi_jat_status = 0;
                 $regDakData->sent_status =null;
                 $regDakData->amPmValue = $amPmValueFinal;
                 $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
                 $regDakData->save();

                $get_v_email = Auth::user()->email;

                Mail::send('emails.reg_number_list', ['token' => $get_reg_id->registration_number_given_by_admin,'organization_name' => $get_reg_id->organization_name], function($message) use($get_v_email){
                    $message->to($get_v_email);
                    $message->subject('NGOAB Registration Service || Tracking Number');
                });

            }

            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function renewalSubmitForOld(Request $request){
        try{
            DB::beginTransaction();

            $get_reg_id = FdOneForm::where('user_id',Auth::user()->id)->first();
            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

            $main_time = $dt->format('H:i:s a');

            $add_renew_request = new NgoRenew();
            $add_renew_request->fd_one_form_id = $get_reg_id->id;
            $add_renew_request->time_for_api =$main_time;
            $add_renew_request->status = 'Ongoing';
            $add_renew_request->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $add_renew_request->save();

            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
            $created_at = $dt->format('Y-m-d h:i:s ');

            $amPmValue = $dt->format('a');
           // $amPmValueFinal = 0;
            if($amPmValue == 'pm'){

                $amPmValueFinal = 'অপরাহ্ন';
            }else{
                $amPmValueFinal = 'পূর্বাহ্ন';

            }

             $regDakData = new DakListDetail();
             $regDakData->sender_admin_id =null;
             $regDakData->receiver_admin_id = 2;
             $regDakData->main_dak_id =$add_renew_request->id;
             $regDakData->dak_type = 'renew';
             $regDakData->receive_from_ngo = 1;
             $regDakData->receive_status = 1;
         $regDakData->status = 1;
             $regDakData->nothi_jat_id = 0;
             $regDakData->nothi_jat_status = 0;
             $regDakData->sent_status =null;
             $regDakData->amPmValue = $amPmValueFinal;
             $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
             $regDakData->save();

            $get_v_email = Auth::user()->email;

            $first_form_check = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('registration');

            Mail::send('emails.oldRenew', ['token' => $first_form_check,'organization_name' => $get_reg_id->organization_name], function($message) use($get_v_email){
                $message->to($get_v_email);
                $message->subject('Old NGOAB Renew Service');
            });
            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function statusPage(){

        return view('front.status_page.status_page');

    }


    public function checkStatusRegFrom(Request $request){


        $get_all_the_data_reg = NgoStatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('reg_id');


        $get_all_the_data_status = NgoStatus::where('email',$request->email)
        ->where('reg_type',$request->reg_type)
        ->where('reg_id',$request->reg_id)->value('status');


        if(empty($get_all_the_data_reg)){

            return view('front.status_page.check_status_reg_from_empty');

        }else{

            return view('front.status_page.check_status_reg_from_full',compact('get_all_the_data_reg','get_all_the_data_status'));

        }
    }


    public function emailVerifyPage(){

        return view('front.auth_page.err_msg_all');

    }

    public function emailVerifiedPage(){
        return view('front.auth_page.first_reg_mail');

    }


    public function ngoInstructionPageApply(){

        return view('front.instruction_page.ngoInstructionPageApply');
    }


    public function ngoInstructionPageaRenew(){

        return view('front.instruction_page.ngoInstructionPageaRenew');
    }


    public function ngoInstructionPageNameChange(){

        return view('front.instruction_page.ngoInstructionPageNameChange');
    }


    public function signature_modal(){

        return view('front.signature_modal.signature_modal');
    }


    public function seal_modal(){

        return view('front.signature_modal.seal_modal');
    }
}
