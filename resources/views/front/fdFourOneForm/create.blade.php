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
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৪(১) ফরম</h3>
                                        <h4>সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন </h4>
                                    </div>

                                    <div class="row">

                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_name" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প অনুমোদনের স্বারক নং <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_permission_sarok_no" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্প অনুমোদনের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_permission_sarok_date" class="form-control datepickerOne" value="" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প বর্ষ<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_year" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ছাড়কৃত অর্থের পরিমাণ (বাংলাদেশী মুদ্রায় খরচ )<span class="text-danger">*</span></label>
                                            <input type ="number" required name="prokolpo_amount_sarkrito_bangla_amount" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ছাড়কৃত তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_amount_sarkrito_date" class="form-control datepickerOne" id=""
                                                   placeholder="" value="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">গৃহীত অর্থের পরিমাণ<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_amount_grihito" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">গৃহীত অর্থের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_amount_grihito_date" class="form-control datepickerOne" id=""
                                                   placeholder="" value="">
                                        </div>





                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            খরচের খাতসমূহের বিস্তারিত বিবরণ <span class="text-danger">*</span>
                                        </div>
                                        <div class="card-body">


                                            <div class="row" id="tableAjaxData">
                                                <div class="col-md-12">


                                                    <div class="table-responsive">


                                                        <table class="table table-bordered text-center" id="dynamicAddRemove">
                                                            <tr>

                                                                <th >খরচের খাতসমূহের বিস্তারিত(প্রকল্প বিবরণ এ প্রদত্ত এফডি -৬ অনুযায়ী )</th>
                                                                <th >অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ</th>
                                                                <th >প্রকৃত ব্যয়</th>
                                                                <th >পার্থক্য </th>
                                                                <th >শতকরা হার (%)</th>
                                                                <th >পার্থক্য এর  কারণ</th>
                                                                <th ></th>
                                                            </tr>
                                                            <tr>

                                                                <td><textarea required placeholder="খরচের খাতসমূহের বিস্তারিত" name="expenditure_sectors[]" class="form-control"></textarea></td>
                                                                <td style="width:5%"><input required type="text" name="approved_budget_money[]" class="form-control" placeholder="অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ" /></td>
                                                                <td style="width:5%"><input required type="text" name="actual_cost[]" class="form-control" placeholder="প্রকৃত ব্যয়" /></td>
                                                                <td><textarea  required placeholder="পার্থক্য" name="difference[]" class="form-control"></textarea></td>
                                                                <td style="width:5%"><input required type="text" name="percentage[]"class="form-control" placeholder="শতকরা হার (%)" /></td>
                                                                <td><textarea required  placeholder="পার্থক্য এর  কারণ" name="reason_for_the_difference[]" class="form-control"></textarea></td>
                                                                <td> <button type="button" name="add" id="dynamic-ar" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                                                                </button></td>


                                                            </tr>

                                                        </table>

                                                    </div>



                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-12">
                                                    <input class="form-control" data-parsley-required accept=".pdf" name="prokolpo_sector_detail" type="file" id="">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>






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
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr>' +
            '<td>' +
            '<textarea required placeholder="খরচের খাতসমূহের বিস্তারিত" name="expenditure_sectors[]" class="form-control"></textarea>' +
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
