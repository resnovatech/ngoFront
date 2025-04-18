@extends('front.master.master')

@section('title')
এফডি-৯ ফরম | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')



<section>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="user_profile_dashboard_upper">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                @if(empty(Auth::user()->image))
                                {{-- <img src="{{ asset('/') }}public/demo_315x315.jpg" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @else
                                     {{-- <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Admin"
                                     class="rounded-circle" width="100"> --}}
                                     @endif
                                <div class="mt-3">
                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                    <h4>{{ $ngo_list_all->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngo_list_all->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngo_list_all->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngo_list_all->organization_address }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    @include('front.include.acceptSidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-12">



                    <div class="card">
                        <div class="card-body">
                            <div class="name_change_box">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="others_inner_section">
                                            <h1>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h1>
                                            <div class="notice_underline"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3 card-custom-color">
                                    <div class="card-body">

                                        <div class="form9_upper_box">
                                            <h3>এফডি-৯ ফরম</h3>
                                            <h4>বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম</h4>
                                            {{-- <h5>(আবশ্যকাবে বাংলা নিকস ফন্টে পুরণ করে দাখিল করতে হবে)</h5> --}}

                                            <div>
                                                <p>বরাবর <br>
                                                মহাপরিচালক <br>
                                                এনজিও বিষয় ব্যুরো, ঢাকা <br>
                                                জনাব,</p>

                                                @if($checkNgoTypeForForeginNgo->ngo_type_new_old == 'Old')
                                                <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($checkNgoTypeForForeginNgo->registration)}}
                                                    তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                    অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                    এন-ভিসা প্রাপ্তির সুপারিশপত্র
                                                    পাওয়ার জন্য আবেদন করছিঃ</p>
                                                @else
                                                <p>নিম্নলখিত নিয়োগপ্রাপ্ত বিদেশি নাগরিক/নাগরিকগণকে এ সংস্থায় (নিবন্ধন নম্বরঃ {{App\Http\Controllers\NGO\CommonController::englishToBangla($ngo_list_all->registration_number)}}
                                                    তারিখঃ {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('d-m-Y', strtotime($ngoStatus->updated_at->format('d-m-Y')))) }}) বৈদেশিক
                                                    অনুদান (স্বেচ্ছাসেবামূলক কর্মকান্ড) রেগুলেশন আইন ২০১৬ অনুযায়ী নিয়োগপত্র সত্যায়ন ও
                                                    এন-ভিসা প্রাপ্তির সুপারিশপত্র
                                                    পাওয়ার জন্য আবেদন করছিঃ</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <h5 class="form_middle_text">
                                                বিদেশীদের  তথ্য
                                            </h5>
                                        </div>





                                        <form method="post" action="{{ route('fdNineForm.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf


<!-- empty data -->
<div class="row">
    <div class="mb-3 col-lg-12">
        <label for="" class="form-label">বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_foreigner_name" style="text-transform: uppercase" value="" required>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি <span
            class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 200 KB & Image Format:PNG)</span></label>
        <input type="file" class="form-control" id="fdNinePdf6"
               placeholder="" accept="image/png" name="fd9_foreigner_passport_size_photo" required>

               <p id="fdNinePdf6_text" class="text-danger mt-2" style="font-size:12px;"></p>
    </div>

    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">পাসপোর্টের কপি সংযুক্ত<span
            class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
            <input type="file" accept=".pdf" class="form-control" id="fdNinePdf7"
            placeholder=""  name="fd9_copy_of_passport" required>
            <p id="fdNinePdf7_text" class="text-loght mt-2" style="font-size:12px;"></p>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পিতার নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fd9_father_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">স্বামী/স্ত্রীর নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fd9_husband_or_wife_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">মাতার নাম<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" name="fd9_mother_name" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জন্ম স্থান<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_birth_place" value="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জন্ম তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne"  id=""
               placeholder="" name="fd9_dob" value="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পাসপোর্ট নম্বর<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_passport_number" value="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পাসপোর্ট ইস্যু তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" id=""
               placeholder="" name="fd9_passport_issue_date" value="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পাসপোর্ট মেয়াদউত্তীর্ণের তারিখ<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control datepickerOne" value="" name="fd9_passport_expiration_date" id=""
               placeholder="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label"> পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_identification_mark_given_in_passport" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পুরুষ/মহিলা<span
            class="text-danger">*</span></label>
        <select name="fd9_male_or_female" class="form-control" id="" required>
            <option value="পুরুষ">পুরুষ</option>
            <option value="মহিলা">মহিলা</option>
        </select>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">বৈবাহিক অবস্থা<span
            class="text-danger">*</span></label>
        {{-- <select name="fd9_marital_status" class="form-control" id="" required>
            <option value="বিবাহিত">বিবাহিত</option>
            <option value="অবিবাহিত">অবিবাহিত</option>
            <option value="ডিভোর্স">ডিভোর্স </option>
        </select> --}}
        <input type="text" class="form-control" id=""
        placeholder="" name="fd9_marital_status" value="" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">জাতীয়তা / নাগরিকত্ব<span
            class="text-danger">*</span></label>

            <input type="text" class="form-control" id=""
        placeholder="" name="fd9_nationality_or_citizenship" value="" required>

        {{-- <select class="js-example-basic-single form-control" data-parsley-required name="fd9_nationality_or_citizenship"
        >
<option value="">--একটা নির্বাচন করুন--</option>
         @foreach($getCityzenshipData as $allGetCityzenshipData)
         @if(session()->get('locale') == 'en')
         <option value="{{ $allGetCityzenshipData->country_people_bangla }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
         @else
     <option value="{{ $allGetCityzenshipData->country_people_bangla }}" >{{ $allGetCityzenshipData->country_people_bangla }}</option>
     @endif
     @endforeach

 </select> --}}
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">একাধিক নাগরিকত্ব থাকলে বিবরণ</label>
        <textarea  name="fd9_details_if_multiple_citizenships" id="" cols="30" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3 col-lg-6">
        <label for="" class="form-label">পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ</label>
        <textarea  name="fd9_previous_citizenship_is_grounds_for_non_retention" id="" cols="30" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3 col-lg-8">
        <label for="" class="form-label">বর্তমান ঠিকানা<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_current_address" required>
    </div>
    <div class="mb-3 col-lg-4">
        <label for="" class="form-label">পরিবারের সদস্য সংখ্যা<span
            class="text-danger">*</span></label>
        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_number_of_family_members" required>
    </div>

    <div class="mb-3 row">
        <label for="" class="col-sm-12 col-form-label">পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন):</label>
    </div>

    <div class="mb-3 col-lg-12">
        <table class="table table-light" id="dynamicAddRemove">
            <tr>
                <th>নাম</th>
                <th>বয়স</th>
                <th></th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="family_member_name[]"
                           class="form-control" />
                </td>
                <td>
                    <input type="text" name="family_member_age[]"
                           class="form-control" />
                </td>
                <td></td>
            </tr>
        </table>
        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">নতুন সদস্য যোগ করুন
        </button>
    </div>
    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">

                একাডেমিক যোগ্যতা(একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে)
                <span
            class="text-danger">*</span><span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                     <label>একাডেমিক যোগ্যতা</label>
                        <input type="text" required name="fd9_academic_qualification_des" id="" class="form-control"/>

                    </div>

                    <div class="col-md-6">
                        <label>সংযুক্তি </label>
                        <input type="file" accept=".pdf"  class="form-control" id="fdNinePdf1"
                        placeholder="" required name="fd9_academic_qualification">

                        <p id="fdNinePdf1_text" class="text-danger mt-2" style="font-size:12px;"></p>

                    </div>
                </div>

            </div>
        </div>



    </div>



    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে হবে)<span class="text-white" style="font-size: 12px;">(Maximum 1 MB)</span>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
<label>কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে</label>
                        <input type="text"  name="fd9_technical_and_other_qualifications_if_any_des" id="" class="form-control"/>

                    </div>

                    <div class="col-md-6">
                        <label>সংযুক্তি </label>
                        <input type="file" accept=".pdf"  class="form-control" id="fdNinePdf2"
               placeholder=""  name="fd9_technical_and_other_qualifications_if_any">

               <p id="fdNinePdf2_text" class="text-danger mt-2" style="font-size:12px;"></p>

                    </div>
                </div>

            </div>
        </div>



    </div>



    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)<span
                class="text-danger">*</span><span class="text-white" style="font-size: 12px;">(Maximum 1 MB)</span>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <label>অতীত অভিজ্ঞতা এবং নিয়োগপ্রাপ্ত কাজে দক্ষতা</label>
                        <input type="text" required name="fd9_past_experience_des" id="" class="form-control"/>

                    </div>

                    <div class="col-md-6">
                        <label>সংযুক্তি </label>
                        <input type="file" accept=".pdf"  required class="form-control" id="fdNinePdf3"
                        placeholder="" name="fd9_past_experience">

                        <p id="fdNinePdf3_text" class="text-danger mt-2" style="font-size:12px;"></p>

                    </div>
                </div>

            </div>
        </div>



    </div>


    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)

            </div>
            <div class="card-body">

                {{-- <input type="text" required class="form-control" id=""
                placeholder="" name="fd9_countries_that_have_traveled"> --}}
<?php

$countryList = DB::table('countries')->orderBy('id','asc')->get();

?>

                <select class="js-example-basic-multiple form-control"  name="fd9_countries_that_have_traveled[]"
                multiple="multiple">
                <option value="">{{ trans('civil.select')}}</option>
                @foreach($countryList as $allGetCityzenshipData)

                <option value="{{ $allGetCityzenshipData->country_name_bangla }}" >{{ $allGetCityzenshipData->country_name_bangla }}</option>

            @endforeach

        </select>

            </div>
        </div>



    </div>


    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র ও চুক্তিপত্র কপি সংযুক্ত করতে হবে)<span
                class="text-danger">*</span>

            </div>
            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">

                        <label for="" class="form-label mt-2">পদের নাম<span
                            class="text-danger">*</span></label>
                        <input type="text"  name="fd9_offered_post_name" id="" class="form-control" required/>
                    </div>
                    <div class="col-md-6 mt-3">

                        <label for="" class="form-label mt-2">নিয়োগপত্র<span
                            class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
                        <input type="file" accept=".pdf"  required class="form-control" id="fdNinePdf4"
                               placeholder="" name="fd9_offered_post_niyog">
                               <p id="fdNinePdf4_text" class="text-danger mt-2" style="font-size:12px;"></p>

                    </div>

                    <div class="col-md-6 mt-3">

                        <label for="" class="form-label mt-2">চুক্তিপত্র<span
                            class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></label>
                        <input type="file" accept=".pdf"  required class="form-control" id="fdNinePdf55"
                               placeholder="" name="fd9_offered_post">
                               <p id="fdNinePdf55_text" class="text-danger mt-2" style="font-size:12px;"></p>

                    </div>
                </div>

            </div>
        </div>



    </div>


    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন পত্র সংযুক্ত করতে হবে)<span
                class="text-danger">*</span><span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <lable>প্রকল্পের নাম</lable>
                                                <input type="text" required name="fd9_name_of_proposed_project_name" id="" class="form-control"/>

                                            </div>
                    <div class="col-md-6">
<lable>প্রকল্পের মেয়াদ </lable>
                        <input type="text" required name="fd9_name_of_proposed_project_duration" id="" class="form-control"/>

                    </div>

                    <div class="col-md-12 mt-3">
                        <label>সংযুক্তি </label>
                        <input type="file" accept=".pdf"  required class="form-control" id="fdNinePdf5"
                        placeholder="" name="fd9_name_of_proposed_project">

                        <p id="fdNinePdf5_text" class="text-danger mt-2" style="font-size:12px;"></p>

                    </div>
                </div>

            </div>
        </div>



    </div>

    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে: (কে) নতুন (খ) প্রতিস্থাপিত (গ) এক্সটেনশন (খ) চলমান<span
            class="text-danger">*</span>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <label>তারিখ</label>

                        <input type="text" class="form-control datepickerOne" id=""
                        placeholder="" name="fd9_extension_date_new" required>
                    </div>

                    <div class="col-md-6">
                        <label>ধরণ</label>
                        <select name="fd9_date_of_appointment" class="form-control" id="" required>
                            <option value="নতুন">নতুন</option>
                            <option value="প্রতিস্থাপিত">প্রতিস্থাপিত</option>
                            <option value="এক্সটেনশন">এক্সটেনশন</option>
                            <option value="চলমান">চলমান</option>
                        </select>
                    </div>

                </div>



            </div>
        </div>



    </div>


    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                এক্সটেনশন হয়ে থাকলে তার সময়কাল

            </div>
            <div class="card-body">

                <input type="text" class="form-control datepickerOne" id=""
                placeholder="" name="fd9_extension_date" >

            </div>
        </div>



    </div>


    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন:<span
            class="text-danger">*</span>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label mt-2">কতজন বিদেশির পদের সংস্থান রয়েছে </label>
                        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_post_available_for_foreigner" required>

                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label mt-2">কর্মরত কতজন </label>
                        <input type="text" class="form-control" id=""
               placeholder="" name="fd9_post_available_for_foreigner_and_working" required>

                    </div>
                </div>

            </div>
        </div>



    </div>


    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ:

            </div>
            <div class="card-body">

                <textarea type="text" class="form-control" id=""
                placeholder="" name="fd9_previous_work_experience_in_bangladesh" >

                </textarea>

            </div>
        </div>



    </div>

    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন<span
            class="text-danger">*</span>

            </div>
            <div class="card-body">

                <input type="text" class="form-control" id=""
                placeholder="" name="fd9_total_foreigner_working" required>

            </div>
        </div>



    </div>





    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                অন্য কোন তথ্য (যদি থাকে)

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="mb-3">
                            <table class="table table-light" id="dynamicAddRemoveInformation">
                                <tr>
                                    <th>ফাইল নাম </th>
                                    <th>ফাইল</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text"  name="file_name[]" class="form-control"/>
                                    </td>
                                    <td>
                                        <input type="file"  accept=".pdf"  name="main_file[]" class="form-control"/>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                            <button type="button" name="add" id="dynamic-information"
                                    class="btn btn-outline-primary">{{ trans('fd_one_step_four.add_new_information')}}
                            </button>
                        </div>
                    </div>




                    <div class="col-md-12 mt-3">
                        <label>অন্যান্য বিবরণ </label>
                                                <input type="text" class="form-control" id=""
                                       placeholder="" name="fd9_other_information" >

                                            </div>

                </div>

            </div>
        </div>



    </div>

    <div class="mb-3 col-lg-12">

        <div class="card">

            <div class="card-header">
                প্রধান নির্বাহীর তথ্যাদি

            </div>
            <div class="card-body">

                  <!--new code for ngo-->
     <div class="mb-3">
        <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
             <input type="text" data-parsley-required  name="chief_name"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
            <input type="text" data-parsley-required  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
        </div>



        <div class="mb-3">
            <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
<br>
                <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
<br>
            <input type="hidden" required  name="image_base64">
            <div class="croppedInput mt-2">

            </div>
            <!-- new code for image cropper start --->
            @include('front.signature_modal.sign_main_modal')
            <!-- new code for image cropper end -->

        </div>


        <div class="mb-3">
            <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
             <br>
            <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>

            <input type="hidden" required  name="image_seal_base64">
            <div class="croppedInputss mt-2">

            </div>
            <!-- new code for image cropper start --->
            @include('front.signature_modal.seal_main_modal')
            <!-- new code for image cropper end -->
        </div>
        <!-- end new code -->

            </div>
        </div>



    </div>


</div>




 <!--end empty data -->
 <div class="buttons d-flex justify-content-end mt-4">

    <button class="btn btn-danger me-2" name="submit_value" value="next_step_from_three" type="submit">তথ্য জমা দিন</button>

</div>
</form>







                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>

        </div>
    </div>
</section>
<!-- modal start --->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{ trans('oldorg.digiSign')}}</h5>

            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--  modal end -->
@endsection

@section('script')
@include('front.zoomButtonImage')
<script>
    var i = 0;
    $("#dynamic-information").click(function () {
        ++i;
        $("#dynamicAddRemoveInformation").append('<tr>' +
            '<td>' +
            '<input type="text"  name="file_name[]" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="file" accept=".pdf" name="main_file[]" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {
        $(this).parents('tr').remove();
    });

</script>


<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<input type="text" name="family_member_name[]" class="form-control" required/>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="family_member_age[]" class="form-control" required/>' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@endsection
