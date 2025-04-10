@extends('front.master.master')

@section('title')
{{ trans('fd9.fd09formone')}}| {{ trans('header.ngo_ab')}}
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
                                        <h1>বিদেশী বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবকের ওয়ার্ক পারমিটের (পারমিট) জন্য আবেদনপত্র</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">

                                <div class="card-body">
                                    <form method="post" action="{{ route('fdNineOneForm.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                    <div class="form9_upper_box">
                                        <h3>এফডি-৯(১) ফরম</h3>
                                        <h4>বিদেশি বিশেষজ্ঞ, উপদেষ্টা, কর্মকর্তা বা স্বেচ্ছাসেবী এর ওয়ার্ক পারমিটের
                                            (কার্যানুমতি) আবেদন ফরম</h4>

                                        <div>
                                            <p>বরাবর <br>
                                                মহাপরিচালক <br>
                                                এনজিও বিষয় ব্যুরো <br>
                                                প্রধানমন্ত্রীর কার্যালয়</p>
                                            <p>বিষয়: সংস্থার বিদেশি বিশেষজ্ঞউপদেষ্টা/কর্মকর্ত/সেচ্ছাসেবী “<span style="color:red;">*</span><input
                                                        type="text" class="form-control custom-form" name="foreigner_name_for_subject" required> ”' এর ওয়ার্ক পারমিট প্রসঙ্গে।
                                            </p>
                                            <p>
                                                সূত্র: এনজিও বিষয়ক ব্যুরোর স্মারক নম্বর
                                                <span style="color:red;">*</span><input type="text" class="form-control custom-form" name="sarok_number" id="" placeholder="" required> তারিখ <span style="color:red;">*</span><input type="text" class="form-control custom-form datepickerOne" id="" required  ="" name="application_date">
                                            </p>

                                            <p class="mt-3">
                                                উপর্যুক্ত বিষয় ও সূত্রের বরাতে <span style="color:red;">*</span>
                                                @if(session()->get('locale') == 'en' || empty(session()->get('locale')))
                                                <input type="text" value="{{ $ngo_list_all->organization_name_ban }}" name="institute_name" required class="form-control custom-form"
                                                                                      id="" placeholder="">
                                                                                      @else
                                                                                      <input type="text" value="{{ $ngo_list_all->organization_name }}" name="institute_name" required class="form-control custom-form"
                                                                                      id="" placeholder="">
                                                                                      @endif


                                                                                      সংস্থার
                                                <span style="color:red;">*</span><input type="text" name="prokolpo_name" required class="form-control custom-form" id="" placeholder=""> প্রকল্পের
                                                আওতায় <span style="color:red;">*</span><input type="text" class="form-control custom-form" required name="designation_name" id="" placeholder="">
                                                হিসেবে বিদেশী বিশেষজ্ঞ/ উপদেষ্টা/কর্মকর্তা/স্বেচ্ছাসেবী<span style="color:red;">*</span> <input
                                                        type="text" class="form-control custom-form" required name="foreigner_name_for_body" id="" placeholder=""> কে <span style="color:red;">*</span><input
                                                        type="text" class="form-control datepickerOne custom-form" required name="expire_from_date" id="" placeholder=""> খ্রি: হতে
                                                        <span style="color:red;">*</span><input
                                                        type="text" class="form-control datepickerOne custom-form" required name="expire_to_date" id="" placeholder=""> পর্যন্ত সময়ের জন্য নিয়োগ করা হয়েছে। সংস্থার অনুকূলে উক্ত ব্যাক্তির
                                                অনুমোদিত সময়ের জন্য ওয়ার্ক পারমিট ইস্যু করার জন্য ওয়ার্ক পারমিট ইস্যু
                                                করার জন্য একসাথে নিম্ন বর্ণিত কাগজপত্র সংযুক্ত করা হল:
                                            </p>

                                            <table class="table table-bordered" style="width:100%">

                                                <tr>
                                                    <th style="text-align: center;width: 8%">ক্র: নং:</th>
                                                    <th style="text-align: center; width: 25%">বিবরণ</th>
                                                    <th style="text-align: center;">তথ্যাদি</th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" >১.</th>
                                                    <th>নিয়োগপত্র সত্যায়ন প্রমাণক <span style="color:red;">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></th>
                                                    <th style="text-align: center;"><input type="file" name="attestation_of_appointment_letter" accept="application/pdf" class="form-control custom-form"
                                                        id="fdNineOnePdf1" required placeholder="">
                                                        <p id="fdNineOnePdf1_text" class="text-danger mt-2" style="font-size:12px;"></p></th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" >২.</th>
                                                    <th>ফর্ম ৯ এর কপি<span style="color:red;">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></th>
                                                    <th style="text-align: center;"><input type="file" name="copy_of_form_nine" required accept="application/pdf"class="form-control custom-form"
                                                        id="fdNineOnePdf2" placeholder="">
                                                        <p id="fdNineOnePdf2_text" class="text-danger mt-2" style="font-size:12px;"></p></th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;" >৩.</th>
                                                    <th>ছবি <span style="color:red;">*</span><span class="text-danger" style="font-size: 12px;">(Maximum 200 KB & Image Format:PNG)</span></th>
                                                    <th style="text-align: center;"> <input type="file" accept="image/png" name="foreigner_image" class="form-control custom-form"
                                                        id="fdNineOnePdf3" placeholder="">
                                                        <p id="fdNineOnePdf3_text" class="text-danger mt-2" style="font-size:12px;"></p></th>

                                                </tr>

                                                <tr>
                                                    <th style="text-align: center;">৪.</th>
                                                    <th>এন ভিসা নিয়ে আগমনের তারিখ (প্রমানসহ) <span style="color:red;">*</span> <span class="text-danger" style="font-size: 12px;">(Maximum 500 KB)</span></th>
                                                    <th style="text-align: center;">
                                                        <input type="text" required name="arrival_date_in_nvisa"  class="form-control datepickerOne custom-form"
                                                        id="" placeholder="">
                                                        <input required type="file" accept="application/pdf" name="copy_of_nvisa" class="form-control custom-form mt-3"
                                                        id="fdNineOnePdf4" placeholder="">

                                                        <p id="fdNineOnePdf4_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                                    </th>

                                                </tr>

                                            </table>

                                            <p class="mb-3">এমতবস্থায়, অত্র সংস্থার উল্লেখিত পদে <span><span style="color:red;">*</span><input type="text" required name="proposed_from_date" class="datepickerOne form-control custom-form"
                                                id="" placeholder=""></span> হতে <span><span style="color:red;">*</span><input type="text" required name="proposed_to_date" class="datepickerOne  form-control custom-form"
                                                    id="" placeholder=""></span> মেয়াদে উক্ত বিদেশি কর্মকর্তাকে ওয়ার্ক পারমিট ইস্যু করার জন্য বিনীত অনুরধ করেছি।</p>
                                        </div>
                                    </div>

                                                                        <!--new code for ngo-->
                                                                        @include('front.include.globalSign')
    <!-- end new code -->

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-registration"
                                                >তথ্য জমা দিন
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
    </div>
</section>

<!-- modal start --->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">{{ trans('oldorg.digiSign')}}</h5>

            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--  modal end -->
@endsection
@section('script')
@include('front.zoomButtonImage')
@endsection
