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

                                        <form method="post" action="{{ route('fdNineForm.update',$fdNineData->id) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                            @csrf
                                            @method('PUT')

                                             <div class="row">
                                                <div class="col-lg-12 col-sm-12">


                                                    <table class="table table-bordered" style="width:100%">

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">ক্র: নং:</th>
                                                            <th style="text-align: center; width: 25%">বিবরণ</th>
                                                            <th style="text-align: center;" >তথ্যাদি</th>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">(০১)</th>
                                                            <th>বিদেশী নাগরিকের তথ্য <span style="text-align: center;">(০২)</span></th>
                                                            <th style="text-align: center;" >(০৩)</th>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" rowspan="3" colspan="2">১.</th>
                                                            <td >বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ) <span style="color:red;">*</span>:</td>
                                                            <th style="text-align: center;" >

                                                                    <input type="text" class="form-control" id="" value="{{ $fdNineData->fd9_foreigner_name }}"
                                                                           placeholder="বিদেশি নাগরিকের নাম (ইংরেজীতে Capital Letter এ)" name="fd9_foreigner_name" style="text-transform: uppercase" value="" required>


                                                            </th>

                                                        </tr>
                                                        <tr>
                                                            <td>বিদেশি নাগরিকের পাসপোর্ট সাইজের ছবি <span
                                                                class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 200 KB & Image Format:PNG)</span></td>
                                                            <th colspan="2">

                                                                    <input type="file" class="form-control" id="fdNinePdf6"
                                                                           placeholder="" accept="image/png" name="fd9_foreigner_passport_size_photo" >

                                                                           <p id="fdNinePdf6_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                                           <img src="{{ asset('/') }}{{ $fdNineData->fd9_foreigner_passport_size_photo }}" alt="" style="height:40px;" id="output">

                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>পাসপোর্টের কপি সংযুক্ত<span
                                                                class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></td>
                                                            <th colspan="2">





                                                                        <input type="file" accept=".pdf" class="form-control" id="fdNinePdf7"
                                                                        placeholder=""  name="fd9_copy_of_passport" >
                                                                        <p id="fdNinePdf7_text" class="text-loght mt-2" style="font-size:12px;"></p>

                                                                        @if(!$fdNineData->fd9_copy_of_passport)

                                                                        @else
                                                                        <?php
                                                            
                                                                        $file_path = url($fdNineData->fd9_copy_of_passport);
                                                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                                            
                                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                            
                                                            
                                                            
                                                            
                                                                        ?>
                                                                        {{ $filename.'.'.$extension }}
                                                                        @endif

                                                            </th>
                                                        </tr>
                                                      <!-- step one start  -->



                                                        <!-- step two strat --->

                                                        <tr>
                                                            <th style="text-align: center;" rowspan="4">২.</th>

                                                            {{-- <td style="font-weight:bold;" colspan="2"></td>
                                                            <td></td> --}}

                                                        </tr>

                                                        <tr>

                                                            <td style="text-align: center;">ক.</td>
                                                            <td> পিতার নাম<span style="color:red;">* </span></td>
                                                            <td>



                                                                    <input type="text" value="{{ $fdNineData->fd9_father_name }}" class="form-control" name="fd9_father_name" id=""
                                                                           placeholder="পিতার নাম" required>




                                                            </td>

                                                        </tr>
                                                        <tr>

                                                            <td style="text-align: center;">খ.</td>
                                                            <td>স্বামী/স্ত্রীর নাম <span style="color:red;">*</span> </td>
                                                            <td>

                                                                    <input type="text" class="form-control" value="{{ $fdNineData->fd9_husband_or_wife_name }}" name="fd9_husband_or_wife_name" id=""
                                                                           placeholder="স্বামী/স্ত্রীর নাম" required>




                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td style="text-align: center;">গ.</td>
                                                            <td>মাতার নাম<span style="color:red;">*</span> </td>
                                                            <td>


                                                                    <input type="text" value="{{ $fdNineData->fd9_mother_name }}" class="form-control" name="fd9_mother_name" id=""
                                                                           placeholder="মাতার নাম" required>



                                                        </td>

                                                        </tr>





                                                        <!-- step two end --->

                                                        <!-- step three start -->

                                                        <tr>
                                                            <th style="text-align: center;"colspan="2" >৩.</th>
                                                            <td style="" >জন্ম স্থান ও জন্ম তারিখ<span style="color:red;">*</span></td>

                                                              <td>

                                                                    <input type="text" class="form-control" id=""
                                                                           placeholder="জন্ম স্থান" value="{{ $fdNineData->fd9_birth_place }}" name="fd9_birth_place" value="" required>


                                                                    <input type="text" class="form-control datepickerOne mt-2"  id=""
                                                                           placeholder="জন্ম তারিখ" value="{{ $fdNineData->fd9_dob }}" name="fd9_dob" value="" required>

                                                              </td>
                                                        </tr>

                                                      <!-- step one start  -->

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৪.</th>

                                                            <td>পাসপোর্ট নম্বর, ইস্যু ও মেয়াদউত্তীর্ণের তারিখ</td>
                                                            <td>



                                                                    <input type="text" class="form-control" id=""
                                                                           placeholder="পাসপোর্ট নম্বর" value="{{ $fdNineData->fd9_passport_number }}" name="fd9_passport_number"  required>


                                                                    <input type="text" class="form-control datepickerOne mt-2" id=""
                                                                           placeholder="পাসপোর্ট ইস্যু তারিখ" value="{{ $fdNineData->fd9_passport_issue_date }}" name="fd9_passport_issue_date" required>


                                                                    <input type="text" class="form-control datepickerOne mt-2"  value="{{ $fdNineData->fd9_passport_expiration_date }}" name="fd9_passport_expiration_date" id=""
                                                                           placeholder="পাসপোর্ট মেয়াদউত্তীর্ণের তারিখ" required>

                                                            </td>
                                                        </tr>


                                                        <!-- step three end -->

                                                        <!-- step four start --->

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৫.</th>

                                                            <td style=""> পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন<span class="text-danger">*</span></td>
                                                            <td>

                                                                    <input type="text" class="form-control" id="" value="{{ $fdNineData->fd9_identification_mark_given_in_passport }}"
                                                                           placeholder="পাসপোর্টে প্রদত্ত সনাক্তকারী চিহ্ন" name="fd9_identification_mark_given_in_passport" required>

                                                            </td>

                                                        </tr>




                                                        <!-- steap four end -->

                                                        <!-- step five start -->

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৬.</th>

                                                            <td >পুরুষ/মহিলা<span class="text-danger">*</span></td>
                                                            <td>
                                                                <select name="fd9_male_or_female" class="form-control" id="" required>
                                                                    <option value="পুরুষ" {{ $fdNineData->fd9_male_or_female == 'পুরুষ' ? 'selected': ''}}>পুরুষ</option>
            <option value="মহিলা" {{ $fdNineData->fd9_male_or_female == 'মহিলা' ? 'selected': ''}}>মহিলা</option>
                                                                </select>
                                                          </td>

                                                        </tr>



                                                        <!-- step five end --->

                                                        <!-- step six start -->

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৭.</th>
                                                            <td>বৈবাহিক অবস্থা<span class="text-danger">*</span></td>
                                                            <td style="font-weight:bold;">
                                                                <input type="text" class="form-control" id=""
                                                                placeholder="বৈবাহিক অবস্থা" name="fd9_marital_status" value="{{ $fdNineData->fd9_marital_status }}" required>

                                                        </td>


                                                        </tr>



                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৮.</th>

                                                            <td style="">জাতীয়তা / নাগরিকত্ব<span
                                                                class="text-danger">*</span></td>
                                                            <td>


                                                                        <input type="text" class="form-control" id=""
                                                                    placeholder="জাতীয়তা / নাগরিকত্ব" value="{{ $fdNineData->fd9_nationality_or_citizenship }}" name="fd9_nationality_or_citizenship" value="" required>



                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৯.</th>

                                                            <td style="">একাধিক নাগরিকত্ব থাকলে বিবরণ</td>
                                                            <td>

                                                                    <textarea  name="fd9_details_if_multiple_citizenships" id="" cols="30" rows="4" class="form-control summernote">{{ $fdNineData->fd9_details_if_multiple_citizenships }}</textarea>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">১০.</th>

                                                            <td style="">পূর্বের নাগরিকত্ব থাকলে তা বহাল না থাকার কারণ<span
                                                                class="text-danger">*</span></td>
                                                            <td>


                                                                    <textarea  name="fd9_previous_citizenship_is_grounds_for_non_retention" id="" cols="30" rows="4" class="form-control summernote">{{ $fdNineData->fd9_previous_citizenship_is_grounds_for_non_retention }}</textarea>




                                                            </td>

                                                        </tr>


                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">১১.</th>

                                                            <td style="">বর্তমান ঠিকানা<span
                                                                class="text-danger">*</span></td>
                                                            <td>



                                                                    <input type="text" class="form-control" id=""
                                                                           placeholder="বর্তমান ঠিকানা" name="fd9_current_address" value="{{ $fdNineData->fd9_current_address }}" required>


                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">১২.</th>

                                                            <td style="">পরিবারের সদস্য সংখ্যা<span
                                                                class="text-danger">*</span></td>
                                                            <td>


                                                                    <input type="text" class="form-control" id=""
                                                                           placeholder="পরিবারের সদস্য সংখ্যা" value="{{ $fdNineData->fd9_number_of_family_members }}" name="fd9_number_of_family_members" required>





                                                            </td>

                                                        </tr>
                                                        <?php
                                                        $familyData = $fdNineData->fd9ForeignerEmployeeFamilyMemberList;
                                                     
                                                        //dd($familyData);
                                                         ?>
                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">১৩.</th>

                                                            <td style="" colspan="2">পরিবারের সদসাদের নাম ও বয়স (যাহারা তার সাথে থাকবেন):<span
                                                                class="text-danger">*</span></td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                @if(count($familyData) == 0)
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
                                                                @else

                                                                <table class="table table-light" id="dynamicAddRemove">
                                                                    <tr>
                                                                        <th>নাম</th>
                                                                        <th>বয়স</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    @foreach($familyData as $key=>$allFamilyData)
                                                        
                                                                    @if($key==0)
                                                                    <tr>
                                                                        <td>
                                                                            <input type="text" value="{{ $allFamilyData->family_member_name }}" name="family_member_name[]"
                                                                                   class="form-control" required/>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="{{ $allFamilyData->family_member_age }}" name="family_member_age[]"
                                                                                   class="form-control" required/>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                    @else
                                                        
                                                                    <tr  id="divnewf{{$key+70000}}">
                                                                        <td>
                                                                            <input type="text" value="{{ $allFamilyData->family_member_name }}" name="family_member_name[]"
                                                                                   class="form-control" required/>
                                                                        </td>
                                                                        <td>
                                                                            <input type="text" value="{{ $allFamilyData->family_member_age }}" name="family_member_age[]"
                                                                                   class="form-control" required/>
                                                                        </td>
                                                                        <td><button type="button" data-midf="{{$key+70000}}" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td>
                                                                    </tr>
                                                        
                                                                    @endif
                                                                    @endforeach
                                                                </table>

                                                                @endif
                                                                <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">নতুন সদস্য যোগ করুন
                                                                </button>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">১৪.</th>

                                                            <td style="" colspan="2">একাডেমিক যোগ্যতা(একাডেমিক যোগ্যতার সমর্থনে সনদপত্রের কপি সংযুক্ত করতে হবে)
                                                                <span
                                                            class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span></td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">

                                                                        <input type="text" placeholder="একাডেমিক যোগ্যতা" value="{{ $fdNineData->fd9_academic_qualification_des }}" required name="fd9_academic_qualification_des" id="" class="form-control"/>

                                                                        <input type="file" accept=".pdf"  class="form-control mt-2" id="fdNinePdf1"
                                                                        placeholder=""  name="fd9_academic_qualification">
                                                                        @if(!$fdNineData->fd9_academic_qualification)

                                                                        @else
                                                                        <?php
                                                
                                                                        $file_path = url($fdNineData->fd9_academic_qualification);
                                                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                                
                                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                
                                                
                                                
                                                
                                                                        ?>
                                                                        {{ $filename.'.'.$extension }}
                                                                        @endif
                                                                        <p id="fdNinePdf1_text" class="text-danger mt-2" style="font-size:12px;"></p>


                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">১৫.</th>

                                                            <td style="" colspan="2">
                                                                কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে (প্রাসঙ্গিক সনদপত্রের কপি সংযুক্ত করতে হবে)<span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">


                                                                                            <input type="text" value="{{ $fdNineData->fd9_technical_and_other_qualifications_if_any_des }}" placeholder="কারিগরি ও অন্যান্য যোগ্যতা যদি থাকে"  name="fd9_technical_and_other_qualifications_if_any_des" id="" class="form-control"/>



                                                                                            <input type="file" accept=".pdf"  class="form-control mt-2" id="fdNinePdf2"
                                                                                   placeholder=""  name="fd9_technical_and_other_qualifications_if_any">
                                                                                   @if(!$fdNineData->fd9_technical_and_other_qualifications_if_any)

                                                                                   @else
                                                                                   <?php
                                                                    
                                                                                   $file_path = url($fdNineData->fd9_technical_and_other_qualifications_if_any);
                                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                                                    
                                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                                    
                                                                    
                                                                    
                                                                    
                                                                                   ?>
                                                                                   {{ $filename.'.'.$extension }}
                                                                                   @endif
                                                                                   <p id="fdNinePdf2_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">১৬.</th>

                                                            <td style="" colspan="2">
                                                                অতীত অভিজ্ঞতা এবং যে কাজে তাঁকে নিয়োগ দেয়া হচ্ছে তাতে তার দক্ষতা (প্রমাণকসহ)<span
                class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">

                                                                        <input type="text" value="{{ $fdNineData->fd9_past_experience_des }}" placeholder="অতীত অভিজ্ঞতা এবং নিয়োগপ্রাপ্ত কাজে দক্ষতা" required name="fd9_past_experience_des" id="" class="form-control"/>

                                                                        <input type="file" accept=".pdf"   class="form-control mt-2" id="fdNinePdf3"
                                                                        placeholder="" name="fd9_past_experience">
                                                                        @if(!$fdNineData->fd9_past_experience)

                                                                        @else
                                                                        <?php
                                                
                                                                        $file_path = url($fdNineData->fd9_past_experience);
                                                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                                
                                                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                                
                                                
                                                
                                                
                                                                        ?>
                                                                        {{ $filename.'.'.$extension }}
                                                                        @endif
                                                                        <p id="fdNinePdf3_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">১৭.</th>

                                                            <td style="">
                                                                যে সব দেশ ভ্রমণ করেছেন (কর্মসংস্থানের জন্য)<span class="text-danger">*</span>
                                                            </td>

<td>  <?php

    $countryList = DB::table('countries')->orderBy('id','asc')->get();
    $convert_new_ass_cat  = explode(",",$fdNineData->fd9_countries_that_have_traveled);
    ?>

                    <select class="js-example-basic-multiple form-control"  name="fd9_countries_that_have_traveled[]"
                    multiple="multiple">
                    <option value="">{{ trans('civil.select')}}</option>
                    @foreach($countryList as $allGetCityzenshipData)

                    <option value="{{ $allGetCityzenshipData->country_name_bangla }}" {{ (in_array($allGetCityzenshipData->country_name_bangla,$convert_new_ass_cat)) ? 'selected' : '' }}>{{ $allGetCityzenshipData->country_name_bangla }}</option>

                @endforeach

            </select></td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" rowspan="4">১৮.</th>

                                                            <td  colspan="3"> যে পদের জন্য নিয়োগ প্রস্তাব দেয়া হয়েছে : (নিয়োগপত্র ও চুক্তিপত্র কপি সংযুক্ত করতে হবে)</td>


                                                        </tr>

                                                        <tr>


                                                            <td colspan="2"> পদের নাম <span style="color:red;">* </span></td>
                                                            <td>

                                                                <input type="text" placeholder="পদের নাম" value="{{ $fdNineData->fd9_offered_post_name }}"  name="fd9_offered_post_name" id="" class="form-control" required/>


                                                            </td>

                                                        </tr>
                                                        <tr>


                                                            <td colspan="2">নিয়োগপত্র<span
                                                                class="text-danger">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span> </td>
                                                            <td>

                                                                <input type="file" accept=".pdf"   class="form-control" id="fdNinePdf4"
                                                                       placeholder="" name="fd9_offered_post_niyog">
                                                                       @if(!$fdNineData->fd9_offered_post_niyog)

                                                                       @else
                                                                       <?php
                                        
                                                                       $file_path = url($fdNineData->fd9_offered_post_niyog);
                                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                        
                                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                        
                                        
                                        
                                        
                                                                       ?>
                                                                       {{ $filename.'.'.$extension }}
                                                                       @endif
                                                                       <p id="fdNinePdf4_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td colspan="2">চুক্তিপত্র <span style="color:red;">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 1 MB)</span> </td>
                                                            <td>
                                                            <input type="file" accept=".pdf"   class="form-control" id="fdNinePdf55"
                                                                   placeholder="" name="fd9_offered_post">
                                                                   @if(!$fdNineData->fd9_offered_post)

                                                                   @else
                                                                   <?php
                                    
                                                                   $file_path = url($fdNineData->fd9_offered_post);
                                                                   $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                    
                                                                   $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                    
                                    
                                    
                                    
                                                                   ?>
                                                                   {{ $filename.'.'.$extension }}
                                                                   @endif
                                                                   <p id="fdNinePdf55_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                        </td>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">১৯.</th>

                                                            <td style="" colspan="2">
                                                                যে প্রকল্পে তাকে নিয়োগের প্রস্থাব করা হয়েছে তার নাম ও মেয়াদ ব্যুরোর অনুমোদন পত্র সংযুক্ত করতে হবে)<span
                                                                class="text-danger">*</span><span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span></span>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">

                                                                                            <input placeholder="প্রকল্পের নাম" value="{{ $fdNineData->fd9_name_of_proposed_project_name }}" type="text" required name="fd9_name_of_proposed_project_name" id="" class="form-control"/>



                                                                    <input type="text" placeholder="প্রকল্পের মেয়াদ" value="{{ $fdNineData->fd9_name_of_proposed_project_duration }}" required name="fd9_name_of_proposed_project_duration" id="" class="form-control mt-2"/>



                                                                    <input type="file" accept=".pdf"   class="form-control mt-2" id="fdNinePdf5"
                                                                    placeholder="" name="fd9_name_of_proposed_project">
                                                                    @if(!$fdNineData->fd9_name_of_proposed_project)

                                                                    @else
                                                                    <?php
                                            
                                                                    $file_path = url($fdNineData->fd9_name_of_proposed_project);
                                                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);
                                            
                                                                    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
                                            
                                            
                                            
                                            
                                                                    ?>
                                                                    {{ $filename.'.'.$extension }}
                                                                    @endif
                                                                    <p id="fdNinePdf5_text" class="text-danger mt-2" style="font-size:12px;"></p>



                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">২০.</th>

                                                            <td style="" colspan="2">
                                                                নিয়োগের যে তারিখ নির্ধারণ করা হয়েছে: (কে) নতুন (খ) প্রতিস্থাপিত (গ) এক্সটেনশন (খ) চলমান<span
            class="text-danger">*</span>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">



                                                                    <input type="text" class="form-control datepickerOne" id=""
                                                                    placeholder="তারিখ" value={{ $fdNineData->fd9_extension_date_new }} name="fd9_extension_date_new" required>



                                                                    <select name="fd9_date_of_appointment" class="form-control mt-2" id="" required>
                                                                        <option value="নতুন" {{ $fdNineData->fd9_date_of_appointment == 'নতুন' ? 'selected':'' }}>নতুন</option>
                                                                        <option value="প্রতিস্থাপিত" {{ $fdNineData->fd9_date_of_appointment == 'প্রতিস্থাপিত' ? 'selected':'' }}>প্রতিস্থাপিত</option>
                                                                        <option value="এক্সটেনশন" {{ $fdNineData->fd9_date_of_appointment == 'এক্সটেনশন' ? 'selected':'' }}>এক্সটেনশন</option>
                                                                        <option value="চলমান" {{ $fdNineData->fd9_date_of_appointment == 'চলমান' ? 'selected':'' }}>চলমান</option>
                                                                    </select>




                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">২১.</th>

                                                            <td style="">এক্সটেনশন হয়ে থাকলে তার সময়কাল<span
                                                                class="text-danger">*</span></td>
                                                            <td>
                                                                <input type="text" class="form-control datepickerOne" id=""
                                                                placeholder="এক্সটেনশন হয়ে থাকলে তার সময়কাল" value="{{ $fdNineData->fd9_extension_date }}" name="fd9_extension_date" >
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">২২.</th>

                                                            <td style="">এ প্রকল্পে কতজন বিদেশির পদের সংস্থান রয়েছে এবং কর্মরত কতজন<span
                                                                class="text-danger">*</span></td>
                                                            <td>

                                                                        <input type="text" class="form-control" id=""
                                                               placeholder="কতজন বিদেশির পদের সংস্থান রয়েছে" value="{{ $fdNineData->fd9_post_available_for_foreigner }}" name="fd9_post_available_for_foreigner" required>



                                                                        <input type="text" class="form-control" id=""
                                                               placeholder="কর্মরত কতজন" value="{{ $fdNineData->fd9_post_available_for_foreigner_and_working }}" name="fd9_post_available_for_foreigner_and_working" required>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">২৩.</th>

                                                            <td style="" colspan="2">
                                                                বাংলাদেশের ইতঃপূর্বে অন্যকোন সংস্থায় কাজ করেছিলেন কিনা তার বিবরণ:</span>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <textarea type="text" class="form-control summernote" id=""
                                                                placeholder="" name="fd9_previous_work_experience_in_bangladesh" >
                                                                {{ $fdNineData->fd9_previous_work_experience_in_bangladesh }}
                                                                </textarea>



                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">২৪.</th>

                                                            <td style="">সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন<span
                                                                class="text-danger">*</span></td>
                                                            <td>
                                                                <input type="text" class="form-control" id="" value="{{ $fdNineData->fd9_total_foreigner_working }}" 
                                                                placeholder="সংস্থায় বর্তমানে কতজন বিদেশি নাগরিক কর্মরত আছেন" name="fd9_total_foreigner_working" required>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="2">২৫.</th>

                                                            <td style="" colspan="2">
                                                                অন্য কোন তথ্য (যদি থাকে)</span>
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">

                                                                <div class="card">

                                                                    <div class="card-header">
                                                                        অন্য কোন তথ্য (যদি থাকে)
                                                        
                                                                    </div>
                                                                    <div class="card-body">
                                                        
                                                                        <div class="row">
                                                                        @foreach($fdNineOtherFileList as $key=>$fdNineOtherFileLists)
                                                        
                                                                        <div class="col-md-3 mt-2">
                                                        
                                                                            <div class="card">
                                                        
                                                                                <div class="card-body">
                                                        
                                                        
                                                                                    <p><b>{{ $fdNineOtherFileLists->file_name }}:</b> <a target="_blank" href="{{ route('singlePdfDownload',$fdNineOtherFileLists->id) }}" class="btn btn-custom next_button btn-sm" >
                                                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                                                    </a></p>
                                                                                </div>
                                                                                <div class="card-footer">
                                                                                    <button type="button" class="btn btn-custom next_button btn-sm" data-bs-toggle="modal" data-bs-target="#mmexampleModal{{ $key+1 }}">
                                                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        
                                                                                      </button>
                                                        
                                                                                      <button id="deleteRecord{{ $fdNineOtherFileLists->id }}" class="btn btn-danger btn-sm" data-id="{{ $fdNineOtherFileLists->id }}" type="button" name="deleting">
                                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                                    </button>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                                                      <!-- Modal -->
                                                                    <div class="modal fade" id="mmexampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $fdNineOtherFileLists->file_name }}</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                        
                                                        
                                                        
                                                                    <input type="hidden" name="mid" value="{{ $fdNineOtherFileLists->id }}" class="form-control" id="exampleFormControlInput1" >
                                                        
                                                                    <div class="mb-3">
                                                        
                                                                        <label for="exampleFormControlInput11" class="form-label">ফাইল নাম </label>
                                                                        <input type="text" name="file_name_edit" value="{{ $fdNineOtherFileLists->file_name }}" class="form-control" id="exampleFormControlInput11" >
                                                        
                                                                    </div>
                                                        
                                                        
                                                                    <div class="mb-3">
                                                                    <label for="exampleFormControlInput1" class="form-label">ফাইল</label>
                                                                    <input type="file" accept=".pdf" name="main_file_edit" class="form-control" id="exampleFormControlInput1">
                                                                    </div>
                                                        
                                                                    <button type="submit" name="submit_value" value="single_update" class="btn btn-custom next_button btn-sm">
                                                                        আপডেট করুন
                                                                    </button>
                                                        
                                                        
                                                                    </div>
                                                        
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                                </div>
                                                        
                                                                            </div>
                                                        
                                                                        </div>
                                                        
                                                        
                                                                        @endforeach
                                                                        </div>
                                                                <div class="mb-3 mt-3">
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


                                                              

                                                       <textarea  name="fd9_other_information" id="" cols="30" rows="4" class="form-control summernote">{{ $fdNineData->fd9_other_information }}</textarea>


                                                            </td>
                                                        </tr>
                                                        <!-- step six end -->

                                                    </table>




<!-- empty data -->
<div class="row">

    <div class="mb-3 col-lg-12">

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


</div>




 <!--end empty data -->
 <div class="buttons d-flex justify-content-end mt-4">

    <button class="btn btn-primary me-2" name="submit_value" value="next_step_from_three" type="submit">দাখিল করুন</button>

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
        $("#dynamicAddRemoveInformation").append('<tr id="divnew'+i+'">' +
            '<td>' +
            '<input type="text"  name="file_name[]" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<input type="file" accept=".pdf" name="main_file[]" placeholder="" class="form-control" />' +
            '</td>' +
            '<td>' +
            '<button type="button"  data-mid="'+i+'" class="btn btn-outline-danger remove-input-field-information"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field-information', function () {


        var dataId = $(this).attr('data-mid');
        $('#divnew'+dataId).remove();
    });

</script>


<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr id="divnewf'+i+'">' +
            '<td>' +
            '<input type="text" name="family_member_name[]" class="form-control" required/>' +
            '</td>' +
            '<td>' +
            '<input type="text" name="family_member_age[]" class="form-control" required/>' +
            '</td>' +
            '<td>' +
            '<button type="button" data-midf="'+i+'" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button>' +
            '</td>' +
            '</tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function () {
        //$(this).parents('tr').remove();

        var dataIdf = $(this).attr('data-midf');
        $('#divnewf'+dataIdf).remove();

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
