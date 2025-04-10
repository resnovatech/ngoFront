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
                                        @include('flash_message')
                                    </div>

                                    <form action="{{ route('fd6Form.store') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                      <input type="hidden" id="mainEditId" value="0"/>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered">

                                                    <!--FD06 Section 01-->

                                                    <tr>
                                                        <td rowspan="7" style="width:40px;">০১</td>
                                                        <td style="width:40px;">ক)</td>
                                                        <td style="width:30%">এনজিও'র নাম <span style="color:red;">*</span></td>
                                                        <td>
                                                            @if(session()->get('locale') == 'en' || empty(session()->get('locale')))


                                                            <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name_ban }}" class="form-control" id=""
                                                            placeholder="">

                                                            @else


                                                            <input type="text" required name="ngo_name" value="{{ $ngo_list_all->organization_name }}" class="form-control" id=""
                                                            placeholder="">


                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td>ব্যুরোর নিবন্ধন নং ও তারিখ <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" required name="ngo_registration_number" value="{{ $ngo_list_all->registration_number }}" class="form-control mb-3" id=""
                                                                   placeholder="ব্যুরোর নিবন্ধন নং">
                                                            <input type="text" required name="ngo_registration_date" value="{{ date("d-m-Y", strtotime($ngoDurationReg)) }}" class="form-control datepickerOne" id=""
                                                                   placeholder="তারিখ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td>সর্বশেষ নবায়ন ও মেয়াদ উত্তীর্ণের তারিখ <span style="color:red;">*</span></td>
                                                        <td>
                                                            <label for="" class="form-label">সর্বশেষ নবায়ন তারিখ</label>
                                                            <input type="text" required name="ngo_last_renew_date" value="{{ date("d-m-Y", strtotime($ngoDurationLastEx->created_at)) }}"  class="form-control mb-3 datepickerOne" id="">
                                                            <label for="" class="form-label">মেয়াদ উত্তীর্ণের তারিখ</label>
                                                            <input type="text" required name="ngo_expiration_date" value="{{ date("d-m-Y", strtotime($ngoDurationLastEx->ngo_duration_end_date)) }}"  class="form-control datepickerOne" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঘ)</td>
                                                        <td> ঠিকানা <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" required name="ngo_address" class="form-control" value="{{ $ngo_list_all->organization_address }}" id=""
                                                            placeholder="ঠিকানা">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ঙ)</td>
                                                        <td>টেলিফোন ও মোবাইল নম্বর <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" required name="ngo_telephone_number" value="{{ $ngo_list_all->tele_phone_number }}" class="form-control" id=""
                                                            placeholder="">
                                                            <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                            type = "number" required
                                                            maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” name="ngo_mobile_number" value="{{ $ngo_list_all->phone }}" class="form-control" id=""
                                                                   placeholder="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">চ)</td>
                                                        <td> ইমেইল ঠিকানা <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" required name="ngo_email_address" class="form-control" id=""
                                                   placeholder="" value="{{ $ngo_list_all->email }}">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ছ)</td>
                                                        <td>ওয়েবসাইট <span style="color:red;">*</span></td>
                                                        <td>
                                                            @if(empty($ngo_list_all->web_site_name))

                                            <input type="text" required value="{{ $renewWebsiteName }}" name="ngo_website" class="form-control" id=""
                                                   placeholder="">

                                        @else

                                            <input type="text" required value="{{ $ngo_list_all->web_site_name }}" name="ngo_website" class="form-control" id=""
                                                   placeholder="">


                                        @endif
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 02-->

                                                 

                                                    <tr>
                                                        <td style="width:40px;">০২</td>
                                                        <td colspan="2">প্রকল্পের নাম <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" value="{{ Session::get('ngo_prokolpo_name')}}" name="ngo_prokolpo_name" required class="form-control" id=""
                                                                   placeholder="প্রকল্পের নাম">
                                                        </td>
                                                    </tr>

                                                    <!--FD06 Section 03-->

                                                    <tr>
                                                        <td rowspan="4" style="width:40px;">০৩</td>
                                                        <td colspan="2">প্রকল্পের মেয়াদ <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" value="{{ Session::get('ngo_prokolpo_duration')}}" name="ngo_prokolpo_duration" required class="form-control" id=""
                                                                   placeholder="প্রকল্পের মেয়াদ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">ক)</td>
                                                        <td>শুরুর তারিখ <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" value="{{ Session::get('ngo_prokolpo_start_date')}}" name="ngo_prokolpo_start_date" required class="form-control datepickerOne" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:40px;">খ)</td>
                                                        <td>সমাপ্তির তারিখ <span style="color:red;">*</span></td>
                                                        <td>
                                                            <input type="text" value="{{ Session::get('ngo_prokolpo_end_date')}}" name="ngo_prokolpo_end_date" required class="form-control datepickerOne" id="">
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <?php
                                                        if(Session::has('subject_id')){

                                                            $subjectIdList  = Session::get('subject_id');

                                                        }else{
                                                          
                                                        }
                                                   

                                                     ?>

                                                        <td style="width:40px;">গ)</td>
                                                        <td>প্রকল্পের ধরণ <span style="color:red;">*</span> </td>
                                                        <td>  <select multiple required name="subject_id[]" class="form-control js-example-basic-multiple" id=""
                                                            placeholder="">
                                                            <option value="">--অনুগ্রহ করে নির্বাচন করুন--</option>
                                                            @foreach($projectSubjectList as $projectSubjectLists)
                                                            @if(Session::has('subject_id'))
                                                            <option value="{{ $projectSubjectLists->id }}" {{ (in_array($projectSubjectLists->id,$subjectIdList)) ? 'selected' : '' }}>{{ $projectSubjectLists->name }}</option>
                                                            @else
                                                            <option value="{{ $projectSubjectLists->id }}">{{ $projectSubjectLists->name }}</option>
                                                            @endif
                                                            @endforeach
                                                     </select></td>

                                                    </tr>

                                                    <!--FD06 Section 04-->

                                                    <tr>
                                                        <td rowspan="2" style="width:40px;">০৪</td>
                                                        <td colspan="3">প্রকল্প এলাকা</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <div class="d-flex justify-content-end">
                                                                <a class="btn btn-primary btn-sm btn-custom mb-3" data-bs-toggle="modal"
                                                                        data-bs-target="#AreaModal">নতুন এলাকা যুক্ত করুন
                                                            </a>
                                                            </div>

                                                            <input type="hidden" value="{{ count($prokolpoAreaList) }}" name="areaId" required class="form-control" id="areaId">
                                                            <div class="table-responsive" id="tableAjaxDatapro">

                                                                @include('front.fd6Form._partial.prokolpoAreaTable')

                                                            </div>
                                                        </td>
                                                    </tr>



                                                </table>
                                            </div>
                                        </div>


                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="submit"  class="btn btn-registration"
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

<!--modal-->

@include('front.fd6Form._partial.stepOneModal')
<!-- end modal -->
@endsection

@section('script')
@include('front.fd6Form._partial.script')
@include('front.include.globalScript')
@endsection
