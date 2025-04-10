@extends('front.master.master')

@section('title')
{{ trans('fd9.fd7')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

    .alertify .ajs-body .ajs-content {
        font-weight: bolder;
        color:red;
        font-size: 20px;
    }

    .alertify .ajs-header{

        color:red;
        font-size: 20px;

    }

    .alertify .ajs-footer .ajs-buttons .ajs-button{

        background-color: #006A4E;
        color: #fff;

    }

</style>
<style>
    /* .ui-widget.ui-widget-content {
    top: 10px !important;
    } */
</style>
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
                                        <p>এফডি - ৭</p>
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
                                        <h1>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি-৭ ফরম</h3>
                                        <h4>দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd7Form.update',$fd7FormList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" id="mainEditId" value="{{ $fd7FormList->id }}"/>
                                           <!-- step one start -->

                                     <div class="row">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="table-responsive">
                                            <table class="table table-bordered" style="width:100%">

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                    <th style="text-align: center; width: 25%">বিবরণ</th>
                                                    <th style="text-align: center;">তথ্যাদি</th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">(০১)</th>
                                                    <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                                    <th style="text-align: center;">(০৩)</th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">১.</th>
                                                    <td style="text-align: center;">এনজিও'র নাম, ঠিকানা নিবন্ধন নম্বর ও তারিখ <span style="color:red;">*</span>:</td>
                                                    <th style="text-align: center;">
                                                        <div class="row">


                                                            <div class="mb-3 col-lg-12">



                                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                        <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                                        placeholder="এনজিও'র নাম">

                                                        @else


                                                        <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                                        placeholder="এনজিও'র নাম">


                                                        @endif



                                                            </div>
                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" required name="ngo_address" class="form-control" value="{{ $ngo_list_all->organization_address }}" id=""
                                                                       placeholder="ঠিকানা">
                                                            </div>

                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" required name="ngo_registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control" id=""
                                                                       placeholder="নিবন্ধন নম্বর">
                                                            </div>


                                                            <div class="mb-3 col-lg-12">

                                                                <input type="text" required name="ngo_registration_date" value="{{ date("d-m-Y", strtotime($ngoDurationReg)) }}" class="form-control datepickerOne" id=""
                                                                       placeholder="ব্যুরোর নিবন্ধন তারিখ">
                                                            </div>
                                                        </div>
                                                    </th>

                                                </tr>
                                              <!-- step one start  -->


 <!-- step three start -->

 <tr>
    <th style="text-align: center;"  rowspan="2">২.</th>

    <th style="" colspan="2">প্রস্তাবিত প্রকল্পের নাম <span style="color:red;">*</span></th>
    <th style="text-align: center;">


                <input name="ngo_prokolpo_name" value="{{ $fd7FormList->ngo_prokolpo_name }}" type="text" class="form-control" id="ngo_prokolpo_name"
                       placeholder="প্রস্তাবিত প্রকল্পের নাম" required>




        </div>
    </th>

</tr>
<tr>


    <th style="" colspan="2">প্রস্তাবিত প্রকল্পের ধরণ<span style="color:red;">*</span></th>
    <th style="text-align: center;">
        <?php
        $subjectIdList  = explode(",",$fd7FormList->subject_id);

        ?>
                <select multiple required name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                       placeholder="">
                       <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                       @foreach($projectSubjectList as $projectSubjectLists)
                       <option value="{{ $projectSubjectLists->id }}" {{ (in_array($projectSubjectLists->id,$subjectIdList)) ? 'selected' : '' }}>{{ $projectSubjectLists->name }}</option>
                       @endforeach
                </select>

    </th>

</tr>


                                                <tr>
                                                    <th style="text-align: center;" rowspan="4">৩.</th>

                                                    <td style="font-weight:bold;" colspan="3">বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ (আনুমানিক মূল্যসহ )  <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div></td>


                                                </tr>
                                                <tr>

                                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                                    <td colspan="3" rowspan="3">

                                                        <?php


        $distributionListOne = DB::table('fd_seven_distribution_details')
        ->where('type','প্রকল্প খাতের ব্যয়')
        ->where('fd7_form_id',$fd7FormList->id)->get();

        $distributionListTwo = DB::table('fd_seven_distribution_details')
        ->where('type','প্রশাসনিক ব্যয়')
        ->where('fd7_form_id',$fd7FormList->id)->get();

        //dd($distributionListTwo);


                                                            ?>

                                                        <div class="table-responsive" id="tableAjaxDatadis">

                                                            @include('front.fd7Form._partial.distributionTable')

                                                        </div>

                                                        <input type="file" accept=".pdf" name="distribution_pdf" class="form-control" id=""
                                                                   placeholder="দাতা সংস্থার বিবরণ">


                                                                   @if(empty($fd7FormList->distribution_pdf))


                                                                   @else


                                                                   <?php

                                                                   $file_path = url($fd7FormList->distribution_pdf);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif



                                                </span>


                                            </td>


                                                </tr>
                                                <tr>
                                                </tr>

                                                <tr>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step four start --->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="14">৪.</th>

                                                    <th  colspan="3">অর্থ বা ত্রাণ-সামগ্রীর উৎস</th>

                                                </tr>



                                                <tr >

                                                    <th style="text-align: center;">ক.</th>
                                                    <th>দাতা সংস্থার প্রতিশ্রুতিপত্র</th>
                                                    <td>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>১. দাতা সংস্থার বিবরণ <span style="color:red;">* </span></td>
                                                    <td>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" value="{{ $fd7FormList->donor_organization_description }}" name="donor_organization_description" class="form-control" id=""
                                                                   placeholder="দাতা সংস্থার বিবরণ">
                                                        </div>

                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>২. প্রধান নির্বাহী কর্মকর্তা/ দাতার নাম<span style="color:red;">* </span></td>
                                                    <td>

                                                        <div class="mb-3 col-lg-12">

                                                            <select name="donor_organization_chief_type" class="form-control" id="">
                                                                <option value="প্রধান নির্বাহী কর্মকর্তা" {{ 'প্রধান নির্বাহী কর্মকর্তা' == $fd7FormList->donor_organization_chief_type ? 'selected':'' }}>প্রধান নির্বাহী কর্মকর্তা</option>
                                                                <option value="দাতার নাম" {{ 'দাতার নাম' == $fd7FormList->donor_organization_chief_type ? 'selected':'' }}>দাতার নাম</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" value="{{ $fd7FormList->donor_organization_chief_name }}" name="donor_organization_chief_name" class="form-control" id=""
                                                                   placeholder="নাম">
                                                        </div>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৩. দাতা সংস্থার নাম <span style="color:red;">* </span></td>
                                                    <td>
                                                        <input type="text" value="{{ $fd7FormList->donor_organization_name }}"  name="donor_organization_name" class="form-control" id=""
                                                        placeholder="দাতা সংস্থার নাম">




                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৪. যোগাযোগের ঠিকানা <span style="color:red;">* </span></td>
                                                    <td>

                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" value="{{ $fd7FormList->donor_organization_phone }}"  name="donor_organization_address" class="form-control" id=""
                                                                   placeholder="যোগাযোগের ঠিকানা">
                                                        </div>



                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৫. টেলিফোন <span style="color:red;">* </span></td>
                                                    <td>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="number" value="{{ $fd7FormList->donor_organization_phone }}" name="donor_organization_phone" class="form-control" id=""
                                                                   placeholder="টেলিফোন">
                                                        </div>


                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৬. ইমেইল ও ওয়েবসাইট<span style="color:red;">* </span></td>
                                                    <td>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="email" value="{{ $fd7FormList->donor_organization_email }}" name="donor_organization_email" class="form-control" id=""
                                                                   placeholder="ইমেইল">
                                                        </div>
                                                        <div class="mb-3 col-lg-12">

                                                            <input type="text" value="{{ $fd7FormList->donor_organization_website }}" name="donor_organization_website" class="form-control" id=""
                                                                   placeholder="ওয়েবসাইট">
                                                        </div>

                                                    </td>

                                                </tr>


                                                <tr>
                                                    <th style="text-align: center;"> খ.</th>
                                                <th colspan="2">চলমান অন্য কোনো প্রকল্পের অর্থ দ্বারা প্রস্তাবিত কার্যক্রম বাস্তবায়নের ক্ষেত্রে </th>


                                            </tr>

<tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>১. চলমান প্রকল্পের নাম ও মোট ব্যয় <span style="color:red;">* </span></td>
                                                    <td>

                                                            <input type="text" value="{{ $fd7FormList->ongoing_prokolpo_name }}" name="ongoing_prokolpo_name" class="form-control" id=""
                                                                   placeholder="চলমান প্রকল্পের নাম">


                                                                    <input type="text" value="{{ $fd7FormList->total_prokolpo_cost }}" name="total_prokolpo_cost" class="form-control mt-2" id=""
                                                                           placeholder="মোট ব্যয়">




                                                    </td>

                                                </tr>


                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>২. ব্যুরোর অনুমোদনের তারিখ (অনুমোদনপত্র সংযুক্ত করতে হবে   <span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span>) <span style="color:red;">* </span></td>
                                                    <td>


                                                            <input type="text" value="{{ $fd7FormList->date_of_bureau_approval }}" name="date_of_bureau_approval" class="form-control datepickerOne" id=""
                                                                   placeholder="ব্যুরোর অনুমোদনের তারিখ">



                                                            <input type="file" accept=".pdf" name="bureau_approval_pdf" class="form-control mt-2" id="fd7PdfN1"
                                                                   placeholder="">

                                                                   <p id="fd7PdfN1_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                                   @if(empty($fd7FormList->bureau_approval_pdf)))

                                                                   @else
                                                                   <?php

                                                                   $file_path = url($fd7FormList->bureau_approval_pdf);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                   ?>
                                                                    <b>{{ $filename.'.'.$extension }}</b>
                                                                    @endif



                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৩. মূল প্রকল্পের শতকরা কতভাগ এই
                                                        প্রকল্পের ব্যায় করা হবে  <span style="color:red;">* </span></td>
                                                    <td>

                                                        <input type="text" value="{{ $fd7FormList->percentage_of_the_original_project }}" name="percentage_of_the_original_project" class="form-control" id=""
                                                        placeholder="মূল প্রকল্পের শতকরা কতভাগ এই প্রকল্পের ব্যায় করা হবে ">




                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৪. চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না<span style="color:red;">* </span></td>
                                                    <td>
                                                            <input type="text" value="{{ $fd7FormList->adverse_impact_on_the_ongoing_project }}" name="adverse_impact_on_the_ongoing_project" class="form-control" id=""
                                                                   placeholder="চলমান প্রকল্পের উপর কোন বিরূপ প্রভাব ফেলবে কি না">

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;"></td>
                                                    <td>৫. দাতা সংস্থার প্রতিশ্রুতিপত্র (কপি
                                                        সংযুক্ত করতে হবে)<span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></td>
                                                    <td>

                                                            <input type="file" accept=".pdf" name="letter_from_donor_agency_pdf" class="form-control" id="fd7PdfN2"
                                                                   placeholder="">

                                                                   <p id="fd7PdfN2_text" class="text-danger mt-2" style="font-size:12px;"></p>


                                                    @if(empty($fd7FormList->letter_from_donor_agency_pdf))


                                                    @else

                                                           <?php

                                                           $file_path = url($fd7FormList->letter_from_donor_agency_pdf);
                                                           $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                           $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                           ?>
                                                            <b>{{ $filename.'.'.$extension }}</b>
@endif

                                                    </td>

                                                </tr>


                                                <!-- steap four end -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="4">৫.</th>

                                                    <td style="font-weight:bold;" colspan="2">প্রকল্প এলাকা</td>
                                                    <td> <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal12" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div></td>

                                                </tr>
                                                <tr>

                                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                                    <td colspan="3" rowspan="3">

                                                        <div class="table-responsive" id="tableAjaxDatapro">

                                                          @include('front.fd7Form._partial.prokolpoAreaTable')

                                                        </div>
                                                        <span>টীকা :জেলা প্রশাসন /উপজেলা নির্বাহী অফিসার সুষ্ঠূ সমন্বয় ও সুষম বন্টনের স্বার্থে প্রকল্প এলাকা পরিবর্তন করার ক্ষমতা রাখে।</span>



                                                </span>


                                            </td>


                                                </tr>
                                                <tr>
                                                </tr>

                                                <tr>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step five start -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৬.</th>

                                                    <td style="font-weight:bold;" colspan="3">
                                                        ত্রাণ কর্যক্রম কিভাবে বাস্তবায়িত হবে তার বিবরণ দিতে হবে (এটি সুস্পষ্ট করুন যাহাতে কতৃপক্ষের জন্য তদারকি /পরীক্ষণ সহজ হয় )<span style="color:red;">* </span>
                                                        <span class="text-danger" style="font-size: 12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span>
                                                    </td>


                                                </tr>

                                                <tr>


                                                    <td colspan="3"><textarea name="relief_program_detail" class="form-control mt-1 summernote" id=""
                                                         >
                                                         {!! $fd7FormList->relief_program_detail !!}
                                                        </textarea>

                                                        <input type="file" accept=".pdf"  name="relief_program_pdf" class="form-control mt-3" id=""
                                                        placeholder="সমাপ্তির তারিখ" >

                                                        @if(empty($fd7FormList->relief_program_pdf))


                                                        @else

                                                               <?php

                                                               $file_path = url($fd7FormList->relief_program_pdf);
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
                                                    <th style="text-align: center;" rowspan="3">৭.</th>
                                                    <td></td>
                                                    <td style="font-weight:bold;">কার্যক্রমের মেয়াদকাল</td>
                                                    <td></td>

                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক.</td>
                                                    <td>  আরম্ভের তারিখ<span style="color:red;">* </span></td>
                                                    <td>

                                                            <input type="text" value="{{ $fd7FormList->ngo_prokolpo_start_date }}" name="ngo_prokolpo_start_date" class="form-control datepickerOne" id="ngo_prokolpo_start_date"
                                                                   placeholder="আরম্ভের তারিখ" required>


                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ.</td>
                                                    <td>সমাপ্তির তারিখ <span style="color:red;">*</span> </td>
                                                    <td>


                                                            <input type="text" value="{{ $fd7FormList->ngo_prokolpo_end_date }}" name="ngo_prokolpo_end_date" class="form-control datepickerOne" id=""
                                                                   placeholder="সমাপ্তির তারিখ" required>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৮.</th>

                                                    <td style="font-weight:bold;" colspan="3">
                                                        প্রকল্প বাস্তবায়ন সংক্রান্ত অন্যান্য প্রাসঙ্গিক তথ্য (ভবিষ্যত পরিকল্পনাসহ যদি থাকে)
                                                        <span style="color:red;">* </span>
                                                        <span class="text-danger" style="font-size: 12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span>
                                                    </td>


                                                </tr>

                                                <tr>


                                                    <td colspan="3">

                                                        <textarea name="relevant_information" class="form-control mt-1 summernote" id=""
                                                         >
                                                         {!! $fd7FormList->relevant_information !!}
                                                        </textarea>

                                                        <input type="file" accept=".pdf" name="relevant_information_pdf" class="form-control mt-3" id=""
                                                                   placeholder="সমাপ্তির তারিখ" >


                                                                   @if(empty($fd7FormList->relevant_information_pdf))


                                                        @else

                                                               <?php

                                                               $file_path = url($fd7FormList->relevant_information_pdf);
                                                               $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                               $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                               ?>
                                                                  <b>{{ $filename.'.'.$extension }}</b>
                                                               @endif


                                                    </td>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৯.</th>

                                                    <td style="font-weight:bold;" colspan="3">বৈদেশিক অনুদান গ্রহণ সংক্রান্ত ব্যাংকের তথ্যাদি <span style="color:red;">* </span>
                                                        <span class="text-danger" style="font-size: 12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span></td>


                                                </tr>

                                                <tr>


                                                    <td colspan="3">

                                                        <textarea name="bank_detail" class="form-control mt-1 summernote" id=""
                                                         >

                                                         {!! $fd7FormList->bank_detail !!}
                                                        </textarea>

                                                        <input type="file" accept=".pdf" name="bank_detail_pdf" class="form-control mt-3" id=""
                                                                   placeholder="সমাপ্তির তারিখ" >

                                                                   @if(empty($fd7FormList->bank_detail_pdf))


                                                                   @else

                                                                          <?php

                                                                          $file_path = url($fd7FormList->bank_detail_pdf);
                                                                          $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                                          $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                                          ?>
                                                                             <b>{{ $filename.'.'.$extension }}</b>
                                                                          @endif


                                                    </td>

                                                </tr>



                                            </table>

                                        </div>


                                        </div>
                                    </div>
                                    <!-- step one end --->

                                    <div class="mb-3 col-lg-12 mt-3">

                                        <div class="card">

                                            <div class="card-header">
                                                সংস্থা প্রধানের তথ্যাদি

                                            </div>
                                            <div class="card-body">

                                                  <!--new code for ngo-->
                                                  @include('front.include.globalSign')
                                        <!-- end new code -->

                                            </div>
                                        </div>



                                    </div>

                                    {{-- <div class="card mb-3">
                                        <div class="card-header">
                                            দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৭ ফরম
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">দুর্যোগকালীন ও দুর্যোগ পরবর্তী জরুরি ত্রাণ সহায়তা কার্যক্রম/ প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৭ ফরম আপলোড করুন <span class="text-danger">*</span><br><span class="text-danger" style="font-size: 12px;">(Maximum 10 MB)</span></label>
                                                <input type="file" accept=".pdf" required name="relief_assistance_project_proposal_pdf" class="form-control" id="rPdfP"

                                                       placeholder="">
                                                       <p id="rPdfP_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  class="btn btn-registration"
                                                >দাখিল করুন
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

    <div class="modal modal-xl fade" id="mmexampleModaleditnewemm"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
    
                        বিতরণের জন্য প্রস্তাবিত ত্রাণ সামগ্রীর বিবরণ
    
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body" id="viewDistributionEditDataAjaxForEdit">
    
                           
    
                        </div>
                    </div>
    
                </div>
    
            </div>
        </div>
    </div>

</section>
<!--modal-->
@include('front.fd7Form._partial.distributionModal')

<!-- end modal -->
<!--modal-->
@include('front.fd7Form._partial.prokolpoAreaModal')

<!-- end modal -->

@endsection

@section('script')
@include('front.fd7Form._partial.script')
@include('front.zoomButtonImage')
<script>

    ///


$(document).on('change', 'select.division_name', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);
var getMainValue = $('#division_name'+get_id_from_main).val();

 // var getMainValue = $(this).val();

  //alert(getMainValue);


  $.ajax({
    url: "{{ route('getDistrictList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#district_name"+get_id_from_main).html('');
      $("#district_name"+get_id_from_main).html(data);
    }
    });

    $.ajax({
    url: "{{ route('getUpozilaListNew') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#upozila_name"+get_id_from_main).html('');
      $("#upozila_name"+get_id_from_main).html(data);

      $("#thana_name"+get_id_from_main).html('');
      $("#thana_name"+get_id_from_main).html(data);
    }
    });




// });


$.ajax({
    url: "{{ route('getCityCorporationList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#city_corparation_name"+get_id_from_main).html('');
      $("#city_corparation_name"+get_id_from_main).html(data);
    },
    beforeSend: function(){
   $('#pageloader').show()
},
complete: function(){
   $('#pageloader').hide();
}
    });

});

    ///
$("#ngo_prokolpo_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#project_name').val(getMainValue);

});


$("#ngo_prokolpo_duration").keyup(function(){
  var getMainValue = $(this).val();

  $('#duration_of_project').val(getMainValue);

});


$("#donor_organization_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#donor_organization_name_two').val(getMainValue);

});

</script>

@include('front.include.globalScript')

@endsection
