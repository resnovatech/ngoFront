@extends('front.master.master')

@section('title')
{{ trans('fd9.fc2')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')
<style>

    .alertify .ajs-body .ajs-content {
        font-weight: bolder;
        color:red;
        font-size: 20px;
    }

    .alertify .ajs-header{

        color:red;
        font-size: 20px;

    }

    .alertify .ajs-footer .ajs-buttons .ajs-button{

        background-color: #006A4E;
        color: #fff;

    }

</style>
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
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li class="active visited">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফসি - ২ </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফসি -২ ফরম</h3>
                                        <h4>ব্যক্তি কর্তৃক বৈদেশিক অনুদানে গৃহীত প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fc2Form.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf

                                    <input type="hidden" id="fcOneId" value="{{ $fd6Id }}"/>

                                    <input type="hidden" id="tableCountTwo" value="{{ count($SDGDevelopmentGoal) }}"/>
                                    <input type="hidden" id="tableCountOne" value="{{ count($sectorWiseExpenditureList) }}"/>


                                     <!-- step one start -->

                                     <div class="row">
                                        <div class="col-lg-12 col-sm-12">


                                            <table class="table table-bordered" style="width:100%">

                                              <!-- step one start  -->

                                                <tr>
                                                    <th style="text-align: center;" rowspan="6">৯.</th>

                                                    <td style="font-weight:bold;" colspan="2"><span style="font-weight:bold;">বাজেট<br>
                                                        ক.খাতভিত্তিক ব্যয় বিভাজন </span></td>
                                                    <td> <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal1" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div></td>

                                                </tr>
                                                <tr>

                                                    {{-- <td style="text-align: center;">ক.</td> --}}
                                                    <td colspan="3" rowspan="3">

                                                        <div class="table-responsive" id="tableAjaxDatapro">

                                                    @include('front.fc2Form.fc1FormStepTwoBudget')
                                                        </div>



                                                </span>


                                            </td>


                                                </tr>

                                                <tr>

                                                </tr>
                                                <tr>

                                                </tr>
                                                <tr>

                                                    <td style="font-weight:bold;" colspan="2"><span style="font-weight:bold;">
                                                        খ.টেকসই উন্নয়ন অভিষ্ঠ (এসডিজি ) এর সাথে সম্পৃক্ততা</span></td>

                                                        <td> <div class="d-flex justify-content-between ">
                                                            <div class="p-2">


                                                            </div>
                                                            <div class="p-2">
                                                                <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                                     যুক্ত করুন
                                                                </button>
                                                            </div>
                                                        </div></td>
                                                </tr>

                                                <tr>

                                                    <td colspan="3">

                                                        <div class="table-responsive" id="tableAjaxDataSDG">
                                            @include('front.fc2Form.fc1FormStepTwoSDG')
                                                        </div>
                                                    </td>

                                                </tr>




                                                <!-- step three end -->



                                            </table>




                                        </div>

                                    </div>
                                    <!-- step one end --->

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <a href="{{ route('fc2Form.edit',base64_encode($fd6Id)) }}" class="btn btn-danger"
                                                >পূর্ববর্তী পৃষ্ঠায় যান
                                    </a>
                                        <a id="finalStepToThree"  style="margin-left:10px;" class="btn btn-registration"
                                                >দাখিল করুন 
                                </a>
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




<!--modal-->
@include('front.fc2Form._partial.stepTwoSDGModal')
@include('front.fc2Form._partial.stepTwoBudgetModal')
<!-- end modal -->


@endsection

@section('script')
@include('front.fc2Form._partial.script')
@include('front.include.globalScript')
@endsection
