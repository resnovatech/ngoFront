@extends('front.master.master')

@section('title')
প্রকল্পের খাতভিত্তিক বিবরণী | {{ trans('header.ngo_ab')}}
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


                                    <div class="form9_upper_box">
                                        <h3>ফরম নং-৫</h3>
                                        <h4 style="font-weight: 900;">বার্ষিক প্রতিবেদন</h4>
                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
                                    </div>

                                    <div class="fd01_tablist mt-3">
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab fd01_checked"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                        <div class="fd01_tab"></div>
                                    </div>

                                     <div class="card">
                                        <div class="card-header text-center">প্রকল্পের খাতভিত্তিক বিবরণী</div>
                                     </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            @include('flash_message')

                                            <!-- add modal button start -->

                                            <div class="d-flex justify-content-between ">
                                                <div class="p-2">


                                                </div>
                                                <div class="p-2">
                                                    <button class="btn btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                        {{ trans('formNoFive.addNew')}}
                                                    </button>
                                                </div>
                                            </div>

                                            <!--- modal start--->

                                            @include('front.formNoFive._partila.modal')

                                            <!--- modal end --->

                                            <!-- add modal button end -->

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(count($formNoFiveStepTwoData) == 0 )

                                            <div class="no_name_change">
                                                <div class="d-flex justify-content-center pt-5">
                                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                                </div>
                                                <div class="text-center">
                                                    <h5>কোন তালিকা নেই</h5>
                                                </div>
                                            </div>

                                            @else

                                            <div class="table-responsive">


                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th rowspan="2">ক্র : নং :</th>
                                                        <th rowspan="2">এনেক্সার - সি এর খাত</th>
                                                        <th rowspan="2">খাত ওয়ারী বাজেট</th>
                                                        <th rowspan="2">কার্যক্রম ও লক্ষ্যমাত্রা</th>
                                                        <th rowspan="2">কার্যক্রম ওয়ারী বিভাজিত বাজেট</th>
                                                        <th rowspan="2">কার্যক্রম ভিত্তিক অর্জিত লক্ষ্যমাত্রা</th>
                                                        <th rowspan="2">কার্যক্রম ভিত্তিক প্রকৃত ব্যয়</th>
                                                        <th rowspan="2">খাতওয়ারী মোট  প্রকৃত ব্যয়</th>
                                                        <th colspan="2">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি বাস্তব</th>
                                                        {{-- <th>প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি আর্থিক</th> --}}
                                                        <th rowspan="2">মন্তব্য</th>
                                                        <th rowspan="2">কর্ম পরিকল্পনা</th>
                                                    </tr>
                                                    <tr>
                                                        <th>বাস্তব</th>
                                                        <th>আর্থিক</th>
                                                    </tr>
                                                    @foreach($formNoFiveStepTwoData as $key=>$formNoFiveStepTwoDatas)
                                                    <tr>
                                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->sector_of_annexure_C }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->sector_wise_budget}}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->activities_and_objectives}}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->activity_wise_segmented_budget }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->activity_based_achievement_targets }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->activity_based_actual_costing }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->accounts_payable_total_actual_expenditure }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_real }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_financial }}</td>
                                                        <td>{{ $formNoFiveStepTwoDatas->comment }}</td>
                                                        <td>

                                                            <button class="btn btn-sm btn-primary btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $formNoFiveStepTwoDatas->id }}" >
                                                                <i class="fa fa-pencil"></i>
                                                            </button>

                                                            <!-- edit modal start -->

                                                            @include('front.formNoFive._partila.modalEdit')

                                                            <!-- edit  modal end -->

                                                            <button type="button" onclick="deleteTag({{ $formNoFiveStepTwoDatas->id}})" class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash"></i></button>

                                                                <form id="delete-form-{{ $formNoFiveStepTwoDatas->id }}" action="{{ route('formNoFiveStepTwoDelete',$formNoFiveStepTwoDatas->id) }}" method="POST" style="display: none;">

                                                                    @csrf
                                                                    @method('DELETE')

                                                                </form>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </table>

                                            </div>

                                            @endif
                                        </div>
                                    </div>

                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">


                                        <a href="{{ route('formNoFive.edit',base64_encode($decode_id)) }}"  class="btn btn-dark back_button me-2">{{ trans('fd_one_step_one.back')}}</a>
                                        @if(count($formNoFiveStepTwoData) == 0 )

                                        @else
                                        <a href="{{ route('formNoFiveStepThree',base64_encode($decode_id)) }}" class="btn btn-registration"
                                                >{{ trans('fd_one_step_one.Next_Step')}}
                                    </a>
                                    @endif
                                    </div>

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
