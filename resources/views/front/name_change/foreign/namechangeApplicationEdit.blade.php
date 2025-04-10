@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
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
                @include('flash_message')
                <div class="card">
                    <div class="card-body">
                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                <li class="active ">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>নতুন নাম</p>

                                </li>

                                <li>
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>নথিপত্র</p>

                                </li>
                            </ul>
                        </div>

                        <div class="card">
                            <div class="card-header">
                               এনজিওর নতুন নাম
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('namechangeApplicationUpdate') }}" id="form">
                                    @csrf
                                     <input type="hidden" value="{{ $name_change_list_all->id }}" name="id">

                                    <div class=" mb-3">
                                        <label for="" class="form-label">পুরাতন  নাম (English)</label>
                                        <input type="text" value="{{ $ngo_list_all->organization_name }}" name="previous_name" class="form-control" id="" readonly>
                                    </div>

                                    <div class=" mb-3">
                                        <label for="" class="form-label">পুরাতন নাম (বাংলা)</label>
                                        <input type="text" value="{{ $ngo_list_all->organization_name_ban }}" name="previous_name_ban" class="form-control" id="" readonly>
                                    </div>


                                  <?php

                                  $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
                                  $users = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormId)->value('present_name_eng');
                                  $users1 = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormId)->value('present_name_ban');
                                  ?>


                                    <div class=" mb-3">
                                        <label for="" class="form-label">নতুন নাম (English)</label>
                                        <input type="text" required value="{{ $name_change_list_all->present_name_eng }}" name="new_name" class="form-control" id="">
                                    </div>


                                    <div class=" mb-3">
                                        <label for="" class="form-label">নতুন নাম (বাংলা)</label>
                                        <input type="text" required value="{{ $name_change_list_all->present_name_ban }}"  name="new_name_ban" class="form-control" id="">
                                    </div>
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
                                               >পরবর্তী ধাপ
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

</section>

@endsection

@section('script')

@endsection
