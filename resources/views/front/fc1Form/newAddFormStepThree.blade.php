@extends('front.master.master')

@section('title')
{{ trans('fd9.fc1')}} | {{ trans('header.ngo_ab')}}
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
    top: 10px !important;
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
                                        <p>এফসি - ১ </p>
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
                                        <h1>এককালীন অনুদান গ্রহণের আবেদন ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">
                                    <div class="form9_upper_box">
                                        <h3>এফসি -১ ফরম</h3>
                                        <h4>এককালীন অনুদান গ্রহণের আবেদন ফরম</h4>
                                    </div>

                                    <form action="{{ route('lastExtraUpdate') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                     <!-- step one start -->
                                     <input type="hidden" name="fcOneId" id="fcOneId" value="{{ $fc1Id }}"/>
                                     <input type="hidden" name="donationList" id="" value="{{ count($donationList)}}"/>

                                     <div class="row">
                                        <div class="col-lg-12 col-sm-12">

                                            <table class="table table-bordered" style="width:100%">

                                                <!-- step one start  -->

                                                  <tr>
                                                      <th style="text-align: center;" rowspan="4">১০.</th>

                                                      <td style="font-weight:bold;" colspan="2">ইতোপূর্বে গৃহীত অনুদানের বিবরণ</td>
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

                                                      {{-- <td style="text-align: center;">ক.</td> --}}
                                                      <td colspan="3" rowspan="3">

                                                          <div class="table-responsive" id="tableAjaxDataDOnor">

@include('front.fc1Form.fc1FormStepTwoDonor')
                                                          </div>



                                                  </span>


                                              </td>


                                                  </tr>

                                                  <tr>

                                                  </tr>
                                                  <tr>

                                                  </tr>


                                                

                                                <tr>

                                                </tr>
                                                <tr>

                                                </tr>


                                                  <!-- step three end -->



                                              </table>
                                              <tr>
                                                <th style="text-align: center;" rowspan="4">১১.</th>

                                                <td style="font-weight:bold;" colspan="2">গুরুত্বপূর্ণ অন্য কোনো তথ্য (যদি থাকে):
                                                </td>
                                                <td> </td>

                                            </tr>
                                            <tr>

                                                {{-- <td style="text-align: center;">ক.</td> --}}
                                                <td colspan="3" rowspan="3">

                                                    @if(count($fc1OtherFileList) == 0)


                                                    @else


                                                        <div class="table-respnsive">
                                                            <table class="table table-bordered">
                                                                @foreach($fc1OtherFileList as $key=>$fd2OtherInfoAll)
                                                                <tr>
                                                                    <td>{{ $fd2OtherInfoAll->file_title }}</td>
                                                                    <td>

                                                                        <a target="_blank" href="{{ route('fcOneOtherPdfListdownload',$fd2OtherInfoAll->id) }}" class="btn btn-custom next_button btn-sm" >
                                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                                    </a>

                                                                    <button type="button" class="btn btn-custom next_button btn-sm mmexampleModal" id="{{ $fd2OtherInfoAll->id }}">
                                                                        <i class="fa fa-pencil" aria-hidden="true"></i>

                                                                      </button>

                                                                      <a href="{{ route('fcOneOtherPdfListdelete',$fd2OtherInfoAll->id) }}}" class="btn btn-sm btn-outline-danger"><i
                                                                        class="bi bi-trash"></i></a>



                                                                </td>
                                                                </tr>
                                                                @endforeach

                                                            </table>
                                                        </div>

                                                    @endif

                                                    <div class="table-responsive">


                                                        <table class="table table-bordered" id="dynamicAddRemove">
                                                            <tr>
                                                                <th>ফাইলের নাম</th>
                                                                <th>ফাইল</th>
                                                                <th></th>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text"  name="file_name[]" class="form-control" id=""
                                                                           placeholder=""></td>
                                                                <td><input type="file" name="file[]" accept=".pdf" class="form-control" id=""
                                                                           placeholder=""></td>
                                                                <td><a class="btn btn-primary" id="dynamic-ar"><i class="fa fa-plus"></i></a></td>
                                                            </tr>
                                                        </table>
                                                    </div>






                                        </td>


                                            </tr>

                                        </div>

                                        <div class="mb-3 col-lg-12 mt-3">

                                            <div class="card">

                                                <div class="card-header">
                                                    সংস্থা প্রধানের তথ্যাদি

                                                </div>
                                                <div class="card-body">

                                                   

                                                      <!--new code for ngo-->
                                                      @include('front.include.globalSign')
                                            <!-- end new code -->


                                            

                                                </div>
                                            </div>



                                        </div>

                                        <div class="col-lg-12 col-sm-12 mt-3">

                                            <span style="font-weight:bold;">সংযুক্তি <br> ১। (<span class="text-danger" style="font-size:12px;">যে কোনো একটি ইনপুট ফিল্ড অবশ্যই পূরণ করতে হবে</span>)</span>


                                            @if(!$fc1FormList)

                                            <div class="row">

                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label"> দাতার প্রতিশ্রুতি পত্র </label>
                                                    <input type="file" accept=".pdf" name="donor_commitment_letter" class="form-control" id=""
                                                           placeholder="">
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">দাতা সংস্থার প্রতিশ্রুতি পত্র </label>
                                                    <input type="file" accept=".pdf" name="donor_agency_commitment_letter" class="form-control" id=""
                                                           placeholder="">
                                                </div>

                                            </div>
                                            <span style="font-weight:bold;">২। </span>
                                            <div class="row">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">ইতোপূর্বে সমাপ্ত প্রকল্পের অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক</label>
                                                <input type="file" accept=".pdf" name="previous_audit_report" class="form-control" id=""
                                                       placeholder="">
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">সমাপনী প্রতিবেদন</label>
                                                <input type="file" accept=".pdf" name="last_final_report" class="form-control" id=""
                                                       placeholder="">
                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">প্রশাসনিক প্রত্যয়নপত্র</label>
                                                <input type="file" accept=".pdf" name="administrative_certificate" class="form-control" id=""
                                                       placeholder="">
                                            </div>
                                            </div>

                                            @else

                                            <div class="row">

                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label"> দাতার প্রতিশ্রুতি পত্র </label>
                                                    <input type="file" accept=".pdf" name="donor_commitment_letter" class="form-control" id=""
                                                           placeholder="">

                                                           @if(empty($fc1FormList->donor_commitment_letter))


                                                           @else


                                                           <?php

                                                           $file_path = url($fc1FormList->donor_commitment_letter);
                                                           $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                           $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                           ?>
                                                            <b>{{ $filename.'.'.$extension }}</b>
                                                            @endif
                                                </div>
                                                <div class="mb-3 col-lg-6">
                                                    <label for="" class="form-label">দাতা সংস্থার প্রতিশ্রুতি পত্র </label>
                                                    <input type="file" accept=".pdf" name="donor_agency_commitment_letter" class="form-control" id=""
                                                           placeholder="">

                                                           @if(empty($fc1FormList->donor_agency_commitment_letter))


                                                           @else


                                                           <?php

                                                           $file_path = url($fc1FormList->donor_agency_commitment_letter);
                                                           $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                           $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                           ?>
                                                            <b>{{ $filename.'.'.$extension }}</b>
                                                            @endif
                                                </div>

                                            </div>
                                            <span style="font-weight:bold;">২। </span>
                                            <div class="row">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">ইতোপূর্বে সমাপ্ত প্রকল্পের অডিট রিপোর্ট ব্যুরো হতে গ্রহণের প্রমাণক</label>
                                                <input type="file" accept=".pdf" name="previous_audit_report" class="form-control" id=""
                                                       placeholder="">

                                                       @if(empty($fc1FormList->previous_audit_report))


                                                       @else


                                                       <?php

                                                       $file_path = url($fc1FormList->previous_audit_report);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                        @endif
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">সমাপনী প্রতিবেদন</label>
                                                <input type="file" accept=".pdf" name="last_final_report" class="form-control" id=""
                                                       placeholder="">


                                                       @if(empty($fc1FormList->last_final_report))


                                                       @else


                                                       <?php

                                                       $file_path = url($fc1FormList->last_final_report);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                        @endif
                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label for="" class="form-label">প্রশাসনিক প্রত্যয়নপত্র</label>
                                                <input type="file" accept=".pdf" name="administrative_certificate" class="form-control" id=""
                                                       placeholder="">


                                                       @if(empty($fc1FormList->administrative_certificate))


                                                       @else


                                                       <?php

                                                       $file_path = url($fc1FormList->administrative_certificate);
                                                       $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                                       $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                                       ?>
                                                        <b>{{ $filename.'.'.$extension }}</b>
                                                        @endif
                                            </div>
                                            </div>



                                            @endif

                                        </div>
                                    </div>
                                    <!-- step one end --->

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <a href="{{ route('fc1FormStepTwo',base64_encode($fc1Id)) }}" class="btn btn-danger"
                                                >পূর্ববর্তী পৃষ্ঠায় যান
                                    </a>
                                          <button type="submit" style="margin-left:10px;" class="btn btn-registration"
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
 <!-- Modal -->
 <div class="modal fade" id="mmexampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">ডেটা আপডেট করুন</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" id="formBody">


    </div>

    </div>
    </div>
    </div>

<!--modal-->
<!--modal-->
@include('front.fc1Form._partial.donationModal')

<!-- end modal -->

@endsection

@section('script')
@include('front.fc1Form._partial.script')
@include('front.zoomButtonImage')
<script>

    $(document).on('click', '.mmexampleModal', function () {

        var main_id = $(this).attr('id');
        $('#mmexampleModal').modal('show');



        $.ajax({
        url: "{{ route('fcOneOtherPdfList') }}",
        method: 'GET',
        data: {main_id:main_id},
        success: function(data) {
          $("#formBody").html('');
          $("#formBody").html(data);
        }
        });


    });
    </script>
<script>
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text"  name="file_name[]" class="form-control" id=""placeholder=""></td><td><input type="file" name="file[]" accept=".pdf" class="form-control" id="" placeholder=""></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="bi bi-file-earmark-x-fill"></i></button></td></tr>');
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>
@endsection
