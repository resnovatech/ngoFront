@extends('front.master.master')

@section('title')
{{ trans('fd9.fd7')}} | {{ trans('header.ngo_ab')}}
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
                                    <div class="row">


    @csrf
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">এনজিও'র নাম <span class="text-danger">*</span></label>





                                    <input type="text" required name="ngo_name" value="{{ $fd7FormList->ngo_name }}" class="form-control" id=""
                                    placeholder="">






                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_address" class="form-control" value="{{ $fd7FormList->ngo_address }}" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_registration_number" value="{{ $fd7FormList->ngo_registration_number }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর নিবন্ধন তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_registration_date" value="{{ $fd7FormList->ngo_registration_date }}" class="form-control datepickerOne" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রস্তাবিত প্রকল্পের নাম <span class="text-danger">*</span></label>
                                            <input name="ngo_prokolpo_name" value="{{ $fd7FormList->ngo_prokolpo_name }}" type="text" class="form-control" id="ngo_prokolpo_name"
                                                   placeholder="" required>
                                        </div>

                                        <?php
                                        $subjectIdList  = explode(",",$fd7FormList->subject_id);

                                        ?>


                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্পের ধরণ<span class="text-danger">*</span></label>
                                            <select required multiple name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                                                   placeholder="">
                                                   <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                                   @foreach($projectSubjectList as $projectSubjectLists)
                                                   <option value="{{ $projectSubjectLists->id }}" {{ (in_array($projectSubjectLists->id,$subjectIdList)) ? 'selected' : '' }}>{{ $projectSubjectLists->name }}</option>
                                                   @endforeach
                                            </select>
                                        </div>

                                    </div>


                                    <div class="card mb-3">
                                        <div class="card-header">
                                            অর্থ বা ত্রাণ-সামগ্রীর উৎস <br>
                                            দাতা সংস্থার প্রতিশ্রুতিপত্র
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label"> দাতা সংস্থার বিবরণ</label>
                                                    <input type="text" value="{{ $fd7FormList->donor_organization_description }}" name="donor_organization_description" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">প্রধান নির্বাহী কর্মকর্তা/
                                                        দাতার নাম</label>
                                                    <select name="donor_organization_chief_type" class="form-control" id="">
                                                        <option value="প্রধান নির্বাহী কর্মকর্তা" {{ 'প্রধান নির্বাহী কর্মকর্তা' == $fd7FormList->donor_organization_chief_type ? 'selected':'' }}>প্রধান নির্বাহী কর্মকর্তা</option>
                                                        <option value="দাতার নাম" {{ 'দাতার নাম' == $fd7FormList->donor_organization_chief_type ? 'selected':'' }}>দাতার নাম</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">নাম</label>
                                                    <input type="text" value="{{ $fd7FormList->donor_organization_chief_name }}" name="donor_organization_chief_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">দাতা সংস্থার নাম</label>
                                                    <input type="text" value="{{ $fd7FormList->donor_organization_name }}" name="donor_organization_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">যোগাযোগগের ঠিকানা</label>
                                                    <input type="text" value="{{ $fd7FormList->donor_organization_address }}" name="donor_organization_address" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">টেলিফোন</label>
                                                    <input type="number" value="{{ $fd7FormList->donor_organization_phone }}" name="donor_organization_phone" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ইমেইল </label>
                                                    <input type="email" value="{{ $fd7FormList->donor_organization_email }}" name="donor_organization_email" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">ওয়েবসাইট </label>
                                                    <input type="text" value="{{ $fd7FormList->donor_organization_website }}" name="donor_organization_website" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            দাতা সংস্থার প্রতিশ্রুতিপত্র
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">চলমান প্রকল্পের নাম </label>
                                                    <input type="text" value="{{ $fd7FormList->ongoing_prokolpo_name }}" name="ongoing_prokolpo_name" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">মোট ব্যায়</label>
                                                    <input type="text" value="{{ $fd7FormList->total_prokolpo_cost }}" name="total_prokolpo_cost" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">ব্যুরোর অনুমোদনের তারিখ</label>
                                                    <input type="text" value="{{ $fd7FormList->date_of_bureau_approval }}" name="date_of_bureau_approval" class="form-control datepickerOne" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">অনুমোদনপত্র সংযুক্ত করতে
                                                        হবে <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input type="file" accept=".pdf" name="bureau_approval_pdf" class="form-control" id="fd7PdfN1"
                                                           placeholder="">

                                                           <p id="fd7PdfN1_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                           <?php

                                                           $file_path = url($fd7FormList->bureau_approval_pdf);
                                                           $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                           $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                           ?>
                                                            <b>{{ $filename.'.'.$extension }}</b>
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">মূল প্রকল্পের শতকরা কতভাগ এই
                                                        প্রকল্পের ব্যায় করা হয় </label>
                                                    <input type="text" value="{{ $fd7FormList->percentage_of_the_original_project }}" name="percentage_of_the_original_project" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">চলমান প্রকল্পের উপর কোন বিরূপ
                                                        প্রভাব ফেলবে কি না</label>
                                                    <input type="text" value="{{ $fd7FormList->adverse_impact_on_the_ongoing_project }}" name="adverse_impact_on_the_ongoing_project" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-12">
                                                    <label for="" class="form-label">দাতা সংস্থার প্রতিশ্রুতিপত্র (কপি
                                                        সংযুক্ত করতে হবে) <br><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></label>
                                                    <input type="file" accept=".pdf" name="letter_from_donor_agency_pdf" class="form-control" id="fd7PdfN2"
                                                           placeholder="">

                                                           <p id="fd7PdfN2_text" class="text-danger mt-2" style="font-size:12px;"></p>

                                                           <?php

                                                           $file_path = url($fd7FormList->letter_from_donor_agency_pdf);
                                                           $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                           $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                           ?>
                                                            <b>{{ $filename.'.'.$extension }}</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                        <div class="card mb-3">
                                            <div class="card-header">
                                                প্রকল্প এলাকা
                                            </div>
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="mb-3 col-lg-12">
                                                        <label for="" class="form-label">প্রকল্প এলাকা</label>
                                                    </div>
                                                    <div class="mb-3 col-lg-12">
                                                        <table class="table table-bordered" id="dynamicAddRemove">


                                                            @foreach($prokolpoAreaList as $key=>$prokolpoAreaListAll)
                                                <!-- global table  start --->
                                           @include('front.include.globalTableEdit')
                                           <!-- global table end --->
                                                @endforeach
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-lg-12">
                                                <h5 class="form-label">কার্যক্রমের মেয়াদকাল </h5>
                                            </div>


                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">আরম্ভের তারিখ <span class="text-danger">*</span></label>
                                                <input type="text" name="ngo_prokolpo_start_date" value="{{ $fd7FormList->ngo_prokolpo_start_date }}" class="form-control datepickerOne" id="ngo_prokolpo_start_date"
                                                       placeholder="" required>
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">সমাপ্তির তারিখ <span class="text-danger">*</span></label>
                                                <input type="text" name="ngo_prokolpo_end_date" value="{{ $fd7FormList->ngo_prokolpo_end_date }}" class="form-control datepickerOne" id="ngo_prokolpo_end_date"
                                                       placeholder="" required>
                                            </div>


                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
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

</section>


@endsection

@section('script')

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

// });


$.ajax({
    url: "{{ route('getCityCorporationList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#city_corparation_name"+get_id_from_main).html('');
      $("#city_corparation_name"+get_id_from_main).html(data);
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




{{-- <script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="division_name[]" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>@endforeach</select></td><td style="width: 30%"><div class="row"><div class="col-lg-12 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-12 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-12 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-12 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-12 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div></div></td><td><label for="" class="form-label">ইউনিয়ন/ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id="" placeholder=""></td><td><input type="number" name="allocated_budget[]" required class="form-control" id="" placeholder=""></td><td><input type="number" name="number_of_beneficiaries[]" required class="form-control" id="" placeholder=""></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');});
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script> --}}

@endsection
