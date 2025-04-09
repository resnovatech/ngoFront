@extends('front.master.master')

@section('title')
{{ trans('fd9.fd6')}} | {{ trans('header.ngo_ab')}}
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
<style>
    .ui-widget.ui-widget-content {
    top: 160px !important;
    }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
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
                                    <li class="active ">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৬</p>
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
                                        <h1>প্রকল্প প্রস্তাব ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফডি - ৬ ফরম </h3>
                                        <h4>প্রকল্প প্রস্তাব ফরম</h4>
                                    </div>

                                    <form action="{{ route('fd6StepFiveMainPost') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        <input type="hidden" name="fd6Id" id="fd6Id" value="{{ $fd6Id }}"/>
                                        <input type="hidden" id="expenseId" value="1"/>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">
  <!--FD06 Section Shonglognni Umo-->

  <tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ঙ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">সমাপ্ত অনুরূপ প্রকল্পের অর্জন
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="2"> প্রকল্পের নাম</td>
    <td>
        <input class="form-control" name="prokolpo_name" type="text"
               placeholder="প্রকল্পের নাম   ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="2"> প্রকল্পের মেয়াদ</td>
    <td>
        <input class="form-control" name="prokolpo_duration" type="text"
               placeholder="প্রকল্পের মেয়াদ   ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="2">এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ</td>
    <td>


               <div id="datepicker123" class="input-group date" data-date-format="mm-dd-yyyy">
                <input class="form-control" name="ngo_permission_date" type="text" readonly placeholder="এনজিও বিষয়ক ব্যুরোর অনুমোদন ও তারিখ"/>
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            </div>

    </td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2"> প্রকল্প মূল্য</td>
    <td>
        <input class="form-control" name="prokolpo_price" type="text"
               placeholder="প্রকল্প মূল্য ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৫)</td>
    <td colspan="2"> প্রকল্পের অডিট ও সমাপনী প্রতিবেদন দাখিল ও গ্রহণের
        প্রমাণক
    </td>
    <td>

        <div class="col-md-12">
            <label>প্রকল্পের অডিট প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক</label>
            <input class="form-control" accept=".pdf" name="prokolpo_audit_report" type="file"
                   placeholder="প্রকল্পের অডিট প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক">
        </div>

        <div class="col-md-12 mt-5">
            <label>প্রকল্পের সমাপনী প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক</label>
            <input class="form-control" accept=".pdf" name="prokolpo_final_report" type="file"
            placeholder="প্রকল্পের সমাপনী প্রতিবেদন দাখিল ও গ্রহণের প্রমাণক">
        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৬)</td>
    <td colspan="2">স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক</td>
    <td>
        <input class="form-control" type="file" accept=".pdf" name="prokolpo_local_audit_report"
               placeholder=" স্থানীয় প্রশাসনের প্রত্যয়নপত্র দাখিলের প্রমাণক ">
    </td>
</tr>
<tr>
    <td style="width:40px;">০৭)</td>
    <td colspan="2">অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক</td>
    <td>
        <input class="form-control" name="development_detail" type="text"
               placeholder=" অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক ">
    </td>
</tr>
<tr>
    <td colspan="4">

        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#formSixModal">বিস্তারিত তথ্য যুক্ত করুন
        </a>
        </div>
        <div class="table-reponsive" id="tableAjaxDataFormSix">
      @include('front.fd6Form.partTwo.detailsOfForm6DataTable')
        </div>
    </td>
</tr>

<!--FD06 Section Shonglognni Ca-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’চ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">

        <div class="d-flex justify-content-between">
            <div>উপকরণের বিস্তারিত বর্ণনা (প্রযোজ্যক্ষেত্রে) <br>
                অফিস যন্ত্রপাতি, মেশিনপত্র ও যানবাহন।</div>
            <div>
            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#adjoiningfModal">বিস্তারিত তথ্য যুক্ত করুন
        </a>
    </div>
        </div>
    </td>
</tr>

<tr>
    <td style="width:40px;">০১)</td>
    <td colspan="3"> আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা :</td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="adjoiningSixDataTable">
          @include('front.fd6Form.partTwo.adjoiningSixDataTable')
        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০২)</td>
    <td colspan="3">  মেশিনপত্রের বর্ণনা </td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="descriptionOfMachineryTable">
            @include('front.fd6Form.partTwo.descriptionOfMachineryTable')

        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৩)</td>
    <td colspan="3">  যানবাহনের বর্ণনা </td>
</tr>
<tr>
    <td colspan="4">
        <div class="table-reponsive" id="descriptionOfVehicle">
            @include('front.fd6Form.partTwo.descriptionOfVehicle')
        </div>
    </td>
</tr>
<tr>
    <td style="width:40px;">০৪)</td>
    <td colspan="2">প্রকল্প সমাপ্ত হওয়ার পরে এই অফিস যন্ত্রপাতি, মেশিনপত্র এবং যানবাহনগুলো কিভাবে ব্যবহার হবে সেই বিষয়ে বর্ণনা :</td>
    <td>
        <input class="form-control" name="after_end_prokolpo" accept=".pdf" type="file"
               placeholder=" অর্থ-সামাজিক উন্নয়নে অর্জিত প্রভাবক ">
    </td>
</tr>

<!--FD06 Section Shonglognni Cha-->

<tr>
    <td colspan="4">
        <h3 class="text-center mt-2">সংলগ্নী ‘’ছ’’</h3>
    </td>
</tr>

<tr>
    <td colspan="4">প্রশিক্ষণ, সেমিনার, ওয়ার্কশপ ও কনফারেন্সের সম্ভাব্য দিনপুঞ্জি
    </td>
</tr>
<tr>
    <td colspan="4">
        <div class="d-flex justify-content-end">
            <a class="btn btn-sm btn-custom mb-3" data-bs-toggle="modal"
                    data-bs-target="#Dinpunjji">নতুন
                দিনপুঞ্জি
                যুক্ত করুন
        </a>
        </div>
        <div class="table-reponsive" id="dinpunjjiTable">
        @include('front.fd6Form.partTwo.dinpunjjiTable')
        </div>

        <div class="mb-3 col-lg-12 mt-3">

            <div class="card">

                <div class="card-header">
                    সংস্থা প্রধানের  তথ্যাদি

                </div>
                <div class="card-body">

                      <!--new code for ngo-->
                      @include('front.include.globalSign')
            <!-- end new code -->

                </div>
            </div>



        </div>
    </td>
</tr>
                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">

                                        <a href="{{ route('fd6Form.edit',base64_encode($fd6Id)) }}" class="btn btn-danger"
                                        >পূর্ববর্তী পৃষ্ঠায় যান
                                     </a>

                                        <button type="submit" style="margin-left:10px;"  class="btn btn-registration"
                                                >দাখিল করুন 
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
@include('front.fd6Form._partial.formSixNgoModal')
@include('front.fd6Form._partial.adjoiningfModal')
@include('front.fd6Form._partial.dinpunjjiModal')

@endsection

@section('script')
@include('front.zoomButtonImage')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script>
    $(function () {
  $("#datepicker123").datepicker({
        autoclose: false,
        todayHighlight: true
  }).datepicker('update', new Date());
});
$(function () {
  $("#datepicker321").datepicker({
        autoclose: true,
        todayHighlight: true
  }).datepicker('update', new Date());
});
</script>
@include('front.fd6Form._partial.scriptPartTwo')
@endsection
