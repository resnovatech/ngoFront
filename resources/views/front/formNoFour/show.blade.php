@extends('front.master.master')

@section('title')

মাসিক অগ্রগতি প্রতিবেদন | {{ trans('header.ngo_ab')}}

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
                                    <h4>{{ $ngoListAll->organization_name_ban }}</h4>
                                    @else
                                    <h4>{{ $ngoListAll->organization_name }}</h4>
                                    @endif
                                    {{-- <p class="text-secondary mb-1">{{ $ngoListAll->name_of_head_in_bd }}</p>
                                    <p class="text-muted font-size-sm">{{ $ngoListAll->organization_address }}</p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    @include('front.include.acceptSidebar')
                </div>
            </div>

            <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
$name_change_list = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">

                         <!-- new code start --->

                         <div class="d-flex justify-content-between mt-3">
                            <div class="">


                            </div>
                            <div class="">

                                @if($formFourData->status == 'Ongoing')


                                @else

                                <button class="btn btn-primary" onclick="location.href = '{{ route('formNoFour.edit',base64_encode($formFourData->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>

                                @endif

                                <button class="btn btn-success" onclick="location.href = '{{ route('formNoFourPdfDownload',base64_encode($formFourData->id)) }}';"     data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  id="downloadButton">
                                    <i class="fa fa-print"></i>
                                </button>


                            </div>
                        </div>

                        <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৪ ফরম</h3>
                            <h4 style="font-weight:bold;">মাসিক অগ্রগতি প্রতিবেদন</h4>
                        </div>
                        <div class="row">

                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>সংস্থার নাম : </td>
                                    <td>{{ $formFourData->ngo_name }}</td>
                                </tr>

                                <tr>
                                    <td>প্রকল্পের নাম ও মেয়াদকাল: </td>
                                    <td>{{ $formFourData->prokolpo_name }} ও {{ $formFourData->prokolpo_duration }}</td>
                                </tr>

                                <tr>
                                    <td>প্রকল্প অনুমোদন পত্র নং ও তারিখ</td>
                                    <td>{{ $formFourData->prokolpo_permission_no }} ও {{ $formFourData->prokolpo_date }}</td>
                                </tr>

                                <tr>
                                    <td>প্রতিবেদনকালীন সময়: </td>
                                    <td>{{ $formFourData->prokolpo_report_time }}</td>
                                </tr>

                                <tr>
                                    <td>মোট প্রকল্প ব্যয় : </td>
                                    <td>{{ $formFourData->prokolpo_total_cost }}</td>
                                </tr>

                                <tr>
                                    <td>এ এলাকার জন্য বরাদ্দের পরিমাণ : </td>
                                    <td>{{ $formFourData->allocation_amount }}</td>
                                </tr>

                                <tr>
                                    <td>জেলা/উপজেলা  ভিত্তিক মোট ব্যয়: </td>
                                    <td>{{ $formFourData->district_upazila_wise_total_expenditure }}</td>
                                </tr>

                                <tr>
                                    <td>জেলা /উপজেলা ভিত্তিক বার্ষিক বরাদ্দ : </td>
                                    <td>{{ $formFourData->district_upazila_wise_annual_allocation }}</td>
                                </tr>

                                <tr>
                                    <td>প্রকল্প এলাকায় প্রকল্পের সাইনবোর্ড প্রদর্শিত হয়েছে কিনা : </td>
                                    <td>{{ $formFourData->sign_board_avaiable_or_not }}</td>
                                </tr>

                                {{-- <tr>
                                    <td>প্রকল্প অগ্রগতির বিস্তারিত বিবরণ এর পিডিএফ: </td>
                                    <td>     <a target="_blank" class="btn btn-success"  href="{{route('formNoFourPdfDownload',['id'=>$formFourData->id])}}" >
                                        <i class="fa fa-print"></i>
                                    </a></td>
                                </tr> --}}

                            </table>
                            </div>

                            <div class="table-responsive">


                                <table class="table table-bordered text-center mt-5" id="dynamicAddRemove">
                                    <tr>

                                        <th rowspan="2">কর্ম এলাকা</th>
                                        <th rowspan="2">খাতের বিবরণ</th>
                                        <th colspan="2">লক্ষ্যমাত্রা</th>
                                        <th colspan="2">অর্জন</th>
                                        <th rowspan="2">পুঞ্জীভূত অর্জন</th>
                                        <th rowspan="2">মন্তব্য</th>

                                    </tr>
                                    <tr>
                                        <th>বাস্তব </th>
                                        <th>আর্থিক</th>
                                        <th>বাস্তব </th>
                                        <th>আর্থিক</th>
                                    </tr>
@foreach($formFourAreaList as $key=>$formFourAreaLists)
                                    <tr>
                                        <td>{{$formFourAreaLists->work_area }}</td>
                                        <td>{{ $formFourAreaLists->sector_detail }}</td>
                                        <td>{{ $formFourAreaLists->target_real }}</td>
                                        <td>{{ $formFourAreaLists->target_financial }}</td>
                                        <td>{{ $formFourAreaLists->achievement_real }}</td>
                                        <td>{{$formFourAreaLists->achievement_financial }}</td>
                                        <td>{{ $formFourAreaLists->comulative_achievement }}</td>
                                        <td>{{ $formFourAreaLists->comment }}</td>



                                    </tr>
                                    @endforeach

                                </table>

                            </div>

                        </div>




                    </div>
                </div>

                  <!-- new code start --->

                  <div class="d-flex justify-content-between mt-3">
                    <div class="">


                    </div>
                    <div class="">

                        @if($formFourData->status == 'Ongoing')


                        @else


                        <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $formFourData->id}})" class="btn btn-info">
                            এনজিওতে পাঠান <i class="fa fa-send-o"></i>
                        </button>

                            <form id="delete-form-{{ $formFourData->id }}" action="{{ route('formNoFourSend',base64_encode($formFourData->id)) }}" method="get" style="display: none;">

                                @csrf


                            </form>



                        @endif




                    </div>
                </div>

                <!-- new code end -->
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
