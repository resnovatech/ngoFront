@extends('front.master.master')

@section('title')
এফডি - ৪ ফরম | {{ trans('header.ngo_ab')}}
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
                                        <h1>সিএ ফার্ম কতৃক প্রদেয় প্রত্যয়নপত্র </h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>


                            @include('flash_message')


                            @if(!$fdFourFormList)


                                    <form action="{{ route('fdFourForm.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf

                                        <input type="hidden" required name="decodeId" value="{{ $decodeId }}" class="form-control" id=""
                                    placeholder="">

                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৪ ফরম</h3>
                                        <h4>সিএ ফার্ম কতৃক প্রদেয় প্রত্যয়নপত্র </h4>
                                    </div>

                                    <div class="row">



                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">এনজিও'র নাম <span class="text-danger">*</span></label>


                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                    placeholder="">

                                    @else


                                    <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                    placeholder="">


                                    @endif



                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span></label>
                                            <input type="text" required name="registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control " id=""
                                                   placeholder="">
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">টেলিফোন <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_telephone" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required name="ngo_email" class="form-control" id=""
                                                   placeholder="" value="{{ $ngo_list_all->email }}">
                                        </div>

                                        @if(empty($ngo_list_all->web_site_name))
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        @else
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">ওয়েবসাইট <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $ngo_list_all->web_site_name }}" name="ngo_website" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        @endif

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_name" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রকল্পের মেয়াদকাল<span class="text-danger">*</span></label>
                                            <input type="text" required name="prokolpo_duration_one" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষায় বিবেচ্য সময়কাল <span class="text-danger">*</span></label>
                                            <input type="text" required name="exam_time" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">বর্ষের প্রারম্ভিক জের <span class="text-danger">*</span></label>
                                            <input type="text" required name="start_balance" class="form-control " value="" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                            <input type="text" required name="foreign_grant_taken_exam_year" value="" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান <span class="text-danger">*</span></label>
                                            <input type ="number" required name="foreign_grant_cost_exam_year" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                            <input type="text" required name="foreign_grant_remaining_exam_year" class="form-control" id=""
                                                   placeholder="" value="">
                                        </div>
                                    </div>







                                    <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                        <button type="submit" class="btn btn-registration"
                                                >দাখিল করুন
                                        </button>
                                    </div>
                                </form>

                                @else


                                <form action="{{ route('fdFourForm.update',$fdFourFormList->id) }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" required name="decodeId" value="{{ $decodeId }}" class="form-control" id=""
                                placeholder="">

                                <div class="form9_upper_box">
                                    <h3>এফডি - ৪ ফরম</h3>
                                    <h4>সিএ ফার্ম কতৃক প্রদেয় প্রত্যয়নপত্র </h4>
                                </div>

                                <div class="row">



                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">এনজিও'র নাম <span class="text-danger">*</span></label>


                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                placeholder="">

                                @else


                                <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                placeholder="">


                                @endif



                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিবন্ধন নম্বর <span class="text-danger">*</span></label>
                                        <input type="text" required name="registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control " id=""
                                               placeholder="">
                                    </div>


                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">টেলিফোন <span class="text-danger">*</span></label>
                                        <input type="text" required name="ngo_telephone" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                                        <input type="text" required name="ngo_email" class="form-control" id=""
                                               placeholder="" value="{{ $ngo_list_all->email }}">
                                    </div>

                                    @if(empty($ngo_list_all->web_site_name))
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">ওয়েবসাইট <span class="text-danger">*</span></label>
                                        <input type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                               placeholder="">
                                    </div>
                                    @else
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">ওয়েবসাইট <span class="text-danger">*</span></label>
                                        <input type="text" required value="{{ $ngo_list_all->web_site_name }}" name="ngo_website" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    @endif

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">প্রকল্পের নাম<span class="text-danger">*</span></label>
                                        <input type="text" required name="prokolpo_name" value="{{ $fdFourFormList->prokolpo_name }}" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">প্রকল্পের মেয়াদকাল<span class="text-danger">*</span></label>
                                        <input type="text" required name="prokolpo_duration_one" value="{{ $fdFourFormList->prokolpo_duration_one }}" class="form-control" id=""
                                               placeholder="">
                                    </div>

                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষায় বিবেচ্য সময়কাল <span class="text-danger">*</span></label>
                                        <input type="text" required name="exam_time" value="{{ $fdFourFormList->exam_time }}" class="form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">বর্ষের প্রারম্ভিক জের <span class="text-danger">*</span></label>
                                        <input type="text" required name="start_balance" value="{{ $fdFourFormList->start_balance }}" class="form-control " value="" id=""
                                               placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                        <input type="text" required name="foreign_grant_taken_exam_year"  value="{{ $fdFourFormList->foreign_grant_taken_exam_year }}" class="form-control" id=""
                                               placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান <span class="text-danger">*</span></label>
                                        <input type ="number" required required name="foreign_grant_cost_exam_year" value="{{ $fdFourFormList->foreign_grant_cost_exam_year }}" class="form-control" id="" placeholder="">
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label for="" class="form-label">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান<span class="text-danger">*</span></label>
                                        <input type="text" required name="foreign_grant_remaining_exam_year" value="{{ $fdFourFormList->foreign_grant_remaining_exam_year }}" class="form-control" id=""
                                               placeholder="" value="">
                                    </div>
                                </div>







                                <div class="d-grid d-md-flex justify-content-md-end mt-4">
                                    <button type="submit" class="btn btn-registration"
                                            >দাখিল করুন
                                    </button>
                                </div>
                            </form>

                                @endif

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
