@extends('front.master.master')

@section('title')
বিদেশ থেকে প্রাপ্ত জিনিসপত্র /দ্রব্যসামগ্র্রীর সংরক্ষণ সংক্রান্ত ফরম | {{ trans('header.ngo_ab')}}
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

                            <input type="hidden" id="mainEditId" value="0"/>
                            <input type="hidden" id="receivedId" value="0"/>
                            <input type="hidden" id="receivedUsedId" value="0"/>

                            <div class="row">
                                <div class="col-lg-12 col-sm-12">


                                    <table class="table table-bordered" style="width:100%">

                                        <tr>
                                            <th style="text-align: center;">ক্র: নং:</th>
                                            <th style="text-align: center; width: 25%">বিবরণ</th>
                                            <th style="text-align: center;">তথ্যাদি</th>

                                        </tr>

                                        <tr>
                                            <th style="text-align: center;" >(০১)</th>
                                            <th>এনজিও সংক্রান্ত তথ্য <span style="text-align: center;">(০২)</span></th>
                                            <th style="text-align: center;">(০৩)</th>

                                        </tr>

                                        <tr>
                                            <th style="text-align: center;">১.</th>
                                            <td style="text-align: center;">সংস্থার নাম, ঠিকানা (টেলিফোন ,মোবাইল, ইমেইল ও ওয়েবসাইটসহ) <span style="color:red;">*</span>:</td>
                                            <th style="text-align: center;">
                                                <div class="row">



                                                    <div class="mb-3 col-lg-12">



                                                        @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngoListAll->organization_name_ban }}" class="form-control" id=""
                                                placeholder="">

                                                @else


                                                <input type="text" placeholder="এনজিও'র নাম" required name="ngo_name" value="{{ $ngoListAll->organization_name }}" class="form-control" id=""
                                                placeholder="">


                                                @endif



                                                    </div>
                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" placeholder="সংস্থার ঠিকানা" required name="ngo_address" class="form-control" value="{{ $ngoListAll->organization_address }}" id=""
                                                               >
                                                    </div>

                                                    <div class="mb-3 col-lg-12">

                                                        <input type="text" placeholder="টেলিফোন" required name="ngo_telephone_number" value="{{ $ngoListAll->tele_phone_number }}" class="form-control" id=""
                                                               >
                                                    </div>
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="মোবাইল নম্বর" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                        type = "number" required
                                                        maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="ngo_mobile_number" value="{{ $ngoListAll->phone }}" class="form-control" id=""
                                                              >
                                                    </div>
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="ইমেইল ঠিকানা" type="text" required name="ngo_email" class="form-control" id=""
                                                               value="{{ $ngoListAll->email }}">
                                                    </div>

                                                    @if(empty($ngoListAll->web_site_name))
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="ওয়েবসাইট" type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                                              >
                                                    </div>
                                                    @else
                                                    <div class="mb-3 col-lg-12">

                                                        <input placeholder="ওয়েবসাইট" type="text" required value="{{ $ngoListAll->web_site_name }}" name="ngo_website" class="form-control" id=""
                                                               >
                                                    </div>

                                                    @endif
                                                </div>
                                            </th>

                                        </tr>
                                      <!-- step one start  -->







                                        <tr>
                                            <th style="text-align: center;" rowspan="2">২.</th>

                                            <td style="font-weight:bold;" colspan="2">গ্রহণকৃত সামগ্রী/ দ্রব্য সামগ্রীর বিস্তারিত বিবরণ
                                            </div>
                                        </td>


                                        </tr>
                                        <tr>

                                            {{-- <td style="text-align: center;">ক.</td> --}}
                                            <td colspan="3" >

                                                <div class="d-flex justify-content-between ">
                                                    <div class="p-2">


                                                    </div>
                                                    <div class="p-2">
                                                        <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                                             যুক্ত করুন
                                                        </button>
                                                    </div>
                                                </div>
                                                    <div class="table-responsive" id="tableAjaxDataReceivedGoods">
                                                    @include('front.fdFiveForm._partial.receivedGoodsTable')
                                                    </div>

                                                    <div class="d-flex justify-content-between ">
                                                        <div class="p-2">


                                                        </div>
                                                        <div class="p-2">
                                                            <button class="btn btn-primary btn-sm btn-custom" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal121" >
                                                                 যুক্ত করুন
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div class="table-responsive" id="tableAjaxDataReceivedUsedGoods">

                                                        @include('front.fdFiveForm._partial.receivedGoodsUsedTable')

                                                    </div>


                                    </td>


                                        </tr>


                                        <!-- step three end -->



                                    </table>


                                    <div class="mb-3 col-lg-12 mt-3">

                                        <div class="card">

                                            <div class="card-header">
                                                আবেদনকারীর তথ্যাদি

                                            </div>
                                            <div class="card-body">

                                                  <!--new code for ngo-->
                                     <div class="mb-3">
                                        <label for="" class="form-label"> আবেদনকারীর নাম: <span class="text-danger">*</span></label>
                                             <input type="text" readonly data-parsley-required  name="chief_name" value="{{$chiefNameGlobal}}"  class="form-control" id="mainName" placeholder="আবেদনকারীর নাম">
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label"> আবেদনকারীর পদবি: <span class="text-danger">*</span></label>
                                            <input type="text" readonly data-parsley-required  name="chief_desi" value="{{$chiefDesignationGlobal}}"  class="form-control"  placeholder="আবেদনকারীর পদবি">
                                        </div>



                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                                <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                                    
                                            <input type="hidden" value="{{ $chiefSignatureGlobal }}" name="image_base64">
                                            <div class="croppedInput mt-2">
                                                <img src="{{asset('/')}}{{ $chiefSignatureGlobal }}" style="width: 200px;" class="show-image">
                                            </div>
                                           
                                    
                                        </div>
                                    
                                    
                                        <div class="mb-3">
                                            <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                                <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                            
                                    
                                            <input type="hidden" value="{{ $chiefSealGlobal }}"  name="image_seal_base64">
                                            <div class="croppedInputss mt-2">
                                                <img src="{{asset('/')}}{{ $chiefSealGlobal }}" style="width: 200px;" class="show-image">
                                            </div>
                                           
                                        </div>
                                        <!-- end new code -->

                                            </div>
                                        </div>



                                    </div>

                                </div>
                            </div>


                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit"  class="btn btn-registration"
                                        >জমা দিন
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!--modal-->
@include('front.fdFiveForm._partial.usedModal')
<!-- end modal -->
<!--modal-->
@include('front.fdFiveForm._partial.receivedModal')
<!-- end modal -->

@endsection

@section('script')
@include('front.fdFiveForm._partial.script')
@include('front.zoomButtonImage')
@endsection
