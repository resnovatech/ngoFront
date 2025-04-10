<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\FdOneForm;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;
use DB;
use App\Models\NgoBankInformation;
use App\Models\NgoHeadInformation;
use App\Http\Controllers\NGO\CommonController;
class ExtraController extends Controller
{
    public function NgoHeadInformation(){

        $getNgoHeadInfoList =  NgoHeadInformation::where('user_id', Auth::user()->id)->latest()->get();

        return view('front.NgoHeadInformation.create',compact('getNgoHeadInfoList'));
    }


    public function NgoHeadInformationAccept(){
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $getNgoHeadInfoList =  NgoHeadInformation::where('user_id', Auth::user()->id)->latest()->get();

        return view('front.NgoHeadInformation.accept.create',compact('ngo_list_all','all_parti','getNgoHeadInfoList'));
    }


    public function NgoBankInformation(){

        $getNgoBankInfoList =  NgoBankInformation::where('user_id', Auth::user()->id)->latest()->get();

        return view('front.NgoBankInformation.create',compact('getNgoBankInfoList'));
    }

    public function NgoBankInformationAccept(){
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $getNgoBankInfoList =  NgoBankInformation::where('user_id', Auth::user()->id)->latest()->get();

        return view('front.NgoBankInformation.accept.create',compact('ngo_list_all','all_parti','getNgoBankInfoList'));
    }

    public function ngoHeadInformationEdit($id){

        $getNgoHeadInfoList =  NgoHeadInformation::where('user_id', Auth::user()->id)->latest()->get();
        $getCeoInfoListEdit =  NgoHeadInformation::where('user_id', Auth::user()->id)->where('id',base64_decode($id))->first();

        return view('front.NgoHeadInformation.edit',compact('getNgoHeadInfoList','getCeoInfoListEdit'));


    }

    public function ngoHeadInformationEditAccept($id){
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $getNgoHeadInfoList =  NgoHeadInformation::where('user_id', Auth::user()->id)->latest()->get();
        $getCeoInfoListEdit =  NgoHeadInformation::where('user_id', Auth::user()->id)->where('id',base64_decode($id))->first();

        return view('front.NgoHeadInformation.accept.edit',compact('ngo_list_all','all_parti','getNgoHeadInfoList','getCeoInfoListEdit'));


    }

    public function ngoBankInformationEdit($id){

        $getNgoBankInfoList =  NgoBankInformation::where('user_id', Auth::user()->id)->latest()->get();
        $getBankInfoListEdit =  NgoBankInformation::where('user_id', Auth::user()->id)->where('id',base64_decode($id))->first();

        return view('front.NgoBankInformation.edit',compact('getNgoBankInfoList','getBankInfoListEdit'));


    }

    public function ngoBankInformationEditAccept($id){
        $all_parti = FdOneForm::where('user_id',Auth::user()->id)->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $getNgoBankInfoList =  NgoBankInformation::where('user_id', Auth::user()->id)->latest()->get();
        $getBankInfoListEdit =  NgoBankInformation::where('user_id', Auth::user()->id)->where('id',base64_decode($id))->first();

        return view('front.NgoBankInformation.accept.edit',compact('ngo_list_all','all_parti','getNgoBankInfoList','getBankInfoListEdit'));


    }


    public function ngoHeadInformationStore(Request $request){


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


       $input['chief_signature'] = $digital_signature;
       $input['chief_seal'] = $digital_seal;
       $input['user_id'] = Auth::user()->id;
       $input['chief_name'] = $request->chief_name;
       $input['chief_desi'] = $request->chief_desi;
       $input['status'] = 1;

       //inActive All Previous Data 

       NgoHeadInformation::where('user_id', Auth::user()->id)
      ->update([
          'status' => 0
       ]);


       //inActive All Previous Data 

       try{

           DB::beginTransaction();

          $ngoCeoInfo = NgoHeadInformation::create($input);

          DB::commit();
         return redirect()->back()->with('success','Created successfully!');
   } catch (\Exception $e) {
       DB::rollBack();
       return redirect()->route('error_404');
   }


    }

    public function ngoBankInformationStore(Request $request){

        $request->validate([

            'account_number' => 'required|string',
            'account_type' => 'required|string',
            'name_of_bank' => 'required',
            'branch_name_of_bank' => 'required',
            'bank_address' => 'required',

        ]);

      

       $input = $request->all();

       $input['user_id'] = Auth::user()->id;
       $input['status'] = 1;

       //inActive All Previous Data 

       NgoBankInformation::where('user_id', Auth::user()->id)
      ->update([
          'status' => 0
       ]);


       //inActive All Previous Data 

       try{

           DB::beginTransaction();

          $ngoCeoInfo = NgoBankInformation::create($input);

          DB::commit();
         return redirect()->back()->with('success','Created successfully!');
   } catch (\Exception $e) {
       DB::rollBack();
       return redirect()->route('error_404');
   }


    }



    public function ngoHeadInformationUpdate(Request $request,$id){


        $input = $request->all();
        $filePath="ngoHead";
    
        
    
        if (!empty($request->image_base64)) {
    
          
            $file = $request->file('digital_signature');
            $digital_signature =CommonController::storeBase64($request->image_base64);
    
            }else{
    
                $digital_signature = NgoHeadInformation::where('id',$id)->value('chief_signature');
            }
    
    
        if (!empty($request->image_seal_base64)) {
    
       
            $file = $request->file('digital_seal');
            $digital_seal =CommonController::storeBase64($request->image_seal_base64);
    
            }else{
    
                $digital_seal = NgoHeadInformation::where('id',$id)->value('chief_seal');
            }
    
    
        $input['chief_signature'] = $digital_signature;
        $input['chief_seal'] = $digital_seal;
        $input['user_id'] = Auth::user()->id;
        $input['chief_name'] = $request->chief_name;
        $input['chief_desi'] = $request->chief_desi;
        $input['status'] = $request->status;
    
        //inActive All Previous Data 
    
        if($request->status == 1){
    
            NgoHeadInformation::where('user_id', Auth::user()->id)
       ->update([
           'status' => 0
        ]);
    
        }
        //inActive All Previous Data 
    
        try{
    
            DB::beginTransaction();
    
           //$ngoCeoInfo = NgoCeoInfo::create($input);
    
            $ngoCeoInfoUpdate = NgoHeadInformation::find($id);
            $ngoCeoInfoUpdate->update($input);
    
           DB::commit();

           if($request->hideValue == 1){
            return redirect()->route('ngoHeadInformationAccept')->with('success','Updated successfully!');
           }else{
          return redirect()->route('ngoHeadInformation')->with('success','Updated successfully!');
           }
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
    }

    public function ngoBankInformationUpdate(Request $request,$id){


        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['status'] = $request->status;
    
        //inActive All Previous Data 
    
        if($request->status == 1){
    
            NgoBankInformation::where('user_id', Auth::user()->id)
       ->update([
           'status' => 0
        ]);
    
        }
        //inActive All Previous Data 
    
        try{
    
            DB::beginTransaction();
    
           //$ngoCeoInfo = NgoCeoInfo::create($input);
    
            $ngoCeoInfoUpdate = NgoBankInformation::find($id);
            $ngoCeoInfoUpdate->update($input);
    
           DB::commit();

           if($request->hideValue == 1){
            return redirect()->route('ngoBankInformationAccept')->with('success','Updated successfully!');
           }else{
          return redirect()->route('ngoBankInformation')->with('success','Updated successfully!');
           }
        } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
    }


    public function ngoHeadInformationDelete($id)
    {

        try{
            DB::beginTransaction();
            NgoHeadInformation::where('id', $id)->delete();
        DB::commit();
        return redirect()->back()->with('error','Deleted successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_500');
    }
    }


    public function ngoBankInformationDelete($id)
    {

        try{
            DB::beginTransaction();
            NgoBankInformation::where('id', $id)->delete();
        DB::commit();
        return redirect()->back()->with('error','Deleted successfully!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_500');
    }
    }
}
