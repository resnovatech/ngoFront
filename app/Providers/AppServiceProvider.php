<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\NgoTypeAndLanguage;
use DB;
use Auth;
use App\Models\NgoBankInformation;
use App\Models\NgoHeadInformation;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        

        if(\Illuminate\Support\Facades\Schema::hasTable('project_subjects')){

            $projectSubjectList = DB::table('project_subjects')->orderBy('id','desc')->get();

        }else{
            $projectSubjectList= 0;


        }

        view()->share('projectSubjectList', $projectSubjectList);


        if(\Illuminate\Support\Facades\Schema::hasTable('ngo_type_and_languages')){



             //compose all the views....
    view()->composer('*', function ($view)
    {
        if (Auth::check()) {
        $localNgoTypem = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
            ->where('ngo_type','দেশিও')->value('ngo_type_new_old');


            $foreignNgoType = NgoTypeAndLanguage::where('user_id',Auth::user()->id)
            ->where('ngo_type','Foreign')->value('ngo_type_new_old');



        $view->with('localNgoTypem', $localNgoTypem );
        $view->with('foreignNgoType', $foreignNgoType );


        //april 2025

        $getNgoHeadInfoList =  NgoHeadInformation::where('user_id', Auth::user()->id)
                             ->where('status',1)->first();
        $getNgoBankInfoList =  NgoBankInformation::where('user_id', Auth::user()->id)
        ->where('status',1)->first();

        if(!$getNgoHeadInfoList){

            $chiefNameGlobal =  '';
            $chiefDesignationGlobal =  '';
            $chiefSignatureGlobal =  '';
            $chiefSealGlobal =  '';

        }else{

            $chiefNameGlobal =  $getNgoHeadInfoList->chief_name;
            $chiefDesignationGlobal =  $getNgoHeadInfoList->chief_desi;
            $chiefSignatureGlobal =  $getNgoHeadInfoList->chief_signature;
            $chiefSealGlobal =  $getNgoHeadInfoList->chief_seal;
        }


        if(!$getNgoBankInfoList){

            $accountNumberGlobal =  '';
            $accountTypeGlobal =  '';
            $nameOfBankGlobal =  '';
            $branchNameOfBankGlobal =  '';
            $bankAddressGlobal =  '';

        }else{

            $accountNumberGlobal =  $getNgoBankInfoList->account_number;
            $accountTypeGlobal =  $getNgoBankInfoList->account_type;
            $nameOfBankGlobal =  $getNgoBankInfoList->name_of_bank;
            $branchNameOfBankGlobal =  $getNgoBankInfoList->branch_name_of_bank;
            $bankAddressGlobal =  $getNgoBankInfoList->bank_address;
        }



        $view->with('accountNumberGlobal', $accountNumberGlobal );
        $view->with('accountTypeGlobal', $accountTypeGlobal );
        $view->with('nameOfBankGlobal', $nameOfBankGlobal );
        $view->with('branchNameOfBankGlobal', $branchNameOfBankGlobal );
        $view->with('bankAddressGlobal', $bankAddressGlobal );


        $view->with('chiefNameGlobal', $chiefNameGlobal );
        $view->with('chiefDesignationGlobal', $chiefDesignationGlobal );
        $view->with('chiefSignatureGlobal', $chiefSignatureGlobal );
        $view->with('chiefSealGlobal', $chiefSealGlobal );



        //april 2025





        }else{

            $accountNumberGlobal =  '';
            $accountTypeGlobal =  '';
            $nameOfBankGlobal =  '';
            $branchNameOfBankGlobal =  '';
            $bankAddressGlobal =  '';

            $chiefNameGlobal =  '';
            $chiefDesignationGlobal =  '';
            $chiefSignatureGlobal =  '';
            $chiefSealGlobal =  '';


            $view->with('accountNumberGlobal', $accountNumberGlobal );
            $view->with('accountTypeGlobal', $accountTypeGlobal );
            $view->with('nameOfBankGlobal', $nameOfBankGlobal );
            $view->with('branchNameOfBankGlobal', $branchNameOfBankGlobal );
            $view->with('bankAddressGlobal', $bankAddressGlobal );
    
    
            $view->with('chiefNameGlobal', $chiefNameGlobal );
            $view->with('chiefDesignationGlobal', $chiefDesignationGlobal );
            $view->with('chiefSignatureGlobal', $chiefSignatureGlobal );
            $view->with('chiefSealGlobal', $chiefSealGlobal );

            $view->with('localNgoTypem', '1');
            $view->with('foreignNgoType','2');

        }
    });







        }else{

            $localNgoTypem = 0;


            $foreignNgoType = 0;

            view()->share('localNgoTypem', $localNgoTypem);
            view()->share('foreignNgoType',  $foreignNgoType);

        }

        //dd($foreignNgoType);


    }
}
