@extends('front.master.master')

@section('title')
{{ trans('formNoFive.formNoFive')}} | {{ trans('header.ngo_ab')}}
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
                                        <h1>বার্ষিক প্রতিবেদন</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">

                                    <form action="{{ route('formNoFive.update',$formFiveData->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৫</h3>
                                        <h4 style="font-weight: 900;">বার্ষিক প্রতিবেদন</h4>
                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
                                    </div>

                                    <div class="fd01_tablist mt-3">
                                        <div class="fd01_tab fd01_checked"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->prokolpo_name }}" name="prokolpo_name"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের মোট মেয়াদকাল<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->prokolpo_duration }}" name="prokolpo_duration"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর অনুমোদনের নম্বর<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->ngo_registration_number }}" name="ngo_registration_number"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ব্যুরোর অনুমোদনের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text"  required value="{{ $formFiveData->ngo_registration_date }}" name="ngo_registration_date" class="form-control datepickerOne" id="" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">অনুমোদিত প্রাক্কলিত ব্যয় (বছর ভিত্তিক)<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->approved_estimated_expenditure_year_wise }}" name="approved_estimated_expenditure_year_wise"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকালে ছাড়কৃত অর্থের পরিমাণ<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->received_money_during_report }}" name="received_money_during_report"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকাল (প্রকল্প বর্ষ)<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->report_year }}" name="report_year"  class="form-control" id=""placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের বিবেচ্য সময়ে অর্জনের শতকরা হার<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->percentage_of_achievement_during_project }}" name="percentage_of_achievement_during_project"  class="form-control" id=""placeholder="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রতিবেদনকালে বাস্তবায়িত এলাকা<span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $formFiveData->prokolpo_araea }}" name="prokolpo_araea"  class="form-control" id=""placeholder="">
                                        </div>

                                    </div>

                                    <div class="row mt-5">
                                        {{-- <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প এলাকা</label>
                                        </div> --}}
                                        <div class="mb-3 col-lg-12">
                                            <table class="table table-bordered" id="dynamicAddRemove">
                                                <tr>
                                                    <th>বিভাগ</th>
                                                    <th>জেলা/সিটি কর্পোরেশন</th>
                                                    <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                                    <th></th>
                                                </tr>
                                                @foreach($formNoFiveStepFiveArea as $key=>$prokolpoAreaListAll)
                                                <tr>
                                                    <td style="width: 20%">
                                                        <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                                                        {{-- <input type="text" required name="division_name[]" class="form-control" id=""
                                                        placeholder=""> --}}



                                                        <select required name="division_name[]" class="form-control division_name" id="division_name{{ $key+60000 }}">
                                                            <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                                            <option value="{{ $prokolpoAreaListAll->division_name}}" selected>{{ $prokolpoAreaListAll->division_name}}</option>
                                                            @foreach($divisionList as $districtListAll)

                                                            <option value="{{ $districtListAll->division_bn }}" {{ $districtListAll->division_bn == $prokolpoAreaListAll->division_name ? 'selected':'' }}>{{ $districtListAll->division_bn }}</option>
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                    <td style="width: 35%">
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                                                {{-- <input type="text" required name="district_name[]" class="form-control" id=""
                                                                placeholder=""> --}}

                                                                <select required name="district_name[]" class="form-control district_name" id="district_name{{ $key+60000 }}">
                                                                    <option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>

                                                                    @foreach($districtList as $districtListAll)
                                                                    <option value="{{ $districtListAll->district_bn }}" {{ $districtListAll->district_bn == $prokolpoAreaListAll->district_name ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                                                {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                                                placeholder=""> --}}


                                                                <select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name0">
                                                                    <option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option>
                                                                    @foreach($cityCorporationList as $districtListAll)
                                                                    <option value="{{ $districtListAll->city_orporation }}" {{ $districtListAll->city_orporation == $prokolpoAreaListAll->city_corparation_name ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">উপজেলা</label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->upozila_name }}" name="upozila_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->thana_name }}" name="thana_name[]" class="form-control" id=""
                                                                placeholder="" required>
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">পৌরসভা</label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->municipality_name }}" name="municipality_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                            <div class="col-lg-6 mb-3">
                                                                <label for="" class="form-label">ওয়ার্ড</label>
                                                                <input type="text" value="{{ $prokolpoAreaListAll->ward_name }}" name="ward_name[]" class="form-control" id=""
                                                                placeholder="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    @if($key == 0)
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" id="dynamic-ar"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                    @else

<td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>



                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        {{-- <a target="_blank" href="{{ route('formNoFiveStepTwo',base64_encode(1)) }}">next</a> --}}
                                        <button type="submit" class="btn btn-registration"
                                                >আপডেট করুন
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




<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td style="width: 20%"><label for="" class="form-label">বিভাগ</label><select required name="division_name[]" class="form-control division_name" id="division_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option>@foreach($divisionList as $districtListAll)<option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>@endforeach</select></td><td style="width: 35%"><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">জেলা</label><select required name="district_name[]" class="form-control district_name" id="district_name'+i+'"><option value="">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div><div class="col-lg-6 mb-3"><label for="" class="form-label">সিটি কর্পোরেশন</label><select required name="city_corparation_name[]" class="form-control city_corparation_name" id="city_corparation_name'+i+'"><option value="অনুগ্রহ করে নির্বাচন করুন">--- অনুগ্রহ করে নির্বাচন করুন ---</option></select></div></div></td><td><div class="row"><div class="col-lg-6 mb-3"><label for="" class="form-label">উপজেলা</label><input type="text" name="upozila_name[]" class="form-control" id="" placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">থানা</label><input type="text"  required name="thana_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">পৌরসভা</label><input type="text" name="municipality_name[]" class="form-control" id=""placeholder=""></div><div class="col-lg-6 mb-3"><label for="" class="form-label">ওয়ার্ড</label><input type="text" name="ward_name[]" class="form-control" id=""placeholder=""></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>

@endsection
