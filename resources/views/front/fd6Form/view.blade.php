@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
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



                        @if($fd6FormList->status == 'Ongoing' || $fd6FormList->status == 'Accepted')

                                        @else



                        <button class="btn btn-primary" onclick="location.href = '{{ route('fd6Form.edit',base64_encode($fd6FormList->id)) }}';" data-toggle="tooltip" data-placement="top" title="{{ trans('message.update')}}"><i class="fa fa-edit"></i></button>
                        @endif


                    </div>
                </div>

                <!-- new code end -->

                        <div class="form9_upper_box">
                            <h3>এফডি - ৬ ফরম </h3>
                            <h4>প্রকল্প প্রস্তাব ফরম</h4>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>এনজিও'র নাম</td>
                                <td>: {{ $fd6FormList->ngo_name }}</td>
                            </tr>
                            <tr>
                                <td>ব্যুরোর নিবন্ধন তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_registration_date) }}</td>
                            </tr>
                            <tr>
                                <td>সর্বশেষ নবায়ন</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_last_renew_date) }}</td>
                            </tr>
                            <tr>
                                <td>মেয়াদ উত্তীর্ণের তারিখ</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_expiration_date) }}</td>
                            </tr>
                            <tr>
                                <td>ঠিকানা</td>
                                <td>: {{ $fd6FormList->ngo_address }}</td>
                            </tr>
                            <tr>
                                <td>টেলিফোন </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_telephone_number) }}</td>
                            </tr>
                            <tr>
                                <td>মোবাইল নম্বর</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_mobile_number) }}</td>
                            </tr>
                            <tr>
                                <td>ইমেইল ঠিকানা</td>
                                <td>: {{ $fd6FormList->ngo_email_address }}</td>
                            </tr>
                            <tr>
                                <td>ওয়েবসাইট</td>
                                <td>: {{ $fd6FormList->ngo_website }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প নাম</td>
                                <td>: {{ $fd6FormList->ngo_prokolpo_name }}</td>
                            </tr>

                            <?php
                            $subjectIdList  = explode(",",$fd6FormList->subject_id);
                            $subjectListMain = DB::table('project_subjects')->whereIn('id',$subjectIdList)->select('name')
                            ->get();

                            ?>

                            <tr>
                                <td>প্রকল্পের বিষয়</td>
                                <td>:
                                     @foreach($subjectListMain as $key=>$subjectListMains)

                                     @if(count($subjectListMain) == 1 )

                                     {{ $subjectListMains->name }}

                                     @else

                                     @if(count($subjectListMain) == ($key+1))
                                     {{ $subjectListMains->name }} |

                                     @else

                                     {{ $subjectListMains->name }},

                                     @endif

                                     @endif

                                     @endforeach
                                </td>
                            </tr>


                            <tr>
                                <td>প্রকল্প মেয়াদ </td>
                                <td>: {{ $fd6FormList->ngo_prokolpo_duration }}</td>
                            </tr>
                            <tr>
                                <td>আরম্ভের তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_start_date) }}</td>
                            </tr>
                            <tr>
                                <td>সমাপ্তির তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->ngo_prokolpo_end_date) }}</td>
                            </tr>
                        </table>
                        <div class="form9_upper_box">
                            <h3>প্রকল্প এলাকা</h3>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>বিভাগ</th>
                                <th>জেলা/সিটি কর্পোরেশন</th>
                                <th>উপজেলা/থানা/পৌরসভা/ওয়ার্ড</th>
                                <th>প্রকল্পের ধরণ</th>
                                <th>বরাদ্দকৃত বাজেট</th>
                                <th>মোট উপকারভোগীর সংখ্যা</th>
                            </tr>
                            @foreach($prokolpoAreaList as $prokolpoAreaListAll)
                          @include('front.include.globalTableView')
                            @endforeach
                        </table>
                        <div class="form9_upper_box">
                            <h3>প্রাক্কলিক ব্যয় ও দাতা সংস্থার নাম : </h3>
                            <h4>প্রাক্কলিক ব্যয় (টাকায়) </h4>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>অর্থের উৎসের বিবরণ:</th>
                                <th>১ম বছর</th>
                                <th>২য় বছর</th>
                                <th>৩য় বছর</th>
                                <th>৪র্থ বছর</th>
                                <th>৫ম বছর</th>
                                <th>মোট</th>
                                <th>মন্তব্য</th>
                            </tr>
                            <tr>
                                <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি তাকে পরিবর্তিত)</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_first_year }}</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_second_year }}</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_third_year }}</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_fourth_year }}</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_fifth_year }}</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_total }}</td>
                                <td>{{ $fd6FormList->grants_received_from_abroad_comment }}</td>
                            </tr>
                            <tr>
                                <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান </td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_first_year }}</td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_second_year }}</td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_third_year }}</td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_fourth_year }}</td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_fifth_year }}</td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_total }}</td>
                                <td>{{ $fd6FormList->donations_made_by_foreign_donors_comment }}</td>
                            </tr>
                            <tr>
                                <td>৩.স্থানীয় অনুদান  (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</td>
                                <td>{{ $fd6FormList->local_grants_first_year }}</td>
                                <td>{{ $fd6FormList->local_grants_second_year }}</td>
                                <td>{{ $fd6FormList->local_grants_third_year }}</td>
                                <td>{{ $fd6FormList->local_grants_fourth_year }}</td>
                                <td>{{ $fd6FormList->local_grants_fifth_year }}</td>
                                <td>{{ $fd6FormList->local_grants_donors_total }}</td>
                                <td>{{ $fd6FormList->local_grants_donors_comment }}</td>
                            </tr>
                            <tr>
                                <td>মোট </td>
                                <td>{{ $fd6FormList->total_first_year }}</td>
                                <td>{{ $fd6FormList->total_second_year }}</td>
                                <td>{{ $fd6FormList->total_third_year }}</td>
                                <td>{{ $fd6FormList->total_fourth_year }}</td>
                                <td>{{ $fd6FormList->total_fifth_year }}</td>
                                <td>{{ $fd6FormList->total_donors_total }}</td>
                                <td>{{ $fd6FormList->total_donors_comment }}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <td>দাতা সংস্থার নাম</td>
                                <td>: {{ $fd6FormList->donor_organization_name }}</td>
                            </tr>
                            <tr>
                                <td>দাতা সংস্থার ঠিকানা </td>
                                <td>: {{ $fd6FormList->donor_organization_address }}</td>
                            </tr>
                            <tr>
                                <td>ফোন/মোবাইল/ইমেইল নম্বর </td>
                                <td>: {{ $fd6FormList->donor_organization_phone_mobile_email }}</td>
                            </tr>
                            <tr>
                                <td>ওয়েবসাইট</td>
                                <td>: {{ $fd6FormList->donor_organization_website }}</td>
                            </tr>
                            <tr>
                                <td>মানিলন্ডারিং এবং সন্ত্রাসে অর্থায়ন প্রতিরোধের নিমিত্ত</td>
                                <td>: {{ $fd6FormList->money_laundering_and_terrorist_financing }}</td>
                            </tr>
                        </table>
                        <div class="form9_upper_box">
                            <h3>প্রশাসনিক ব্যয় ও প্রকল্প ব্যায়ের অনুপাত:</h3>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>#</th>
                                <th>টাকার পরিমাণ</th>
                                <th>অনুপাত</th>
                            </tr>
                            <tr>
                                <td>প্রকল্প ব্যয়</td>
                                <td>{{ $fd6FormList->project_cost }}</td>
                                <td>{{ $fd6FormList->project_cost_ratio }}</td>
                            </tr>
                            <tr>
                                <td>প্রশাসনিক ব্যয়</td>
                                <td>{{ $fd6FormList->administrative_cost }}</td>
                                <td>{{ $fd6FormList->administrative_ratio }}</td>
                            </tr>
                            <tr>
                                <td>মোট</td>
                                <td>{{ $fd6FormList->project_and_administrative_cost }}</td>
                                <td>{{ $fd6FormList->project_and_administrative_cost_ratio }}</td>
                            </tr>
                        </table>
                        <div class="form9_upper_box">
                            <h3>প্রকল্প এলাকাসমূহে প্রকল্পের বিস্তারিত সাইনবোর্ড প্রদর্শন বিষয়ক তথ্যাদি :</h3>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>প্রকল্পের নাম  </td>
                                <td>: {{ $fd6FormList->project_name }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্পের মেয়াদকাল </td>
                                <td>: {{ $fd6FormList->duration_of_project }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্পের মোট বরাদ্দ </td>
                                <td>: {{ $fd6FormList->total_allocation_of_project }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প এলাকায় মোট বরাদ্দ </td>
                                <td>: {{ $fd6FormList->total_allocation_in_project_area }}</td>
                            </tr>
                            <tr>
                                <td> মোট উপকারভোগীর সংখ্যা </td>
                                <td>: {{ $fd6FormList->total_beneficiaries }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প এলাকায় মোট জনসংখ্যা </td>
                                <td>: {{ $fd6FormList->total_population_in_project_area }}</td>
                            </tr>
                            <tr>
                                <td>দাতা সংস্থার নাম</td>
                                <td>: {{ $fd6FormList->donor_organization_name_two }}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <td>প্রকল্প প্রস্তাব ফরম পিডিএফ /এফডি -৬ ফরম </td>
                                <td>: <a href="{{ route('ProjectProposalFormPdfDownload',$fd6FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="form9_upper_box">
                            <h3>এফডি -২ ফরম</h3>
                            <h4>অর্থছাড়ের আবেদন ফরম</h4>
                        </div>
                        <table class="table table-borderless">
                            <tr>
                                <td>সংস্থার নাম</td>
                                <td>: {{ $fd2FormList->ngo_name }}</td>
                            </tr>
                            <tr>
                                <td>সংস্থার ঠিকানা</td>
                                <td>: {{ $fd2FormList->ngo_address }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প নাম</td>
                                <td>: {{ $fd2FormList->ngo_prokolpo_name }}</td>
                            </tr>
                            <tr>
                                <td>কোন দেশীয় সংস্থা</td>
                                <td>: {{ $ngo_list_all->country_of_origin }}</td>
                            </tr>
                            <tr>
                                <td>প্রকল্প মেয়াদ </td>
                                <td>: {{ $fd2FormList->ngo_prokolpo_duration }}</td>
                            </tr>
                            <tr>
                                <td>আরম্ভের তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_start_date) }}</td>
                            </tr>
                            <tr>
                                <td>সমাপ্তির তারিখ </td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->ngo_prokolpo_end_date) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বাংলাদেশী টাকা )</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_bangladeshi_taka) }}</td>
                            </tr>
                            <tr>
                                <td>প্রস্তাবিত অর্থছাড়ের পরিমান (বৈদেশিক মুদ্রায় )</td>
                                <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd2FormList->proposed_rebate_amount_in_foreign_currency) }}</td>
                            </tr>
                            <tr>
                                <td>এফডি ২ ফর্ম উপলোড </td>
                                <td><a href="{{ route('fd2MainPdfDownload',$fd2FormList->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th>ফাইলের নাম</th>
                                <th>ফাইল</th>
                            </tr>
                            @foreach($fd2OtherInfo as $fd2OtherInfoAll)
                            <tr>
                                <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                <td><a href="{{ route('fd2PdfDownload',$fd2OtherInfoAll->id) }}" target="_blank" class="btn btn-success">View</a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

                        <!-- new code start --->

                        <div class="d-flex justify-content-between mt-3">
                            <div class="">


                            </div>
                            <div class="">



                                @if($fd6FormList->status == 'Ongoing' || $fd6FormList->status == 'Accepted')

                                                @else

                                                <button type="button" data-toggle="tooltip" data-placement="top" title="আবেদন এনজিওতে পাঠান" onclick="editTag({{ $fd6FormList->id}})" class="btn btn-lg btn-info">
                                                    এনজিও তে পাঠান  <i class="fa fa-send-o"></i>
                                                </button>

                                                    <form id="delete-form-{{ $fd6FormList->id }}" action="{{ route('finalFdSixApplicationSubmit',base64_encode($fd6FormList->id)) }}" method="get" style="display: none;">

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
