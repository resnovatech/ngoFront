@extends('front.master.master')

@section('title')
{{ trans('fdFourForm.fdFourForm')}} | {{ trans('header.ngo_ab')}}
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
                        @include('flash_message')

                        <!-- new code start --->

                <div class="d-flex justify-content-between mt-3">
                  <div class="">


                  </div>
                  <div class="">


                    <a target="_blank" href="{{ route('fd4pdfview',base64_encode($fdFourFormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                        <i class="fa fa-print"></i>
                    </a>
                      @if($fdFourFormList->status == 'Ongoing' || $fdFourFormList->status == 'Accepted')

                                      @else

                      <button class="btn btn-primary" onclick="location.href = '{{ route('fdFourForm.edit',base64_encode($fdFourFormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                      @endif


                  </div>
              </div>

              <div class="form9_upper_box">
                <h3>এফডি - ৪ ফরম</h3>
                <h4>সিএ ফার্ম কতৃক প্রদেয় প্রত্যয়নপত্র </h4>
            </div>

            <span style="text-align: justify">আমি নিম্নস্বাক্ষরকারী এই মর্মে প্রত্যয়ন করছি যে, আমার {{ $fdFourFormList->farm_name }} সিএফার্ম কর্তৃক {{ $fdFourFormList->farm_detail }} নিম্নবর্ণিত সংস্থার বর্ণিত প্রকল্পের {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->prokolpo_duration) }} মেয়াদের হিসাব নিরীক্ষা করা হয়েছে। নিরীক্ষাকালে যাবতীয় বহি, বিল-ভাউচার ও প্রয়োজনীয় প্রমাণক যাচাই করা হয়েছে। নিরীক্ষাকৃত হিসাব অনুসারে প্রাপ্ত তথ্যাদি নিম্নরূপ : </span>

<div class="row mt-3">

                                    <div class="col-md-12">
                                        <table class="table table-borderless" style="width:100%">



                                            <tr>
                                                <th style="text-align: center;">১.</th>
                                                <td style="">এনজিও'র নাম:</td>
                                                <td style="">{{ $fdFourFormList->ngo_name }}</td>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">২.</th>
                                                <td style="">নিবন্ধন নম্বর:</td>
                                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->registration_number) }}</td>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৩.</th>
                                                <td style=""> ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ):</td>
                                                <td style="">{{ $fdFourFormList->ngo_address }}({{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->ngo_telephone) }}, {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->ngo_mobile_number) }}, {{ $fdFourFormList->ngo_email }} ও {{ $fdFourFormList->ngo_website }})</td>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৪.</th>
                                                <td style="">প্রকল্পের নাম ও মেয়াদকাল :</td>
                                                <td style="">{{ $fdFourFormList->prokolpo_name }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->prokolpo_duration_one) }}</td>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৫.</th>
                                                <td style="">নিরীক্ষায় বিবেচ্য সময়কাল :</td>
                                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->exam_time) }}</td>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৬.</th>
                                                <td style="">বর্ষের প্রারম্ভিক জের :</td>
                                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->start_balance) }}</td>

                                            </tr>

                                            <tr>
                                                <th style="text-align: center;">৭.</th>
                                                <td style="">নিরীক্ষা বর্ষে গৃহীত বৈদেশিক অনুদান :</td>
                                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->foreign_grant_taken_exam_year) }}</td>

                                            </tr>


                                            <tr>
                                                <th style="text-align: center;">৮.</th>
                                                <td style="">নিরীক্ষা বর্ষে ব্যয়িত বৈদেশিক অনুদান :</td>
                                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->foreign_grant_cost_exam_year) }}</td>

                                            </tr>
                                            <tr>
                                                <th style="text-align: center;">৯.</th>
                                                <td style="">নিরীক্ষা বর্ষ শেষে অবশিষ্ট বৈদেশিক অনুদান :</td>
                                                <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourFormList->foreign_grant_remaining_exam_year) }}</td>

                                            </tr>

                                        </table>
                                    </div>

                                    </div>

                                   
                    

                                    @if(!$fdFourOneFormList )
                                        
                                    @else
                                      <div class="d-flex justify-content-between mt-3">
                                        <div class="">
                    
                    
                                        </div>
                                        <div class="">
                    
                    
                                            <a target="_blank" href="{{ route('fd4Onepdfview',base64_encode($fdFourOneFormList->id)) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  >
                                                <i class="fa fa-print"></i>
                                            </a>
                              
                    
                    
                                        </div>
                                    </div>
                    
                                    <!-- new code end -->
                    
                                            <div class="form9_upper_box">
                                                <h3>এফডি - ৪(১)  ফরম </h3>
                                                <h4>সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন</h4>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12">
                    
                    
                                                    <table class="table table-borderless" style="width:100%">
                    
                    
                    
                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">১.</th>
                                                            <td style="">প্রকল্পের নাম:</td>
                                                            <td style="">{{ $fdFourOneFormList->prokolpo_name }}</td>
                    
                                                        </tr>
                    
                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">২.</th>
                                                            <td style="">প্রকল্প অনুমোদনের স্বারক নং ও তারিখ:</td>
                                                            <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_no) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_permission_sarok_date) }}</td>
                    
                                                        </tr>
                    
                                                        <tr>
                                                            <th style="text-align: center;" colspan="2">৩.</th>
                                                            <td style="">প্রকল্প বর্ষ:</td>
                                                            <td style="">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_year) }}</td>
                    
                                                        </tr>
                                                      <!-- step one start  -->
                    
                                                        <!-- step two strat --->
                    
                                                        <tr>
                                                            <th style="text-align: center;" colspan="2" rowspan="3">৪.</th>
                    
                                                        </tr>
                    
                                                        <tr>
                    
                    
                                                            <td>ক. ছাড়কৃত অর্থের পরিমাণ ও তারিখ (বাংলাদেশী মুদ্রায় খরচ ):</td>
                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_bangla_amount) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_sarkrito_date) }}</td>
                    
                                                        </tr>
                                                        <tr>
                    
                    
                                                            <td>খ. গৃহীত অর্থের পরিমাণ ও তারিখ:</td>
                                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito) }} ও {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fdFourOneFormList->prokolpo_amount_grihito_date) }}</td>
                    
                                                        </tr>
                    
                                                        <!-- step two end --->
                    
                                                        <!-- step three start -->
                    
                                                        <tr>
                                                            <th style="text-align: center;" rowspan="2">৫.</th>
                                                            <td style="font-weight:bold;" colspan="3">খরচের খাতসমূহের বিস্তারিত বিবরণ : </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                    
                                                                        <div class="table-responsive">
                    
                    
                                                                            <table class="table table-bordered text-center" id="">
                                                                                <tr>
                    
                                                                                    <th >খরচের খাতসমূহের বিস্তারিত(প্রকল্প বিবরণ এ প্রদত্ত এফডি -৬ অনুযায়ী )</th>
                                                                                    <th >অনুমোদিত বাজেট অনুযায়ী অর্থের পরিমাণ</th>
                                                                                    <th >প্রকৃত ব্যয়</th>
                                                                                    <th >পার্থক্য </th>
                                                                                    <th >শতকরা হার (%)</th>
                                                                                    <th >পার্থক্য এর  কারণ</th>
                    
                                                                                </tr>
                    
                                                                                @foreach($expenditureDetails as $expenditureDetail)
                                                                                <tr>
                    
                                                                                    <td>{!! $expenditureDetail->expenditure_sectors !!}</td>
                                                                                    <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->approved_budget_money) }}</td>
                                                                                    <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->actual_cost) }}</td>
                                                                                    <td>{!! $expenditureDetail->difference !!}</td>
                                                                                    <td style="width:5%">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($expenditureDetail->percentage) }}</td>
                                                                                    <td>{!! $expenditureDetail->reason_for_the_difference !!}</td>
                    
                                                                                </tr>
                                                                                @endforeach
                    
                                                                            </table>
                    
                    
                                                                        </div>
                    
                                                            </td>
                                                        </tr>
                                                      <!-- step one start  -->
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- step one end --->
                    
                    @endif
                                        

                                       <!-- new code start --->

                    <div class="d-flex justify-content-between mt-3">
                        <div class="">


                        </div>
                        <div class="">



                            @if($fdFourFormList->status == 'Ongoing' || $fdFourFormList->status == 'Accepted')

                                            @else

                                            <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন দাখিল করুন" onclick="editTag({{ $fdFourFormList->id}})" class="btn btn-info">
                                                দাখিল করুন  <i class="fa fa-send-o"></i>
                                            </button>

                                                <form id="delete-form-{{ $fdFourFormList->id }}" action="{{ route('fdFourSend',base64_encode($fdFourFormList->id)) }}" method="get" style="display: none;">

                                                    @csrf


                                                </form>


                            @endif


                        </div>
                    </div>

                    <!-- new code end -->

                    </div>
                </div>

            </div>
        </div>

    </div>

</section>


@endsection

@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: 'আপনি কি ফর্ম সাবমিট করতে চাচ্ছেন?',
            text: "সাবমিট বাটনে ক্লিক করলে, আর তথ্য সংশোধন করবেন না। আপনি কি রাজি?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি পাঠান !',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    'আপনার আবেদন পাঠানো হয়নি :)',
                    'error'
                )
            }
        })
    }
</script>
@endsection
