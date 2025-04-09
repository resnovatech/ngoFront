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
$name_change_list = DB::table('fd_five_forms')->where('fdId',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="d-grid d-md-flex justify-content-end">

                                        @if($name_change_list == 'Ongoing1' || $name_change_list == '1Review')

                                        <button type="button" disabled  class="btn btn-registration"
                                        onclick="location.href = '{{ route('fdFiveForm.create') }}';">আবেদন ফরম তৈরি করুন
                                </button>

                                        @else

                                        <button type="button"  class="btn btn-registration"
                                        onclick="location.href = '{{ route('fdFiveForm.create') }}';">আবেদন ফরম তৈরি করুন
                                </button>
@endif

                                    </div>
                                </div>
                            </div>
                            @if(count($fdFiveForm) == 0)
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/front/assets/img/icon/no-results%20(1).png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম নেই</h5>
                                </div>
                            </div>
                            @else



                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম তালিকা</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্রমিক নং </th>

                                        <th>এনজিও'র নাম</th>
                                        <th>তারিখ</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>কার্যকলাপ </th>
                                    </tr>

                                    @foreach($fdFiveForm as $key=>$fd6FormListAll)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $ngoListAll->organization_name }}</td>


                                        <td>{{ $fd6FormListAll->created_at }} <b></td>
                                        <td><span class="text-success">{{ $fd6FormListAll->status }}</span></td>
                                        <td>


                                            @if($fd6FormListAll->status  == 'Ongoing' || $fd6FormListAll->status  == 'Accepted' )
@else
                                            <a  href="{{ route('fdFiveForm.edit',base64_encode($fd6FormListAll->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>


@endif
<a  href="{{ route('fdFiveForm.show',base64_encode($fd6FormListAll->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                            @endif
                            <div class="name_change_instruction mt-5">
                                {{-- <div class="others_inner_section mb-3">
                                    <h1>ডুপ্লিকেট সনদপত্র আবেদনের নির্দেশনা </h1>
                                    <div class="notice_underline"></div>
                                </div>
                                <ul class="nav nav-tabs custom_tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tofban">তফসিল ০৫</a>
                                    </li>

                                </ul> --}}

                                <!-- Tab panes -->
                                {{-- <div class="tab-content custom_tab_content">
                                    <div class="tab-pane container active" id="tofban">
                                        <h5>৫.৩ ডুপ্লিকেট সনদপত্রের জন্য প্রয়োজনীয় কাগজপত্রাদিঃ
                                        </h5>
                                        <table class="table table-borderless instruction_table">
                                            <tr>
                                                <td>ক)</td>
                                                <td>'নিবদ্ধন/নবায়নের 'ডুপ্লিকেট' সনদ প্রাপ্তির জন্য আবেদন ফি বাবদ-১৩,০০০/-(তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০-১৮৩৬) চালানের কপি এবং ১৫%
                                                    ভ্যাট (কোড নং-১-১১৩৩-০০৩৫-০৩১১)-প্রদানপূর্বক চালানের মুলকপিসহ</td>
                                            </tr>
                                            <tr>
                                                <td>খ)</td>
                                                <td>০২টি জাতীয় পত্রিকায় (হারানো বা চুরি হওয়ার ক্ষেত্রে) বিজ্ঞাপনের (মূলকপিসহ) কপি</td>
                                            </tr>
                                            <tr>
                                                <td>গ)</td>
                                                <td>হারানো বা চুরি হওয়ার ক্ষেত্রে সংশ্লিষ্ট জেলা/উপজেলার থানায় দাখিলকৃত ডায়েরির (জিডি'র) কপি</td>
                                            </tr>
                                            <tr>
                                                <td>ঘ)</td>
                                                <td>সনদপত্রের 'ডুপ্লিকেট' কপির জন্য নির্বাহী কমিটির সভার সত্যায়িত কার্যবিবরণীর (উপস্থিত সদস্যদের হাজিরাসহ) কপি।</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div> --}}
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
