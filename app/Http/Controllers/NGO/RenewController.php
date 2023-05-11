<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\NgoTypeAndLanguage;
use App\Models\FormEight;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\App;
use App\Models\FdOneForm;
use App\Models\FormOneOtherPdfList;
use App\Models\FormOneBankAccount;
use App\Models\FormOneAdviserList;
use App\Models\FormOneSourceOfFund;
use App\Models\FormOneMemberList;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NameChange;
use App\Models\Renew;
use App\Models\NgoRenewInfo;
class RenewController extends Controller
{
    public function renew_page(){
        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)
        ->value('ngo_type');
        if($checkNgoTypeForForeginNgo == 'Foreign'){

            App::setLocale('sp');
            session()->put('locale','sp');

        }else{

            App::setLocale('en');
            session()->put('locale','en');
        }


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  Renew::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.renew.renew',compact('ngo_list_all','name_change_list_all'));
    }



    public function ngo_renew_list_new(){

        $get_all_data_new = NgoRenewInfo::where('user_id',Auth::user()->id)->latest()->get();
         $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $name_change_list_all =  Renew::where('user_id',Auth::user()->id)->latest()->get();
        return view('front.renew.ngo_renew_list_new',compact('get_all_data_new','ngo_list_all','name_change_list_all','all_parti'));

    }



    public function update_renew_information_list(Request $request){



        $time_dy = time().date("Ymd");



        $ngoRenew = NgoRenewInfo::find($request->id);
        $ngoRenew->user_id = Auth::user()->id;
        $ngoRenew->registration_number = $request->registration_number;
        $ngoRenew->organization_name = $request->organization_name;
        $ngoRenew->organization_address = $request->organization_address;
        $ngoRenew->address_of_head_office = $request->address_of_head_office;
        $ngoRenew->country_of_origin = $request->country_of_origin;
        $ngoRenew->name_of_head_in_bd = $request->name_of_head_in_bd;
        $ngoRenew->job_type = $request->job_type;
        $ngoRenew->address = $request->address;
        $ngoRenew->phone = $request->phone;
        $ngoRenew->email = $request->email;
        $ngoRenew->mobile = $request->mobile;
        $ngoRenew->web_site_name = $request->web_site_name;
        $ngoRenew->mobile_new = $request->mobile_new;
        $ngoRenew->email_new = $request->email_new;
        $ngoRenew->phone_new = $request->phone_new;
        $ngoRenew->profession = $request->profession;
        if ($request->hasfile('foregin_pdf')) {
         $file = $request->file('foregin_pdf');
         $extension = $time_dy.$file->getClientOriginalName();
         $filename = $extension;
         $file->move('public/uploads/', $filename);
         $ngoRenew->foregin_pdf = 'uploads/'.$filename;

     }


     if ($request->hasfile('yearly_budget')) {
         $file = $request->file('yearly_budget');
         $extension = $time_dy.$file->getClientOriginalName();
         $filename = $extension;
         $file->move('public/uploads/', $filename);
         $ngoRenew->yearly_budget = 'uploads/'.$filename;

     }



        $ngoRenew->save();


        $mm_id = $ngoRenew->id;

return redirect('/all_staff_information_for_renew');



    }


    public function store_renew_information_list(Request $request){




        $time_dy = time().date("Ymd");



       $ngoRenew = new NgoRenewInfo();
       $ngoRenew->fd_one_form_id = $request->id;
       $ngoRenew->user_id = Auth::user()->id;
       $ngoRenew->registration_number = $request->registration_number;
       $ngoRenew->organization_name = $request->organization_name;
       $ngoRenew->organization_address = $request->organization_address;
       $ngoRenew->address_of_head_office = $request->address_of_head_office;
       $ngoRenew->country_of_origin = $request->country_of_origin;
       $ngoRenew->name_of_head_in_bd = $request->name_of_head_in_bd;
       $ngoRenew->job_type = $request->job_type;
       $ngoRenew->address = $request->address;
       $ngoRenew->phone = $request->phone;
       $ngoRenew->email = $request->email;
       $ngoRenew->mobile = $request->mobile;
       $ngoRenew->web_site_name = $request->web_site_name;
       $ngoRenew->mobile_new = $request->mobile_new;
       $ngoRenew->email_new = $request->email_new;
       $ngoRenew->phone_new = $request->phone_new;
       $ngoRenew->profession = $request->profession;

       if ($request->hasfile('foregin_pdf')) {
        $file = $request->file('foregin_pdf');
        $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $ngoRenew->foregin_pdf = 'uploads/'.$filename;

    }


    if ($request->hasfile('yearly_budget')) {
        $file = $request->file('yearly_budget');
        $extension = $time_dy.$file->getClientOriginalName();
        $filename = $extension;
        $file->move('public/uploads/', $filename);
        $ngoRenew->yearly_budget = 'uploads/'.$filename;

    }



       $ngoRenew->save();


       $mm_id = $ngoRenew->id;

return redirect('/all_staff_information_for_renew');



    }


    public function all_staff_information_for_renew(){

        $getUserIdFrom = FdOneForm::where('user_id',Auth::user()->id)->value('id');
        $all_partiw = FormOneMemberList::where('fd_one_form_id',$getUserIdFrom)->get();

        return view('front.renew.all_staff_information_for_renew',compact('all_partiw'));
    }

    public function other_information_for_renew(){

        return view('front.renew.other_information_for_renew');
    }


    public function other_information_for_renew_get(Request $request){

        $time_dy = time().date("Ymd");

       $Ngorenewinfo_get_id = NgoRenewInfo::where('user_id',Auth::user()->id)->orderBy('id','desc')->value('id');


        $ngoRenew = NgoRenewInfo::find($Ngorenewinfo_get_id);
        $ngoRenew->main_account_number = $request->main_account_number;
        $ngoRenew->main_account_type = $request->main_account_type;
        $ngoRenew->name_of_bank = $request->name_of_bank;
        $ngoRenew->main_account_name_of_branch = $request->main_account_name_of_branch;
        $ngoRenew->bank_address_main = $request->bank_address_main;

        if ($request->hasfile('change_ac_number')) {
            $file = $request->file('change_ac_number');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $ngoRenew->change_ac_number = 'uploads/'.$filename;

        }

        if ($request->hasfile('copy_of_chalan')) {
            $file = $request->file('copy_of_chalan');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $ngoRenew->copy_of_chalan = 'uploads/'.$filename;

        }

        if ($request->hasfile('due_vat_pdf')) {
            $file = $request->file('due_vat_pdf');
            $extension = $time_dy.$file->getClientOriginalName();
            $filename = $extension;
            $file->move('public/uploads/', $filename);
            $ngoRenew->due_vat_pdf = 'uploads/'.$filename;

        }
        $ngoRenew->save();



        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s a');



        $add_renew_request = new Renew();
        $add_renew_request->fd_one_form_id = $Ngorenewinfo_get_id;
        $add_renew_request->user_id = Auth::user()->id;
        $add_renew_request->time_for_api =$main_time;
        $add_renew_request->status = 'Ongoing';
        $add_renew_request->save();

        return redirect('/renew_page')->with('success','Renew Request Send Successfully');

    }
}
