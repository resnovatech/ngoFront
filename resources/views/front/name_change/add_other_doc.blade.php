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




                <div class="card">








                    <div class="card-body">

                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                <li >
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>নতুন নাম</p>

                                </li>

                                <li class="active ">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>নথিপত্র</p>

                                </li>
                            </ul>
                        </div>


                        <div class="committee_container">
                            <h5 class="mb-4">এনজিও নথি </h5>
                            <form method="post" action="{{ route('storeOtherDoc') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                @csrf
                                @if($mainNgoType == 'Foreign')
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ০২ টি জাতীয় পত্রিকায় (বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন ফি বাবদ- ২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% (কোড নং -১-১১৩৩-০০৩৫-০৩১১) জমাপূর্বক চালানের মূলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস/ বোর্ড অব ট্রাস্টির তালিকা (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন বিষয়ে সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস/ বোর্ড অব ট্রাস্টির সিদ্ধান্তের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        ৩০০/-(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংস্থার পরিবর্তিত নামের সনদপত্র/ ইনকর্পোরেট সার্টিফিকেট (সংশ্লিষ্ট দেশের নোটারীকৃত মূলকপি ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংস্থার পরিবর্তিত নামের বাই লজ (By laws)/ গঠনতন্ত্রের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত মূলকপিসহ ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সংস্থার পূর্ববর্তী নামের সকল দায় -দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অঙ্গীকার নামা (সংস্থার প্রধান কতৃক স্বাক্ষরিত ) <span class="text-danger">*</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header">
                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
জমাপূর্বক চালানের মুলকপিসহ
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control"  accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @else


                                <div class="card mb-3">
                                    <div class="card-header">
                                        ০২ টি জাতীয় পত্রিকায় ( বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange1">

                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange1_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন ফি বাবদ- ২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange2">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange2_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class="card mb-3">
                                    <div class="card-header">
                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ফরম -৮ মোতাবেক নির্বাহী কমিটির তালিকা <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange3">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange3_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card mb-3">
                                    <div class="card-header">
                                        নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট সাইজের ছবি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 5 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange4">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange4_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card mb-3">
                                    <div class="card-header">
                                        ৩০০/- (তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange5">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange5_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange6">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange6_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি <span class="text-danger">*</span>

                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange7">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange7_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange8">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange8_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        সর্বশেষ সাধারণ সদস্যদের তালিকা <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange9">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange9_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-header">
                                        নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কার্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange10">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange10_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)। <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange11">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange11_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        দাখিলকৃত চালানের উপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকপিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১) <span class="text-danger">*</span>
                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control" data-parsley-required accept=".pdf" name="primary_portal[]" type="file" id="localNameChange12">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange12_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header">
                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন/নাম পরিবর্তন/গঠনতন্ত্রের যে কোন ধারা পরিবর্তনের বিষয়ে দাখিলকৃত ফি এর উপর ১৫% বকেয়া ভ্যাট (যদি ইতোমধ্যে প্রদান না করা হয়ে থাকে) সংশ্লিষ্ট কোডে জমাপূর্বক চালানের মুলকপিসহ

                                        <span class="text-light" style="font-size: 12px;">(Maximum 1 MB)</span>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <input class="form-control"  accept=".pdf" name="primary_portal[]" type="file" id="localNameChange13">
                                                <p class="text-danger mt-2" style="font-size:12px;" id="localNameChange13_text"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary"
                                        >পিছনে যান
                            </a>

                                    <button type="submit" style="margin-left: 10px;" class="btn btn-registration"
                                            >যুক্ত করুন
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

@endsection
