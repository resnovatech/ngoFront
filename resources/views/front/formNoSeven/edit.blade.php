@extends('front.master.master')

@section('title')
{{ trans('formNoSeven.formNoSeven')}} | {{ trans('header.ngo_ab')}}
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
                                        <h1>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্র</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>


                            @include('flash_message')


                                    <form action="{{ route('formNoSeven.update',$formSevenData->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                    <div class="form9_upper_box">
                                        <h3>{{ trans('formNoSeven.formNoSeven')}}</h3>
                                        <h4>প্রকল্প বাস্তবায়ন সম্পর্কিত প্রত্যয়নপত্রের ছক</h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">

                                            <table class="table table-borderless">

                                                <tr>
                                                    <td>স্মারক নং: <span style="color:red;">*</span></td>
                                                    <td> <input type="text" value="{{ $formSevenData->sarok_number }}" required name="sarok_number" class="form-control" id=""
                                                        placeholder=""></td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">

                                            <table class="table table-borderless">

                                                <tr>
                                                    <td>তারিখ: <span style="color:red;">*</span></td>
                                                    <td> <input type="text" value="{{ $formSevenData->submit_date }}" required name="submit_date" class="form-control datepickerOne" id=""
                                                        placeholder=""></td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                    <!-- step one start -->

                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">


                                            <table class="table table-bordered " style="width:100%">

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                    <th style="text-align: center; width: 25%">বিবরণ</th>
                                                    <th style="text-align: center;">তথ্যাদি</th>
                                                    <th style="text-align: center;"> মন্তব্য (যদি থাকে)</th>
                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">(০১)</th>
                                                    <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                                    <th style="text-align: center;">(০৩)</th>
                                                    <th style="text-align: center;">(০৪)</th>
                                                </tr>
                                              <!-- step one start  -->
                                                <tr>
                                                    <td style="text-align: center;" rowspan="4">০১.</td>
                                                    <td style="text-align: center;">ক)</td>
                                                    <td> এনজিও'র নাম ও ঠিকানা <span style="color:red;">*</span> </td>
                                                    <td>


                                                                <input type="text" value="{{ $formSevenData->ngo_name }}" required name="ngo_name" class="form-control" id=""
                                                                       placeholder="এনজিও'র নাম">


                                                                <input type="text" required name="ngo_address" value="{{ $formSevenData->ngo_address }}" class="form-control mt-1" id=""
                                                                       placeholder="এনজিও'র ঠিকানা">

                                                    </td>
                                                    <td>


                                                            <textarea name="ngo_name_address_comment"  class="form-control" id=""
                                                                   placeholder="মন্তব্য">{{ $formSevenData->ngo_name_address_comment }}</textarea>

                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td> এনজিও প্রধানের নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস <span style="color:red;">*</span></td>
                                                    <td>


                                                        <input type="text" required value="{{ $formSevenData->ngo_head_name }}" name="ngo_head_name" class="form-control" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required value="{{ $formSevenData->ngo_head_organization }}" name="ngo_head_organization" class="form-control mt-1" id=""
                                                        placeholder="পদবি">

                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number"
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required value="{{ $formSevenData->ngo_head_office_mobile }}" name="ngo_head_office_mobile" class="form-control mt-1" id=""
                                                        placeholder="দাপ্তরিক মোবাইল নম্বর">

                                                        <input type="text" required value="{{ $formSevenData->ngo_head_office_email }}" name="ngo_head_office_email" class="form-control mt-1" id=""
                                                        placeholder="ইমেইল এড্রেস">

                                                    </td>
                                                    <td>
                                                        <textarea name="ngo_head_comment" class="form-control" id=""
                                                                   placeholder="মন্তব্য">{{ $formSevenData->ngo_head_comment }}</textarea>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>

                                                        <span>১. এনজিও'র নিবন্ধন নম্বর ও তারিখ <span style="color:red;">*</span><br>

                                                            ২. সর্বশেষ নবায়নের তারিখ ও মেয়াদকাল <span style="color:red;">*</span>
                                                    </span>

                                                </td>
                                                    <td>
                                                        <input type="text" required name="ngo_registration" value="{{ $formSevenData->ngo_registration }}" class="form-control" id=""
                                                        placeholder="নিবন্ধন নম্বর">


                                                 <input type="text" required name="ngo_registration_date" value="{{ $formSevenData->ngo_registration_date }}" class="form-control mt-1 datepickerOne" id=""
                                                        placeholder="নিবন্ধন তারিখ">

                                                        <input type="text" required name="ngo_last_renewal_date" value="{{ $formSevenData->ngo_last_renewal_date }}" class="form-control mt-1 datepickerOne" id=""
                                                        placeholder="নবায়নের তারিখ">


                                                        <input type="text" required name="ngo_duration" value="{{ $formSevenData->ngo_duration }}" class="form-control mt-1" id=""
                                                        placeholder="নবায়নের মেয়াদকাল">

                                                    </td>
                                                    <td><textarea name="ngo_reg_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->ngo_reg_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>জেলা/আঞ্চলিক  অফিসের দায়িত্বপ্রাপ্ত এনজিও কর্মকর্তার নাম, পদবি, দাপ্তরিক মোবাইল নম্বর ও ইমেইল এড্রেস <span style="color:red;">*</span></td>
                                                    <td>
                                                        <input type="text" required value="{{ $formSevenData->ngo_local_officer_name }}" name="ngo_local_officer_name" class="form-control" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required value="{{ $formSevenData->ngo_local_officer_designation }}" name="ngo_local_officer_designation" class="form-control mt-1" id=""
                                                        placeholder="পদবি">

                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number"
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required value="{{ $formSevenData->ngo_local_officer_mobile }}" name="ngo_local_officer_mobile" class="form-control mt-1" id=""
                                                        placeholder="দাপ্তরিক মোবাইল নম্বর">

                                                        <input type="text" required value="{{ $formSevenData->ngo_local_officer_email }}" name="ngo_local_officer_email" class="form-control mt-1" id=""
                                                        placeholder="ইমেইল এড্রেস">
                                                    </td>
                                                    <td>
                                                        <textarea name="ngo_local_officer_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->ngo_local_officer_comment }}</textarea>
                                                    </td>
                                                </tr>
                                                <!-- step one end -->

                                                <!-- step two strat --->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="7">০২.</td>
                                                    <td></td>
                                                    <td style="font-weight:bold;">প্রকল্প সংক্রান্ত তথ্য</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক)</td>
                                                    <td><span>১. প্রকল্পের নাম<span style="color:red;">*</span> <br>

                                                        ২.  মেয়াদকাল<span style="color:red;">*</span> <br>
                                                        ৩.  টাকার পরিমাণ <span style="color:red;">*</span>
                                                </span></td>
                                                    <td>
                                                        <input type="text" required value="{{ $formSevenData->prokolpo_name }}" name="prokolpo_name" class="form-control" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required value="{{ $formSevenData->prokolpo_duration }}" name="prokolpo_duration" class="form-control mt-1" id=""
                                                        placeholder="মেয়াদকাল">

                                                        <input type="text" required value="{{ $formSevenData->prokolpo_fund }}" name="prokolpo_fund" class="form-control mt-1" id=""
                                                        placeholder="টাকার পরিমাণ">
                                                    </td>
                                                    <td><textarea name="prokolpo_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->prokolpo_comment }}</textarea></td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td>প্রকল্প অনুমোদনের তারিখ ও স্মারক নম্বর, প্রত্যয়নপত্র প্রদানের বছর / সময় <span style="color:red;">*</span> </td>
                                                    <td> <input type="text" value="{{ $formSevenData->prokolpo_approval_date }}" required name="prokolpo_approval_date" class="form-control datepickerOne" id=""
                                                        placeholder="তারিখ">


                                                 <input type="text" required  value="{{ $formSevenData->prokolpo_sarok_number }}"name="prokolpo_sarok_number" class="form-control mt-1" id=""
                                                        placeholder="স্মারক নম্বর">

                                                        <input type="text" value="{{ $formSevenData->prokolpo_certificate_year_and_time }}" required name="prokolpo_certificate_year_and_time" class="form-control mt-1" id=""
                                                        placeholder="প্রত্যয়নপত্র প্রদানের বছর / সময়"></td>
                                                    <td><textarea name="prokolpo_approval_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->prokolpo_approval_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>প্রকল্পের উদ্দেশ্য <span style="color:red;">*</span></td>
                                                    <td><textarea required name="prokolpo_objecttive" class="form-control" id=""
                                                        placeholder="প্রকল্পের উদ্দেশ্য">{{ $formSevenData->prokolpo_objecttive }}</textarea></td>
                                                    <td><textarea name="prokolpo_objecttive_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->prokolpo_objecttive_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>জেলা/উপজেলায় ব্যুরো কতৃক অনুমোদিত প্রকল্পের কপি স্থানীয় প্রশাসন কতৃক গ্রহণের তারিখ <span style="color:red;">*</span></td>
                                                    <td><input type="text" required value="{{ $formSevenData->project_copy_approved_by_burea }}" name="project_copy_approved_by_burea" class="form-control datepickerOne" id=""
                                                        placeholder="তারিখ"></td>
                                                    <td><textarea name="project_copy_approved_by_burea_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->project_copy_approved_by_burea_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঙ)</td>
                                                    <td style="font-weight:bold;">তার এখতিয়ারাধীন এলাকার সংশ্লিষ্ট তথ্য <span style="color:red;">*</span></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td></td>
                                                    <td><span>১. তাঁর জেলা/উপজেলায় প্রকল্পের জন্য বরাদ্দ <span style="color:red;">*</span><br>

                                                        ২.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে বরাদ্দ <span style="color:red;">*</span><br>
                                                        ৩.  বহুবর্ষী প্রকল্পের ক্ষেত্রে আলোচ্য বর্ষে প্রকৃত ব্যয় <span style="color:red;">*</span><br>
                                                        ৪. প্রকল্পে উপকারভোগীর সংখ্যা <span style="color:red;">*</span><br>
                                                        <span style="padding-left: 10px;">ক. প্রত্যক্ষ উপকারভোগীর সংখ্যা <br>
                                                            <span style="padding-left: 10px;">খ. পরোক্ষ উপকারভোগীর সংখ্যা(প্রযোজ্য ক্ষেত্রে)</span>
                                                        </span>

                                                </span></td>
                                                    <td>

                                                        <input type="text" value="{{ $formSevenData->allocation_for_projects_in_district_or_upazila }}" required name="allocation_for_projects_in_district_or_upazila" class="form-control" id=""
                                                        placeholder="প্রকল্পের জন্য বরাদ্দ">


                                                 <input type="text" required value="{{ $formSevenData->this_year_under_discussion_multi_year_projects }}" name="this_year_under_discussion_multi_year_projects" class="form-control mt-1" id=""
                                                        placeholder="আলোচ্য বর্ষে বরাদ্দ">

                                                        <input type="text" value="{{ $formSevenData->actual_expenditure_multi_year_projects }}" required name="actual_expenditure_multi_year_projects" class="form-control mt-1" id=""
                                                        placeholder="আলোচ্য বর্ষে প্রকৃত ব্যয়">

                                                        <input type="text" value="{{ $formSevenData->direct_beneficiaries_quantity }}" required name="direct_beneficiaries_quantity" class="form-control mt-1" id=""
                                                        placeholder="প্রত্যক্ষ উপকারভোগীর সংখ্যা">

                                                        <input type="text" value="{{ $formSevenData->indirect_beneficiaries_quantity }}" required name="indirect_beneficiaries_quantity" class="form-control mt-1" id=""
                                                        placeholder="পরোক্ষ উপকারভোগীর সংখ্যা">

                                                    </td>
                                                    <td><textarea name="jurisdiction_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->jurisdiction_comment }}</textarea></td>
                                                </tr>



                                                <!-- step two end --->

                                                <!-- step three start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="5">০৩.</td>
                                                    <td></td>
                                                    <td style="font-weight:bold;">জেলা প্রশাসন/উপজেলা প্রশাসন সংক্রান্ত</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">ক)</td>
                                                    <td><span>১. স্থানীয় প্রশাসন কতৃক কত বার প্রকল্পটি পরিদর্শন করা হয়েছে <span style="color:red;">*</span> <br>

                                                        ২.  পরিদর্শনকারী কর্মকর্তার নাম, পদবি, মোবাইল নম্বর ও ইমেইল এড্রেস <span style="color:red;">*</span>
                                                </span></td>
                                                    <td>

                                                        <input type="text" required value="{{ $formSevenData->project_inspected_time }}" name="project_inspected_time" class="form-control" id=""
                                                        placeholder="প্রকল্পটি পরিদর্শন করা হয়েছে">


                                                        <input type="text" required value="{{ $formSevenData->inspector_name }}" name="inspector_name" class="form-control mt-1" id=""
                                                        placeholder="নাম">


                                                 <input type="text" required value="{{ $formSevenData->inspector_designation }}" name="inspector_designation" class="form-control mt-1" id=""
                                                        placeholder="পদবি">

                                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number"
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required value="{{ $formSevenData->inspector_mobile }}" name="inspector_mobile" class="form-control mt-1" id=""
                                                        placeholder="মোবাইল নম্বর">

                                                        <input type="text" required value="{{ $formSevenData->inspector_email }}" name="inspector_email" class="form-control mt-1" id=""
                                                        placeholder="ইমেইল এড্রেস">



                                                    </td>
                                                    <td>
                                                        <textarea name="inspector_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->inspector_comment }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ)</td>
                                                    <td>উপকারভোগী নির্বাচনে স্থানীয় প্রশাসনকে সম্পৃক্ত করা হয়েছে কিনা, হয়ে থাকলে তার সংক্ষিপ্ত বিবরণী <span style="color:red;">*</span></td>
                                                    <td><textarea required name="beneficiaries_involved_with_local_administration" class="form-control" id=""
                                                        placeholder="সংক্ষিপ্ত বিবরণী">{{ $formSevenData->beneficiaries_involved_with_local_administration }}</textarea></td>
                                                    <td><textarea name="beneficiaries_involved_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->beneficiaries_involved_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">গ)</td>
                                                    <td>এনজিও প্রতিনিধি জেলা/উপজেলায় এনজিও বিষয়ক সমন্বয় সভায় নিয়মিত অংশগ্রহণ করেন কিনা <span style="color:red;">*</span></td>
                                                    <td><input type="text" required value="{{ $formSevenData->regular_participation_in_meeting }}" name="regular_participation_in_meeting" class="form-control mt-1" id=""
                                                        placeholder="অংশগ্রহণ করেন কিনা"></td>
                                                    <td><textarea name="regular_participation_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->regular_participation_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ঘ)</td>
                                                    <td>এনজিও বিষয়ক ব্যুরোর অনুমোদন পত্রের শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা <span style="color:red;">*</span></td>
                                                    <td><input type="text" required  value="{{ $formSevenData->conditions_properly_met }}" name="conditions_properly_met" class="form-control mt-1" id=""
                                                        placeholder="শর্তাদি যথাযথভাবে প্রতিপালিত হয়েছে কিনা"></td>
                                                    <td><textarea name="conditions_properly_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->conditions_properly_comment }}</textarea></td>
                                                </tr>

                                                <!-- step three end -->

                                                <!-- step four start --->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৪.</td>
                                                    <td></td>
                                                    <td>পার্টনার এনজিও হলে মূল এনজিও বিষয়ক তথ্যাদি (প্রযোজ্য ক্ষেত্রে)</td>
                                                    <td><textarea name="mian_ngo_detail" class="form-control" id=""
                                                        placeholder="তথ্যাদি (প্রযোজ্য ক্ষেত্রে">{{ $formSevenData->mian_ngo_detail }}</textarea></td>
                                                    <td><textarea name="main_ngo_detail_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->main_ngo_detail_comment }}</textarea></td>
                                                </tr>

                                                <tr>

                                                    <td></td>
                                                    <td>মূল এনজিও'র নাম ও ঠিকানা</td>
                                                    <td>
                                                        <input type="text" value="{{ $formSevenData->main_ngo_name }}" required name="main_ngo_name" class="form-control mt-1" id=""
                                                        placeholder="নাম">


                                                 <input type="text" value="{{ $formSevenData->main_ngo_address }}" required name="main_ngo_address" class="form-control mt-1" id=""
                                                        placeholder="ঠিকানা">

                                                    </td>
                                                    <td><textarea name="main_ngo_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->main_ngo_comment }}</textarea></td>
                                                </tr>


                                                <!-- steap four end -->

                                                <!-- step five start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৫.</td>
                                                    <td></td>
                                                    <td style="font-weight:bold;">প্রকল্পের অর্জিত লক্ষ্যমাত্রা বিষয়ক</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক)</td>
                                                    <td>প্রকল্প সমাপনী প্রতিবেদন /বার্ষিক প্রতিবেদনে জেলা প্রশাসক/উপজেলা নির্বাহী অফিসারের প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা <span style="color:red;">*</span></td>
                                                    <td><input type="text" required value="{{ $formSevenData->sign_in_closing_report }}" name="sign_in_closing_report" class="form-control mt-1" id=""
                                                        placeholder="প্রতিস্বাক্ষর গ্রহণ করা হয়েছে কিনা"></td>
                                                    <td><textarea name="sign_in_closing_report_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->sign_in_closing_report_comment }}</textarea></td>
                                                </tr>

                                                <!-- step five end --->

                                                <!-- step six start -->

                                                <tr>
                                                    <td style="text-align: center;" rowspan="2">০৬.</td>
                                                    <td></td>
                                                    <td>
                                                        <span>১. বাস্তবায়িত প্রকল্প সম্পর্কে মতামত <span style="color:red;">*</span><br>

                                                            ২.  বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ (প্রত্যয়নকারী কর্মকর্তার স্বহস্তে লিখা কাম্য) <span style="color:red;">*</span>
                                                    </span>
                                                    </td>
                                                    <td>

                                                        <textarea required name="feedback_on_projects_implementedt" class="form-control" id=""
                                                        placeholder="বাস্তবায়িত প্রকল্প সম্পর্কে মতামত">{{ $formSevenData->feedback_on_projects_implementedt }}</textarea>


                                                        <textarea required name="recommendation_on_projects_implementedt" class="form-control mt-1" id=""
                                                        placeholder="বাস্তবায়িত প্রকল্প সম্পর্কে সুপারিশ">{{ $formSevenData->recommendation_on_projects_implementedt }}</textarea>


                                                    </td>
                                                    <td><textarea name="last_comment" class="form-control" id=""
                                                        placeholder="মন্তব্য">{{ $formSevenData->last_comment }}</textarea></td>
                                                </tr>

                                                <!-- step six end -->

                                            </table>




                                        </div>
                                    </div>
                                    <!-- step one end --->

                                     <!-- step five start -->


                                     <div class="row mt-2">
                                        <div class="col-lg-12 col-sm-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <center>অন্যান্য তথ্য</center>
                                                </div>

                                                <div class="card-body">

                                                    <div class="row mt-2">

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">জেলা<span style="color:red;">*</span></label>
                                                            <select required name="district_address" class="form-control district_name" id="district_id">

                                                                <option value="">--- নির্বাচন করুন ---</option>

                                                                @foreach($districtList as $districtLists)

                                                                <option value="{{ $districtLists->district_bn }}" {{ $districtLists->district_bn == $formSevenData->district_address ? 'selected':'' }}>{{ $districtLists->district_bn }}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label for="" class="form-label">উপজেলা<span style="color:red;">*</span></label>
                                                            <select required name="upazila_address" class="form-control" id="upazila_id">
                                                                <option value="">--- নির্বাচন করুন ---</option>

                                                                @foreach($thanaList as $districtLists)

                                                                <option value="{{ $districtLists->thana_bn }}" {{ $districtLists->thana_bn == $formSevenData->upazila_address ? 'selected':'' }}>{{ $districtLists->thana_bn }}</option>

                                                                @endforeach

                                                            </select>
                                                        </div>



                                                        <div class="mb-3 col-lg-12">
                                                            <label for="" class="form-label">অনুলিপি</label>
                                                            <textarea name="onulipi" class="form-control" id=""
                                                                   placeholder="">{{ $formSevenData->onulipi }}</textarea>
                                                        </div>

                                                    </div>

                                                    <div class="row mt-3">

                                                        <div class="col-lg-6">
                                                            <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার নাম <span style="color:red;">*</span></label>
                                                            <input type="text" readonly required name="name_certifying_officer" value="{{$chiefNameGlobal}}" class="form-control" id=""
                                                                   placeholder="">

                                                        </div>

                                                        <div class="col-lg-6">
                                                            <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার পদবি<span style="color:red;">*</span></label>
                                                            <input type="text" readonly required name="designation_certifying_officer" value="{{$chiefDesignationGlobal}}" class="form-control" id=""
                                                                   placeholder="">

                                                        </div>


                                                        <div class="col-lg-12 mt-3">
                                                     <div class="mb-3">
                                                        <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার {{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                                   
                                                            <input type="hidden" value="{{ $chiefSignatureGlobal }}" name="image_base64">
                                                            <div class="croppedInput mt-2">
                                                                <img src="{{asset('/')}}{{ $chiefSignatureGlobal }}" style="width: 200px;" class="show-image">
                                                            </div>
                                                        <!-- new code for image cropper start --->
                                                        @include('front.signature_modal.sign_main_modal')
                                                        <!-- new code for image cropper end -->

                                                    </div>




                                                    <div class="mb-3">
                                                        <label for="" class="form-label">প্রত্যয়নকারি কর্মকর্তার {{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                                       

                                                            <input type="hidden" value="{{ $chiefSealGlobal }}"  name="image_seal_base64">
                                                            <div class="croppedInputss mt-2">
                                                                <img src="{{asset('/')}}{{ $chiefSealGlobal }}" style="width: 200px;" class="show-image">
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

                                        </div>
                                    </div>


                                    <!-- step five end -->



                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" class="btn btn-registration"
                                                >জমা দিন
                                        </button>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>

</section>


@endsection

@section('script')

@include('front.zoomButtonImage')

<script>

$(document).on('change', 'select.district_name', function () {

var districtName = $(this).val();


  $.ajax({
    url: "{{ route('getDistrictListForFormSeven') }}",
    method: 'GET',
    data: {districtName:districtName},
    success: function(data) {
      $("#upazila_id").html('');
      $("#upazila_id").html(data);
    },

    beforeSend: function(){
       $('#pageloader').show()
   },
  complete: function(){
       $('#pageloader').hide();
  }

    });


});



</script>

@endsection
