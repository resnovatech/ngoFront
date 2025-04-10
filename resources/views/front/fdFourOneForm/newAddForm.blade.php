@extends('front.master.master')

@section('title')
{{ trans('fdFourFormOne.fdFourOneForm')}}  | {{ trans('header.ngo_ab')}}
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
                                        <h1>সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন </h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>


                            @include('flash_message')


                                    <form action="{{ route('fdFourOneForm.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" name="fdFourId" value="{{ $fdFourFormId }}" class="form-control mt-2" id="fdFourId">
                                        <input type="hidden" name="mainEditId" value="0" class="form-control mt-2" id="mainEditId">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৪(১) ফরম</h3>
                                        <h4>সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন </h4>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">


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
                                                    <td style="text-align: center;">প্রকল্পের নাম<span style="color:red;">*</span>:</td>
                                                    <th style="text-align: center;">
                                                        <input type="text" required name="prokolpo_name" value="" class="form-control" id=""
                                                   placeholder="প্রকল্পের নাম">
                                                    </th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">২.</th>
                                                    <td style="text-align: center;">প্রকল্প অনুমোদনের স্বারক নং ও তারিখ <span style="color:red;">*</span>:</td>
                                                    <th style="text-align: center;">

                                                        <input type="text" required name="prokolpo_permission_sarok_no" value="" class="form-control mt-2" id=""
                                                               placeholder="প্রকল্প অনুমোদনের স্বারক নং">


                                                               <input type="text" required name="prokolpo_permission_sarok_date" class="form-control datepickerOne mt-2" value="" id=""
                                                                      placeholder="প্রকল্প অনুমোদনের তারিখ">
                                                    </th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" colspan="2">৩.</th>
                                                    <td style="text-align: center;">প্রকল্প বর্ষ<span style="color:red;">*</span>:</td>
                                                    <th style="text-align: center;">

                                                        <input type="text" required name="prokolpo_year" value="" class="form-control" id=""
                                                        placeholder="প্রকল্প বর্ষ">
                                                    </th>

                                                </tr>
                                              <!-- step one start  -->



                                                <!-- step two strat --->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="3">৪.</th>



                                                </tr>

                                                <tr>

                                                    <td style="text-align: center;">ক.</td>
                                                    <td> ছাড়কৃত অর্থের পরিমাণ ও তারিখ (বাংলাদেশী মুদ্রায় খরচ )<span style="color:red;">* </span></td>
                                                    <td>

                                                            <input type ="number" required name="prokolpo_amount_sarkrito_bangla_amount" class="form-control" id="" placeholder="ছাড়কৃত অর্থের পরিমাণ (বাংলাদেশী মুদ্রায় খরচ )">

                                                            <input type="text" required name="prokolpo_amount_sarkrito_date" class="form-control datepickerOne mt-2" id=""
                                                                   placeholder="ছাড়কৃত তারিখ" value="">
                                                        </div>


                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td style="text-align: center;">খ.</td>
                                                    <td>গৃহীত অর্থের পরিমাণ ও তারিখ <span style="color:red;">*</span> </td>
                                                    <td>



                                                            <input type="text" required name="prokolpo_amount_grihito" class="form-control" id=""
                                                                   placeholder="গৃহীত অর্থের পরিমাণ" value="">


                                                            <input type="text" required name="prokolpo_amount_grihito_date" class="form-control datepickerOne mt-2" id=""
                                                                   placeholder="গৃহীত অর্থের তারিখ" value="">


                                                    </td>

                                                </tr>







                                                <!-- step two end --->

                                                <!-- step three start -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="2">৫.</th>
                                                    <td style="font-weight:bold;" colspan="3">খরচের খাতসমূহের বিস্তারিত বিবরণ<span style="color:red;">*</span></td>


                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="row" id="tableAjaxData">
                                                            <div class="col-md-12">

                                                                <div class="d-flex justify-content-between ">
                                                                    <div class="p-2">


                                                                    </div>
                                                                    <div class="p-2">
                                                                        <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#sectorsOfExpenditureModal" >
                                                                             যুক্ত করুন
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive" id="sectorsOfExpenditureTable">


                                                                    @include('front.fdFourOneForm._partial.sectorsOfExpenditureTable')


                                                                </div>



                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                              <!-- step one start  -->
                                            </table>
                                        </div>
                                    </div>
                                    <!-- step one end --->

                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                           <a href="{{ route('fdFourForm.edit',base64_encode($fdFourFormId)) }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                            </a>
                                        <button type="submit"  style="margin-left: 12px;" class="btn btn-registration"
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

</section>

@include('front.fdFourOneForm._partial.sectorsOfExpenditureModal')
@endsection

@section('script')
@include('front.fdFourOneForm._partial.script')
@include('front.zoomButtonImage')
<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<textarea required placeholder="খরচের খাতসমূহের বিস্তারিত" name="expenditure_sectors[]" class="form-control "></textarea>' +
            '</td>' +
            '<td style="width:5%">' +
            '<input required type="text" name="approved_budget_money[]" class="form-control" placeholder="অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ" />' +
            '</td>' +

            '<td style="width:5%">' +
            '<input required type="text" name="actual_cost[]" class="form-control" placeholder="প্রকৃত ব্যয়" />' +
            '</td>' +

            '<td>' +
            '<textarea required placeholder="পার্থক্য" name="difference[]" class="form-control"></textarea>' +
            '</td>' +

            '<td style="width:5%">' +
            '<input required type="text" name="percentage[]"class="form-control" placeholder="শতকরা হার (%)" />' +
            '</td>' +

            '<td>' +
            '<textarea required placeholder="পার্থক্য এর  কারণ" name="reason_for_the_difference[]" class="form-control"></textarea>' +
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
