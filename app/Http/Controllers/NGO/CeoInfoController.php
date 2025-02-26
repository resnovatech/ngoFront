<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use App\Models\NgoTypeAndLanguage;
use App\Models\NgoNameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\FormEight;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FormOneOtherPdfList;
use App\Models\FormOneBankAccount;
use App\Models\Fdoneformadviser;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoOtherDoc;
use App\Models\NgoCeoInfo;
use App\Http\Controllers\NGO\CommonController;
class CeoInfoController extends Controller
{
    public function create(){

        $getCeoInfoList =  NgoCeoInfo::where('user_id', Auth::user()->id)->latest()->get();

        return view('front.ceoInfo.create',compact('getCeoInfoList'));
    }

    public function edit($id){

        $getCeoInfoList =  NgoCeoInfo::where('user_id', Auth::user()->id)->latest()->get();
        $getCeoInfoListEdit =  NgoCeoInfo::where('user_id', Auth::user()->id)->where('id',base64_decode($id))->first();

        return view('front.ceoInfo.edit',compact('getCeoInfoList','getCeoInfoListEdit'));


    }

    public function ceoInfoUpdate($id){


        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $getCeoInfoList =  NgoCeoInfo::where('user_id', Auth::user()->id)->latest()->get();
        $getCeoInfoListEdit =  NgoCeoInfo::where('user_id', Auth::user()->id)->where('id',base64_decode($id))->first();

        return view('front.ceoInfo.ceoInfoUpdate',compact('getCeoInfoList','getCeoInfoListEdit','ngo_list_all'));


    }

    


    public function store(Request $request){


            $request->validate([

             'chief_name' => 'required|string',
             'chief_desi' => 'required|string',
             'image_base64' => 'required',
             'image_seal_base64' => 'required',
    

         ]);

       

        $input = $request->all();
        $filePath="ngoHead";

        

        if (!empty($request->image_base64)) {

          
            $file = $request->file('digital_signature');
            $digital_signature =CommonController::storeBase64($request->image_base64);

            }else{

                $digital_signature = null;
            }


        if (!empty($request->image_seal_base64)) {

       
            $file = $request->file('digital_seal');
            $digital_seal =CommonController::storeBase64($request->image_seal_base64);

            }else{

                $digital_seal = null;
            }


        $input['ceo_signature'] = $digital_signature;
        $input['ceo_seal'] = $digital_seal;
        $input['user_id'] = Auth::user()->id;
        $input['ceo_name'] = $request->chief_name;
        $input['ceo_designation'] = $request->chief_desi;
        $input['status'] = 1;

        //inActive All Previous Data 

        NgoCeoInfo::where('user_id', Auth::user()->id)
       ->update([
           'status' => 0
        ]);


        //inActive All Previous Data 

        try{

            DB::beginTransaction();

           $ngoCeoInfo = NgoCeoInfo::create($input);

           DB::commit();
          return redirect()->back()->with('success','Created successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
    }



    public function update(Request $request,$id){


    $input = $request->all();
    $filePath="ngoHead";

    

    if (!empty($request->image_base64)) {

      
        $file = $request->file('digital_signature');
        $digital_signature =CommonController::storeBase64($request->image_base64);

        }else{

            $digital_signature = NgoCeoInfo::where('id',$id)->value('ceo_signature');
        }


    if (!empty($request->image_seal_base64)) {

   
        $file = $request->file('digital_seal');
        $digital_seal =CommonController::storeBase64($request->image_seal_base64);

        }else{

            $digital_seal = NgoCeoInfo::where('id',$id)->value('ceo_seal');
        }


    $input['ceo_signature'] = $digital_signature;
    $input['ceo_seal'] = $digital_seal;
    $input['user_id'] = Auth::user()->id;
    $input['ceo_name'] = $request->chief_name;
    $input['ceo_designation'] = $request->chief_desi;
    $input['status'] = $request->status;

    //inActive All Previous Data 

    if($request->status == 1){

    NgoCeoInfo::where('user_id', Auth::user()->id)
   ->update([
       'status' => 0
    ]);

    }
    //inActive All Previous Data 

    try{

        DB::beginTransaction();

       //$ngoCeoInfo = NgoCeoInfo::create($input);

        $ngoCeoInfoUpdate = NgoCeoInfo::find($id);
        $ngoCeoInfoUpdate->update($input);

       DB::commit();
      return redirect()->back()->with('success','Updated successfully!');
} catch (\Exception $e) {
    DB::rollBack();
    return redirect()->route('error_404');
}
}
}
