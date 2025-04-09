@extends('front.master.master')

@section('title')
বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম | {{ trans('header.ngo_ab')}}
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
$name_change_list = DB::table('document_for_duplicate_certificates')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">

                        <div class="form9_upper_box">
                            <h3>এফডি - ৫ ফরম</h3>
                            <h4 style="font-weight:bold;">বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম </h4>
                        </div>

                        <form method="post" action="{{ route('fdFiveForm.store') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <input type=""

                            <div class="row">



                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">এনজিও'র নাম <span class="text-danger">*</span></label>


                                    @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                            <input type="text" readonly name="ngo_name" value="{{ $ngoListAll->organization_name_ban }}" class="form-control" id=""
                            placeholder="">

                            @else


                            <input type="text" readonly name="ngo_name" value="{{ $ngoListAll->organization_name }}" class="form-control" id=""
                            placeholder="">


                            @endif



                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">সংস্থার ঠিকানা <span class="text-danger">*</span></label>
                                    <input type="text" readonly name="ngo_address" class="form-control" value="{{ $ngoListAll->organization_address }}" id=""
                                           placeholder="">
                                </div>

                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">টেলিফোন <span class="text-danger">*</span></label>
                                    <input type="text" readonly name="ngo_telephone_number" value="{{ $ngoListAll->tele_phone_number }}" class="form-control" id=""
                                           placeholder="">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">মোবাইল নম্বর <span class="text-danger">*</span></label>
                                    <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    type = "number" readonly required
                                    maxlength = "11"  minlength="11"  data-parsley-trigger=“keyup” name="ngo_mobile_number" value="{{ $ngoListAll->phone }}" class="form-control" id=""
                                           placeholder="">
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">ইমেইল ঠিকানা <span class="text-danger">*</span></label>
                                    <input type="text" readonly name="ngo_email" class="form-control" id=""
                                           placeholder="" value="{{ $ngoListAll->email }}">
                                </div>

                                @if(empty($ngoListAll->web_site_name))
                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">ওয়েবসাইট</label>
                                    <input type="text" readonly value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                           placeholder="">
                                </div>
                                @else
                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label">ওয়েবসাইট </label>
                                    <input type="text" readonly value="{{ $ngoListAll->web_site_name }}" name="ngo_website" class="form-control" id=""
                                           placeholder="">
                                </div>

                                @endif
                            </div>

                            <div class="card mb-3">
                                <div class="card-header">
                                    বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম  এর পিডিএফ <span class="text-danger">*</span>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <input class="form-control" data-parsley-required accept=".pdf" name="file_one" type="file" id="">
                                        </div>
                                    </div>
                                </div>
                            </div>









                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration"
                                        >যুক্ত করুন
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
