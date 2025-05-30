@extends('front.master.master')

@section('title')
{{ trans('fdFourFormOne.fdFourOneForm')}} | {{ trans('header.ngo_ab')}}
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
                                        <h1>সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদন</h1>
                                        @include('flash_message')
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm-12">

                                    <?php
                                    $fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
                                    $name_change_list = DB::table('fd_four_forms')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




                                                ?>

@if($name_change_list == 'Ongoing1' || $name_change_list == '1Review')

<div class="d-grid d-md-flex justify-content-end">
    <button type="button" disabled class="btn btn-registration"
            onclick="location.href = '{{ route('fdFourOneForm.create') }}';">নতুন ফরম যোগ করুন
    </button>
</div>

@else
                                    <div class="d-grid d-md-flex justify-content-end">
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('fdFourOneForm.create') }}';">নতুন ফরম যোগ করুন
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            @if(count($fdFourOneFormList) == 0)
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
                                <h5 class="pb-3">সিএ ফার্ম কতৃক প্রদেয় প্রতিবেদনের তালিকা</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্র : নং :</th>
                                        <th>সংস্থার নাম</th>
                                        <th>প্রকল্পের নাম</th>

                                        <th>স্ট্যাটাস</th>
                                        <th>কর্ম পরিকল্পনা</th>
                                    </tr>
                                    @foreach($fdFourOneFormList as $key=>$fdFourOneFormListAll)
                                    <tr>
                                        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                        <td>{{ $ngo_list_all->organization_name_ban }}</td>
                                        <td>{{ $fdFourOneFormListAll->prokolpo_name}}</td>

                                        <td><span class="text-success">{{ $fdFourOneFormListAll->status }}</span></td>
                                        <td>

                                            @if(  $fdFourOneFormListAll->status == 'Ongoing' || $fdFourOneFormListAll->status == 'Accepted')

                                            @else

                                            <a  href="{{ route('fdFourOneForm.edit',base64_encode($fdFourOneFormListAll->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>

                                            @endif
                                            <a  href="{{ route('fdFourOneForm.show',base64_encode($fdFourOneFormListAll->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>


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
