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
                                <div class="col-lg-7 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>বার্ষিক প্রতিবেদন </h1>
                                        @include('flash_message')
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-12">
                                    <div class="d-grid d-md-flex justify-content-end">


                                        <?php


$getPendingData = DB::table('form_no_fives')->where('fd_one_form_id',$ngo_list_all->id )->latest()->value('status');



                                        ?>


       @if($getPendingData == 'Ongoing1' || $getPendingData == 'Review1' )

       <button type="button" disabled class="btn btn-registration"
                                                onclick="location.href = '{{ route('formNoFive.create') }}';">নতুন ফরম যোগ করুন
                                        </button>

       @else


                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('formNoFive.create') }}';">নতুন ফরম যোগ করুন
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if(count($formNoFiveList) == 0)
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>কোন তালিকা নেই</h5>
                                </div>
                            </div>
                            @else
                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">বার্ষিক প্রতিবেদনের তালিকা</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্র : নং :</th>
                                        <th>প্রকল্পের নাম</th>
                                        {{-- <th>প্রকল্পের বিষয়</th> --}}
                                        <th>প্রকল্পের মোট মেয়াদকাল</th>
                                        <th>প্রতিবেদনকাল (প্রকল্প বর্ষ)</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>কর্ম পরিকল্পনা</th>
                                    </tr>
                                    @foreach($formNoFiveList as $key=>$formNoFiveListAll)
                                    <tr>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                        <td>{{ $formNoFiveListAll->prokolpo_name }}</td>
                                        {{-- <td>{{ $formNoFiveListAll->prokolpo_subject}}</td> --}}
                                        <td>{{ $formNoFiveListAll->prokolpo_duration}}</td>
                                        <td>{{ $formNoFiveListAll->report_year }}</td>
                                        <td>



                                            @if($formNoFiveListAll->status  == "Review")
                                            <span class="text-danger">you have not submit yet,review your data and submit to ngo </span>

                                            @else


                                            <span class="text-success">{{ $formNoFiveListAll->status }}</span>
                                            @endif



                                        </td>
                                        <td>
                                            @if(  $formNoFiveListAll->status == 'Ongoing' || $formNoFiveListAll->status == 'Accepted')

                                            @else
                                            <a  href="{{ route('formNoFive.edit',base64_encode($formNoFiveListAll->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
@endif
                                            @if($formNoFiveListAll->status == 'Ongoing' || $formNoFiveListAll->status == 'Review')

                                            <a  href="{{ route('formNoFive.show',base64_encode($formNoFiveListAll->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>
                                            @else

                                            <a  href="{{ route('formNoFive.show',base64_encode($formNoFiveListAll->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>
                                            <button type="button" onclick="deleteTag({{ $formNoFiveListAll->id}})" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-trash"></i></button>

                                                <form id="delete-form-{{ $formNoFiveListAll->id }}" action="{{ route('formNoFive.destroy',$formNoFiveListAll->id) }}" method="POST" style="display: none;">

                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                                @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>


@endsection
