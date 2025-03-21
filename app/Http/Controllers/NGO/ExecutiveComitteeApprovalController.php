<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\FormEight;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NameChangeDoc;
use App\Models\NgoMemberNidPhoto;
use Auth;
use App;
use Session;
use DateTime;
use DateTimezone;
use App\Models\NgoNameChange;
use App\Models\DocumentForExecutiveCommitteeApproval;
use Illuminate\Support\Str;
use App\Http\Controllers\NGO\CommonController;
class ExecutiveComitteeApprovalController extends Controller
{
    public function index(){

        try{

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $documentForDuplicateCertificate =  DocumentForExecutiveCommitteeApproval::where('fdId',$ngoListAll->id)->latest()->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

        return view('front.documentForExecutiveCommitteeApproval.index',compact('ngoListAll','documentForDuplicateCertificate'));

    }


    public function create(){

        try{

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $documentForDuplicateCertificate =  DocumentForExecutiveCommitteeApproval::where('fdId',$ngoListAll->id)->latest()->get();
        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();


        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

        return view('front.documentForExecutiveCommitteeApproval.create',compact('ngoListAll','documentForDuplicateCertificate'));
    }



    public function store(Request $request){

        $request->validate([

            'file_one' => 'required|file',
            'file_two' => 'required|file',
            'file_three' => 'required|file',
            'file_four' => 'required|file',
            'file_five' => 'required|file',

        ]);


      try{

            DB::beginTransaction();

            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fd9FormInfo = new DocumentForExecutiveCommitteeApproval();
            $fd9FormInfo->status = 'Ongoing';
            $fd9FormInfo->fdId = $ngo_list_all->id;

            if ($request->hasfile('file_one')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_one');
                $fd9FormInfo->file_one =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_three')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_three');
                $fd9FormInfo->file_three =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_two')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_two');
                $fd9FormInfo->file_two =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_four')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_four');
                $fd9FormInfo->file_four =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_five')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_five');
                $fd9FormInfo->file_five =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd9FormInfo->save();

            DB::commit();
            return redirect()->route('executiveCommitteeApproval.index')->with('success','Created Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }




    public function edit($id){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
            $documentForDuplicateCertificate =  DocumentForExecutiveCommitteeApproval::where('id',$id)->first();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

        return view('front.documentForExecutiveCommitteeApproval.edit',compact('ngoListAll','documentForDuplicateCertificate'));
    }


    public function update(Request $request,$id){

      try{

            DB::beginTransaction();

            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fd9FormInfo = DocumentForExecutiveCommitteeApproval::find($id);
            $fd9FormInfo->fdId = $ngo_list_all->id;
            if ($request->hasfile('file_one')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_one');
                $fd9FormInfo->file_one =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_three')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_three');
                $fd9FormInfo->file_three =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_two')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_two');
                $fd9FormInfo->file_two =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_four')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_four');
                $fd9FormInfo->file_four =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('file_five')) {
                $filePath="DocumentForDuplicateCertificate";
                $file = $request->file('file_five');
                $fd9FormInfo->file_five =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd9FormInfo->save();

            DB::commit();

            return redirect()->route('executiveCommitteeApproval.index')->with('success','Updated Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }



    public function show($id){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
            $documentForDuplicateCertificate =  DocumentForExecutiveCommitteeApproval::where('id',$id)->first();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

        return view('front.documentForExecutiveCommitteeApproval.view',compact('ngoListAll','documentForDuplicateCertificate'));
    }



    public function approvalOfConstitution($id,$title){


        try{

            if($title == 'file_one'){

                $form_one_data = DB::table('document_for_executive_committee_approvals')->where('id',$id)->value('file_one');
            }elseif($title == 'file_two'){

                $form_one_data = DB::table('document_for_executive_committee_approvals')->where('id',$id)->value('file_two');
            }elseif($title == 'file_three'){

                $form_one_data = DB::table('document_for_executive_committee_approvals')->where('id',$id)->value('file_three');
            }elseif($title == 'file_four'){
                $form_one_data = DB::table('document_for_executive_committee_approvals')->where('id',$id)->value('file_four');

            }elseif($title == 'file_five'){
                $form_one_data = DB::table('document_for_executive_committee_approvals')->where('id',$id)->value('file_five');

            }


            $file_path = url('public/'.$form_one_data);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);
            $file= public_path('/'). $form_one_data;
            $headers = array(
            'Content-Type: application/pdf',
            );

            return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
            ]);

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function destroy($id){
        try{

            DB::beginTransaction();
            $admins = DocumentForExecutiveCommitteeApproval::find($id);

            if (!is_null($admins)) {
                $admins->delete();
            }
            DB::commit();
            return back()->with('error','Deleted successfully!');

        } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
        }
    }
}
