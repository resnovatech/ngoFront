@extends('front.master.master')

@section('title')
{{ trans('fd9.fc2')}} | {{ trans('header.ngo_ab')}}
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
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফসি - ২</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফসি - ২ ফরম</h3>
                                        <h4>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fc2Form.update',$fc2FormList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" id="mainEditId" value="{{ $fc2FormList->id }}"/>
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">


                                                <table class="table table-bordered" style="width:100%">

                                                    <tr>
                                                        <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                        <th style="text-align: center; width: 25%">বিবরণ</th>
                                                        <th style="text-align: center;">তথ্যাদি</th>

                                                    </tr>



                                                    <tr>
                                                        <th style="text-align: center;" rowspan="10">১.</th>

                                                        <td style="font-weight:bold;" colspan="3">বৈদেশিক অনুদান গ্রহণকারী ব্যাক্তির তথ্য</td>


                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ক.</td>
                                                        <td>  পূর্ণ নাম  <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input required type="text" value="{{ $fc2FormList->person_full_name }}" name="person_full_name" class="form-control " id=""
                                                               placeholder="পূর্ণ নাম ">
                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td style="text-align: center;">খ.</td>
                                                        <td>পিতার নাম <span style="color:red;">*</span> </td>
                                                        <td> <input type="text" value="{{ $fc2FormList->person_father_name }}" required name="person_father_name" class="form-control " id=""
                                                            placeholder="পিতার নাম"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">গ.</td>
                                                        <td>মাতার নাম<span style="color:red;">*</span> </td>
                                                        <td> <input type="text" value="{{ $fc2FormList->person_mother_name }}" required name="person_mother_name" class="form-control " id=""
                                                            placeholder="মাতার নাম"></td>

                                                    </tr>


                                                    <tr>

                                                        <td style="text-align: center;">ঘ.</td>
                                                        <td>পেশা<span style="color:red;">*</span> </td>
                                                        <td> <input type="text" value="{{ $fc2FormList->person_occupation }}" required name="person_occupation" class="form-control " id=""
                                                            placeholder="পেশা"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ঙ.</td>
                                                        <td>জাতীয় পরিচয়পত্র নম্বর <span style="color:red;">*</span> </td>
                                                        <td> <input type="text" value="{{ $fc2FormList->person_nid }}" required name="person_nid" class="form-control " id=""
                                                            placeholder="জাতীয় পরিচয়পত্র নম্বর"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">চ.</td>
                                                        <td>পাসপোর্ট নম্বর (যদি থাকে)<span style="color:red;">*</span> </td>
                                                        <td> <input type="text" value="{{ $fc2FormList->person_passport }}" required name="person_passport" class="form-control " id=""
                                                            placeholder="পাসপোর্ট নম্বর (যদি থাকে)"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ছ.</td>
                                                        <td>টি আই এন নম্বর <span style="color:red;">*</span> </td>
                                                        <td> <input type="text" value="{{ $fc2FormList->person_tin }}" required name="person_tin" class="form-control " id=""
                                                            placeholder="টি আই এন নম্বর "></td>

                                                    </tr>
 <?php


$newNationality =  DB::table('countries')->whereNotNull('country_people_bangla')
                                           ->groupBy('country_people_bangla')
                                           ->select('country_people_bangla')->get();



            ?>
                                                    <tr>

                                                        <td style="text-align: center;">জ.</td>
                                                        <td>জাতীয়তা /নাগরিকত্ব <span style="color:red;">*</span> </td>
                                                        <td>
                                                           

                                                                          <select  name="person_nationality" class="form-control" id=""
                                placeholder="জাতীয়তা/নাগরিকত্ব">

                                <option value="">অনুগ্রহ করে নির্বাচন করুন</option>

                                @foreach ($newNationality as $newNationalitys)
                                <option value="{{ $newNationalitys->country_people_bangla }}" {{$newNationalitys->country_people_bangla == $fc2FormList->person_nationality ? 'selected':'' }}>{{ $newNationalitys->country_people_bangla }}</option>
                                @endforeach

                                </select>
                                                        </td>

                                                    </tr>


                                                    <tr>

                                                        <td style="text-align: center;">ঝ.</td>
                                                        <td>পূর্ণ ঠিকানা (টেলিফোন,মোবাইল ,ই -মেইলসহ )<span style="color:red;">*</span> </td>
                                                        <td>

                                                            <input type="text" required value="{{ $fc2FormList->person_full_address }}" name="person_full_address" class="form-control" id=""
                                                            placeholder="পূর্ণ ঠিকানা">

                                                            <input type="text" value="{{ $fc2FormList->person_tele_phone_number }}" required name="person_tele_phone_number"  class="form-control mt-2" id=""
                                                                   placeholder="টেলিফোন">

                                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            type = "number" required value="{{ $fc2FormList->person_mobile }}"
                                                            maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="person_mobile" class="form-control mt-2" id=""
                                                                   placeholder="মোবাইল">


                                                            <input type="text" value="{{ $fc2FormList->person_email }}" name="person_email" class="form-control mt-2" id=""
                                                                   placeholder="ইমেইল">

                                                    </td>

                                                    </tr>
                                                  <!-- step one start  -->



                                                    <!-- step two strat --->

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="4">২.</th>

                                                        <td style="font-weight:bold;" colspan="2">প্রকল্পের মেয়াদ</td>
                                                        <td></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ক.</td>
                                                        <td> আরম্ভের তারিখ <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input required type="text" value="{{ $fc2FormList->ngo_prokolpo_start_date }}" name="ngo_prokolpo_start_date" class="form-control datepickerOne" id=""
                                                               placeholder="আরম্ভের তারিখ">


                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td style="text-align: center;">খ.</td>
                                                        <td>সমাপ্তির তারিখ  <span style="color:red;">*</span> </td>
                                                        <td> <input type="text" required value="{{ $fc2FormList->ngo_prokolpo_end_date }}"  name="ngo_prokolpo_end_date" class="form-control datepickerOne" id=""
                                                            placeholder="সমাপ্তির তারিখ"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">গ.</td>
                                                        <td>প্রকল্পের ধরণ <span style="color:red;">*</span> </td>
                                                        <td>

                                                            <?php
                                                            $subjectIdList  = explode(",",$fc2FormList->subject_id);

                                                            ?>
                                                                    <select multiple required name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                                                                           placeholder="">
                                                                           <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                                                           @foreach($projectSubjectList as $projectSubjectLists)
                                                                           <option value="{{ $projectSubjectLists->id }}" {{ (in_array($projectSubjectLists->id,$subjectIdList)) ? 'selected' : '' }}>{{ $projectSubjectLists->name }}</option>
                                                                           @endforeach
                                                                    </select>

                                                    </td>

                                                    </tr>





                                                    <!-- step two end --->

                                                    <!-- step three start -->

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="2">৩.</th>
                                                        <td style="font-weight:bold;" colspan="3">অনুদান গ্রহণের উদ্দেশ্য<span style="color:red;">*</span><span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>


                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <textarea required name="purpose_of_donation" class="form-control summernote" id=""
                                                            placeholder="বিস্তারিত বিবরণ">

                                                            {!! $fc2FormList->purpose_of_donation !!}
                                                        </textarea>

                                                            <input type="file" accept=".pdf" name="purpose_of_donation_pdf" class="form-control mt-3" id=""
                                                               placeholder="পূর্ণ নাম">

                                                               @if(empty($fc2FormList->purpose_of_donation_pdf))


                                                               @else


                                                               <?php

                                                               $file_path = url($fc2FormList->purpose_of_donation_pdf);
                                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                               ?>
                                                                <b>{{ $filename.'.'.$extension }}</b>
                                                                @endif
                                                        </td>
                                                    </tr>
                                                  <!-- step one start  -->

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="4">৪.</th>

                                                        <td style="font-weight:bold;" colspan="2">কর্ম এলাকা ও বাজেট</td>
                                                        <td> <div class="d-flex justify-content-between ">
                                                            <div class="p-2">


                                                            </div>
                                                            <div class="p-2">
                                                                <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                                     যুক্ত করুন
                                                                </button>
                                                            </div>
                                                        </div></td>

                                                    </tr>
                                                    <tr>

                                                        {{-- <td style="text-align: center;">ক.</td> --}}
                                                        <td colspan="3" rowspan="3">

                                                            <div class="table-responsive" id="tableAjaxDatapro">


                                                                @include('front.fc2Form._partial.prokolpoAreaTable')
                                                            </div>

                                                </td>


                                                    </tr>
                                                    <tr>
                                                    </tr>

                                                    <tr>
                                                    </tr>

                                                    <!-- step three end -->

                                                    <!-- step four start --->

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="19">৫.</th>

                                                        <th style="" colspan="3">যে বৈদেশিক উৎস থেকে অনুদান গ্রহণ করা হবে তার বিবরণ</th>

                                                    </tr>



                                                    <tr >

                                                        <td style="text-align: center;">অ.</td>
                                                        <th>ব্যক্তির ক্ষেত্রে</th>
                                                        <td>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ক.</td>
                                                        <td>পূর্ণ নাম <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->foreigner_donor_full_name }}" name="foreigner_donor_full_name" class="form-control" id=""
                                                               placeholder="পূর্ণ নাম">

                                                        </td>

                                                    </tr>


                                                    <tr>

                                                        <td style="text-align: center;">খ.</td>
                                                        <td>পেশা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->foreigner_donor_occupation }}" name="foreigner_donor_occupation" class="form-control" id=""
                                                            placeholder="পেশা">

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">গ.</td>
                                                        <td>যোগাযোগের ঠিকানা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->foreigner_donor_address }}" name="foreigner_donor_address" class="form-control" id=""
                                                               placeholder="যোগাযোগের ঠিকানা">

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ঘ.</td>
                                                        <td>টেলিফোন, ফ্যাক্স ও ইমেইল নম্বর <span style="color:red;">* </span></td>
                                                        <td>

                                                                <input type="text" value="{{ $fc2FormList->foreigner_donor_telephone_number }}" name="foreigner_donor_telephone_number" class="form-control mt-2" id=""
                                                                       placeholder="টেলিফোন">


                                                                <input type="text" value="{{ $fc2FormList->foreigner_donor_fax }}" name="foreigner_donor_fax" class="form-control mt-2" id=""
                                                                       placeholder="ফ্যাক্স">

                                                                <input type="text" value="{{ $fc2FormList->foreigner_donor_email }}" name="foreigner_donor_email" class="form-control mt-2" id=""
                                                                       placeholder="ইমেইল নম্বর">


                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ঙ.</td>
                                                        <td>জাতীয়তা/নাগরিকত্ব <span style="color:red;">* </span></td>
                                                        <td>


                                                                               <select  name="foreigner_donor_nationality" class="form-control" id=""
                                placeholder="জাতীয়তা/নাগরিকত্ব">

                                <option value="">অনুগ্রহ করে নির্বাচন করুন</option>

                                @foreach ($newNationality as $newNationalitys)
                                <option value="{{ $newNationalitys->country_people_bangla }}" {{$newNationalitys->country_people_bangla == $fc2FormList->foreigner_donor_nationality ? 'selected':'' }}>{{ $newNationalitys->country_people_bangla }}</option>
                                @endforeach

                                </select>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">চ.</td>
                                                        <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                                            United Nations Security Council’s Resolution (UNSCR)
                                                            কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->foreigner_donor_is_verified }}" name="foreigner_donor_is_verified" class="form-control" id=""
                                                               placeholder="প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা">

                                                        </td>

                                                    </tr>

                                                    <tr>



                                                        <td style="text-align: center;">ছ.</td>
                                                        <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->foreigner_donor_is_affiliatedrict }}" name="foreigner_donor_is_affiliatedrict" class="form-control" id=""
                                                            placeholder="উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা">

                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;"> আ.</td>
                                                    <th>সংস্থার ক্ষেত্রে</th>
                                                    <td>

                                                    </td>

                                                </tr>

    <tr>

                                                        <td style="text-align: center;">ক.</td>
                                                        <td>সংস্থার নাম <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text"  value="{{ $fc2FormList->organization_name }}" name="organization_name" class="form-control" id=""
                                                            placeholder="সংস্থার নাম">

                                                        </td>

                                                    </tr>


                                                    <tr>

                                                        <td style="text-align: center;">খ.</td>
                                                        <td>অফিস/ সংস্থার ঠিকানা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->organization_address }}" name="organization_address" class="form-control" id=""
                                                            placeholder="অফিস/ সংস্থার ঠিকানা">

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">গ.</td>
                                                        <td>টেলিফোন, ফ্যাক্স নম্বর <span style="color:red;">* </span></td>
                                                        <td>

                                                                <input type="text" value="{{ $fc2FormList->organization_telephone_number }}" name="organization_telephone_number" class="form-control mt-2" id=""
                                                                       placeholder="টেলিফোন">

                                                                <input type="text" value="{{ $fc2FormList->organization_fax }}" name="organization_fax" class="form-control mt-2" id=""
                                                                       placeholder="ফ্যাক্স নম্বর">


                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ঘ.</td>
                                                        <td>ই-মেইল ও ওয়েবসাইট <span style="color:red;">* </span></td>
                                                        <td>


                                                                <input type="text" value="{{ $fc2FormList->organization_email }}" name="organization_email" class="form-control mt-2" id=""
                                                                       placeholder="ই-মেইল">

                                                                <input type="text" value="{{ $fc2FormList->organization_website }}" name="organization_website" class="form-control mt-2" id=""
                                                                       placeholder="ওয়েবসাইট">



                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ঙ.</td>
                                                        <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধে নিমিত্ত
                                                            United Nations Security Council’s Resolution (UNSCR)
                                                            কর্তৃক প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->organization_is_verified }}"  name="organization_is_verified" class="form-control" id=""
                                                               placeholder="প্রকাশিত তালিকার সংগে দাতার তথ্য যাচাই করা হয়েছে কিনা">

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">চ.</td>
                                                        <td>উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->relation_with_donor }}"  name="relation_with_donor" class="form-control" id=""
                                                               placeholder="উক্ত তালিকাভুক্ত ব্যক্তি/ ব্যক্তিবর্গ/ সংস্থার সাথে দাতার সংশ্লিষ্টতা আছে কিনা">

                                                        </td>

                                                    </tr>

                                                    <tr>



                                                        <td style="text-align: center;">ছ.</td>
                                                        <td>প্রধান নির্বাহী কর্মকর্তার নাম ও পদবি <span style="color:red;">* </span></td>
                                                        <td>
                                                            <input type="text" value="{{ $fc2FormList->organization_ceo_name }}" name="organization_ceo_name" class="form-control" id=""
                                                            placeholder="প্রধান নির্বাহী কর্মকর্তার নাম">

                                                            <input type="text" value="{{ $fc2FormList->organization_ceo_designation }}" name="organization_ceo_designation" class="form-control mt-2" id=""
                                                            placeholder="প্রধান নির্বাহী কর্মকর্তার পদবি">

                                                        </td>

                                                    </tr>


                                            <tr>
                                                <td style="text-align: center;">জ.</td>
                                                    <td>বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম ও পদবি <span style="color:red;">* </span></td>
                                                    <td>

                                                            <input type="text" value="{{ $fc2FormList->organization_name_of_executive_responsible_for_bd }}" name="organization_name_of_executive_responsible_for_bd" class="form-control" id=""
                                                                   placeholder="বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর নাম">


                                                            <input type="text" value="{{ $fc2FormList->organization_name_of_executive_responsible_for_bd_designation }}"  name="organization_name_of_executive_responsible_for_bd_designation" class="form-control mt-3" id=""
                                                                   placeholder="বাংলাদেশের জন্য দায়িত্ব প্রাপ্ত নির্বাহীর পদবি">


                                                    </td>

                                                </tr>


                                                <tr>
                                                    <td style="text-align: center;">ঝ.</td>
                                                        <td>সংস্থার উদ্দেশ্যসমূহ <span style="color:red;">* </span></td>
                                                        <td>

                                                            <textarea name="objectives_of_the_organization" class="form-control summernote" id=""
                                                            placeholder="সংস্থার উদ্দেশ্যসমূহ">

                                                            {!! $fc2FormList->objectives_of_the_organization !!}

                                                        </textarea>


                                                        </td>

                                                    </tr>
                                                    <!-- steap four end -->

                                                    <!-- step five start -->

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="2">৬.</th>

                                                        <td style="font-weight:bold;" colspan="2">প্রতিশ্রতিপত্র আছে কি না</td>
                                                        <td style="font-weight:bold;">কাজের নাম,অর্থের পরিমাণ ও মেয়াদকাল সুস্পষ্টভাবে উল্লেখপূর্বক কপি সংযুক্ত  করতে হবে </td>

                                                    </tr>

                                                    <tr>


                                                        <td colspan="3">

                                                            <input type="text" required value="{{ $fc2FormList->bond_paper_available_or_not }}" name="bond_paper_available_or_not" class="form-control mt-1" id=""
                                                            placeholder="প্রতিশ্রতিপত্র আছে কি না">

                                                            <input type="text" required value="{{ $fc2FormList->bond_paper_work_name }}" name="bond_paper_work_name" class="form-control mt-1" id=""
                                                            placeholder="কাজের নাম">

                                                            <input type="text" required value="{{ $fc2FormList->bond_paper_amount }}" name="bond_paper_amount" class="form-control mt-1" id=""
                                                            placeholder="অর্থের পরিমাণ">

                                                            <input type="text" required value="{{ $fc2FormList->bond_paper_duration }}" name="bond_paper_duration" class="form-control mt-1" id=""
                                                            placeholder="মেয়াদকাল">

                                                            <input type="file" accept=".pdf"  name="bond_paper_pdf" class="form-control mt-1" id=""
                                                            placeholder="প্রতিশ্রতিপত্র আছে কি না">

                                                            @if(empty($fc2FormList->bond_paper_pdf))


                                                            @else


                                                            <?php

                                                            $file_path = url($fc2FormList->bond_paper_pdf);
                                                            $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                            $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                            ?>
                                                             <b>{{ $filename.'.'.$extension }}</b>
                                                             @endif

                                                        </td>

                                                    </tr>

                                                    <!-- step five end --->

                                                    <!-- step six start -->

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="4">৭.</th>
                                                        <td></td>
                                                        <td style="font-weight:bold;">অনুদানের বিস্তারিত বিবরণ</td>
                                                        <td></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ক.</td>
                                                        <td>  বৈদেশিক মুদ্রার পরিমান<span style="color:red;">* </span></td>
                                                        <td>
                                                            <input required type="number" value="{{ $fc2FormList->organization_amount_of_foreign_currency }}" name="organization_amount_of_foreign_currency" class="form-control" id=""
                                                               placeholder="বৈদেশিক মুদ্রার পরিমান">
                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td style="text-align: center;">খ.</td>
                                                        <td>সমপরিমাণ বাংলাদেশী টাকা<span style="color:red;">*</span> </td>
                                                        <td><input required type="number" value="{{ $fc2FormList->equivalent_amount_of_bd_taka }}"  name="equivalent_amount_of_bd_taka" class="form-control" id=""
                                                            placeholder="সমপরিমাণ বাংলাদেশী টাকা"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">গ.</td>
                                                        <td>পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য)<span style="color:red;">*</span> </td>
                                                        <td><input required type="number" value="{{ $fc2FormList->commodities_value_in_bangladeshi_currency }}" name="commodities_value_in_bangladeshi_currency" class="form-control" id=""
                                                            placeholder="পণ্যসামগ্রী (বাংলাদেশী মুদ্রায় আনুমানিক মূল্য)"></td>

                                                    </tr>

                                                    <tr>
                                                        <th style="text-align: center;" rowspan="4">৮.</th>
                                                        <td></td>
                                                        <td style="font-weight:bold;">ব্যাংক সংক্রান্ত তথ্যাবলী</td>
                                                        <td></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">ক.</td>
                                                        <td>যে ব্যাংকের মাধ্যমে বৈদেশিক অনুদান গ্রহণ করতে ইচ্ছুক তার নাম ও ঠিকানা</td>
                                                        <td>
                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" value="{{ $fc2FormList->bank_name }}" name="bank_name" class="form-control" id=""
                                                                       placeholder="নাম">
                                                            </div>
                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" value="{{ $fc2FormList->bank_address }}" name="bank_address" class="form-control" id=""
                                                                       placeholder="ঠিকানা">
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <tr>

                                                        <td style="text-align: center;">খ.</td>
                                                        <td>ব্যাংক হিসাবের নাম</td>
                                                        <td> <input type="text" value="{{ $fc2FormList->bank_account_name }}" name="bank_account_name" class="form-control" id=""
                                                            placeholder="ব্যাংক হিসাবের নাম"></td>

                                                    </tr>

                                                    <tr>

                                                        <td style="text-align: center;">গ.</td>
                                                        <td>ব্যাংক হিসাব নম্বর</td>
                                                        <td><input type="text" value="{{ $fc2FormList->bank_account_number }}"  name="bank_account_number" class="form-control" id=""
                                                            placeholder="ব্যাংক হিসাব নম্বর"/></td>

                                                    </tr>

                                                    <!-- step six end -->

                                                </table>




                                            </div>
                                        </div>
                                        <!-- step one end --->


                                        <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration">দাখিল করুন
                                        </button>
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

@include('front.fc2Form._partial.stepOneModal')
<!-- end modal -->
@endsection

@section('script')
@include('front.fc2Form._partial.script')
@include('front.include.globalScript')
@endsection
