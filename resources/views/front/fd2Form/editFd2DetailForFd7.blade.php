@extends('front.master.master')

@section('title')
{{ trans('fd9.fd2')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
<section>
    <form action="{{ route('updateFd2DetailForFd7') }}" method="post" enctype="multipart/form-data" id="form" data-parsley-validate="">
        @csrf
        <input type="hidden" name="id" value="{{ $fd2FormList->id }}"/>

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
                    <div class="card-body">
                        <div class="profile_link_box">
                            <a href="{{ route('dashboard') }}">
                                <p class="{{ Route::is('dashboard')  ? 'active_link' : '' }}"><i class="fa fa-user pe-2"></i>{{ trans('fd9.m1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('nameChange') }}">
                                <p class="{{ Route::is('nameChange')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('renew') }}">
                                <p class="{{ Route::is('renew')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.m3')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdNineForm.index') }}">
                                <p class="{{ Route::is('fdNineForm.index') || Route::is('fdNineForm.create') || Route::is('fdNineForm.create')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.nvisa')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdNineOneForm.index') }}">
                                <p class="{{ Route::is('fdNineOneForm.index') ||  Route::is('fdNineOneForm.create') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd09formone')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd6Form.index') }}">
                                <p class="{{ Route::is('fd6Form.index') ||  Route::is('fd6Form.create') || Route::is('fd6Form.view') || Route::is('fd2Form.create') || Route::is('fd2Form.index') || Route::is('fd6Form.edit') || Route::is('fd2Form.view') || Route::is('fd2Form.edit') || Route::is('addFd2Detail') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd6')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd7Form.index') }}">
                                <p class="{{ Route::is('fd7Form.index') ||  Route::is('fd7Form.create') || Route::is('fd7Form.edit') || Route::is('fd7Form.view') || Route::is('addFd2DetailForFd7') || Route::is('editFd2DetailForFd7') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd7')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc1Form.index') }}">
                                <p class="{{ Route::is('fc1Form.index') ||  Route::is('fc1Form.create') || Route::is('fc1Form.view') || Route::is('addFd2DetailForFc1') || Route::is('editFd2DetailForFc1') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc1')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fc2Form.index') }}">
                                <p class="{{ Route::is('fc2Form.index') ||  Route::is('fc2Form.create') || Route::is('fc2Form.view') || Route::is('addFd2DetailForFc2') || Route::is('editFd2DetailForFc2') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fc2')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fd3Form.index') }}">
                                <p class="{{ Route::is('fd3Form.index') ||  Route::is('fd3Form.create') || Route::is('fd3Form.view') || Route::is('addFd2DetailForFd3') || Route::is('editFd2DetailForFd3') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd3')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('fdFiveForm.index') }}">
                                <p class="{{ Route::is('fdFiveForm.index') ||  Route::is('fdFiveForm.create') || Route::is('fdFiveForm.view')  || Route::is('fdFiveForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.fd5')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourForm.index') }}">
                                <p class="{{ Route::is('fdFourForm.index') ||  Route::is('fdFourForm.create') || Route::is('fdFourForm.view')  || Route::is('fdFourForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourForm.fdFourForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('fdFourOneForm.index') }}">
                                <p class="{{ Route::is('editFdFourFormData') || Route::is('addFdFourFormData') || Route::is('fdFourOneForm.index') ||  Route::is('fdFourOneForm.create') || Route::is('fdFourOneForm.view')  || Route::is('fdFourOneForm.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fdFourFormOne.fdFourOneForm')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoFour.index') }}">
                                <p class="{{ Route::is('formNoFour.index') ||  Route::is('formNoFour.create') || Route::is('formNoFour.view')  || Route::is('formNoFour.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFour.formNoFour')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('formNoSeven.index') }}">
                                <p class="{{ Route::is('formNoSeven.index') ||  Route::is('formNoSeven.create') || Route::is('formNoSeven.view')  || Route::is('formNoSeven.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoSeven.formNoSeven')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('formNoFive.index') }}">
                                <p class="{{ Route::is('formNoFive.index') ||  Route::is('formNoFive.create') || Route::is('formNoFive.view')  || Route::is('formNoFive.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('formNoFive.formNoFive')}}</p>
                            </a>
                        </div>

                        <div class="profile_link_box">
                            <a href="{{ route('complain.index') }}">
                                <p class="{{ Route::is('complain.index') ||  Route::is('complain.create') || Route::is('complain.view')  || Route::is('complain.edit') ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.complain')}}</p>
                            </a>
                        </div>
                        {{-- <div class="profile_link_box">
                            <a href="{{ route('duplicateCertificate.index') }}">
                                <p class="{{ Route::is('duplicateCertificate.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf1')}}</p>
                            </a>
                        </div>
                        <div class="profile_link_box">
                            <a href="{{ route('approvalOfConstitution.index') }}">
                                <p class="{{ Route::is('approvalOfConstitution.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf2')}}</p>
                            </a>
                        </div>



                        <div class="profile_link_box">
                            <a href="{{ route('executiveCommitteeApproval.index') }}">
                                <p class="{{ Route::is('executiveCommitteeApproval.index')  ? 'active_link' : '' }}"><i class="fa fa-desktop pe-2"></i>{{ trans('fd9.cf3')}}</p>
                            </a>
                        </div> --}}

                        <div class="profile_link_box">
                            <a href="{{ route('logout') }}">
                                <p class=""><i class="fa fa-cog pe-2"></i>{{ trans('fd9.l')}}</p>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="name_change_box">
                            <div class="step_box">
                                <ul class="process-model more-icon-preocess">
                                    <li >
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <p>এফডি - ৭</p>
                                    </li>
                                    <li class="active visited">
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        <p>এফডি - ২</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>অর্থছাড়ের আবেদন ফরম</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-3 card-custom-color">
                                <div class="card-body">

                                    <div class="form9_upper_box">
                                        <h3>এফডি -২ ফরম</h3>
                                        <h4>অর্থছাড়ের আবেদন ফরম</h4>
                                    </div>



                                        <input type="hidden" name="fd7_form_id" value="{{ base64_encode($fd7Id) }}" />
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">সংস্থার নাম</label>
                                            <input type="text" required value="{{ $fd2FormList->ngo_name }}" name="ngo_name" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">সংস্থার ঠিকানা <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" value="{{ $fd2FormList->ngo_address }}" name="ngo_address" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প নাম <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $fd2FormList->ngo_prokolpo_name }}" name="ngo_prokolpo_name" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-12">
                                            <label for="" class="form-label">প্রকল্প মেয়াদ <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $fd2FormList->ngo_prokolpo_duration }}" name="ngo_prokolpo_duration" class="form-control" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">আরম্ভের তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $fd2FormList->ngo_prokolpo_start_date }}" name="ngo_prokolpo_start_date" class="form-control datepicker" id=""
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">সমাপ্তির তারিখ <span class="text-danger">*</span></label>
                                            <input type="text" required value="{{ $fd2FormList->ngo_prokolpo_end_date }}" name="ngo_prokolpo_end_date" class="form-control datepicker" id=""
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রস্তাবিত অর্থছাড়ের পরিমান (বাংলাদেশী টাকা ) <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" id="" name="proposed_rebate_amount_bangladeshi_taka" value="{{ $fd2FormList->proposed_rebate_amount_bangladeshi_taka }}"
                                                   placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="" class="form-label">প্রস্তাবিত অর্থছাড়ের পরিমান (বৈদেশিক মুদ্রায় ) <span class="text-danger">*</span></label>
                                            <input type="text" required class="form-control" id="" name="proposed_rebate_amount_in_foreign_currency" value="{{ $fd2FormList->proposed_rebate_amount_in_foreign_currency }}"
                                                   placeholder="">
                                        </div>
                                    </div>
                                    <p class="mb-3">গুরুত্বপূর্ণ যেকোনো তথ্য</p>

                                    <!-- start new code --->

                                    @if(count($fd2OtherInfo) == 0)


                                    @else
                                    <div class="row">


                                        <table class="table table-bordered">
                                            @foreach($fd2OtherInfo as $key=>$fd2OtherInfoAll)
                                            <tr>
                                                <td>{{ $fd2OtherInfoAll->file_name }}</td>
                                                <td>

                                                    <a target="_blank" href="{{ route('downloadFd2DetailForFd7',$fd2OtherInfoAll->id) }}" class="btn btn-custom next_button btn-sm" >
                                                    <i class="fa fa-download" aria-hidden="true"></i>
                                                </a>

                                                <button type="button" class="btn btn-custom next_button btn-sm mmexampleModal" id="{{ $fd2OtherInfoAll->id }}">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>

                                                  </button>

                                                  <a href="{{ route('deleteFd2DetailForFd7',$fd2OtherInfoAll->id) }}}" class="btn btn-sm btn-outline-danger"><i
                                                    class="bi bi-trash"></i></a>



                                            </td>
                                            </tr>
                                            @endforeach

                                        </table>



                                    @endif

                                    <!-- end new code --->





                                    <table class="table table-bordered mt-2" id="dynamicAddRemove">
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
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            এফডি ২ পিডিফ
                                        </div>

                                        <?php

                                        $file_path = url($fd2FormList->fd_2_form_pdf);
                                        $filename  = pathinfo($file_path, PATHINFO_FILENAME);

                                        $extension = pathinfo($file_path, PATHINFO_EXTENSION);




                                        ?>


                                        <div class="card-body">
                                            <div class="mb-3 col-lg-12">
                                                <label for="" class="form-label">এফডি ২ ফর্ম উপলোড <br><span class="text-danger" style="font-size: 12px;">(Maximum 2 MB)</span></label>
                                                <input type="file"  accept=".pdf" name="fd_2_form_pdf" class="form-control" id="fd_2_form_pdf"
                                                       placeholder="">
                                                       <p id="fd_2_form_pdf_text" class="text-danger mt-2" style="font-size:12px;"></p>
                                            </div>
                                            <b>{{ $filename.'.'.$extension }}</b>
                                        </div>
                                    </div>

                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-dark me-2"
                                                onclick="location.href = '{{ route('fd7Form.edit',base64_encode($fd7Id)) }}';">আগের পৃষ্ঠায় যান
                                        </button>
                                        <button type="submit" class="btn btn-registration"
                                                >তথ্য জমা দিন
                                        </button>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</form>
</section>

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


@endsection

@section('script')

<script>

    $(document).on('click', '.mmexampleModal', function () {

        var main_id = $(this).attr('id');
        $('#mmexampleModal').modal('show');



        $.ajax({
        url: "{{ route('fd2PdfUpdateModalFd7') }}",
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

    ///


        $(document).on('change', 'select.division_name', function () {

var main_id = $(this).attr('id');
var get_id_from_main = main_id.slice(13);
var getMainValue = $('#division_name'+get_id_from_main).val();

 // var getMainValue = $(this).val();

  //alert(getMainValue);


  $.ajax({
    url: "{{ route('getDistrictList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#district_name"+get_id_from_main).html('');
      $("#district_name"+get_id_from_main).html(data);
    }
    });

// });


$.ajax({
    url: "{{ route('getCityCorporationList') }}",
    method: 'GET',
    data: {getMainValue:getMainValue},
    success: function(data) {
      $("#city_corparation_name"+get_id_from_main).html('');
      $("#city_corparation_name"+get_id_from_main).html(data);
    }
    });

});






    ///
$("#ngo_prokolpo_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#project_name').val(getMainValue);

});


$("#ngo_prokolpo_duration").keyup(function(){
  var getMainValue = $(this).val();

  $('#duration_of_project').val(getMainValue);

});


$("#donor_organization_name").keyup(function(){
  var getMainValue = $(this).val();

  $('#donor_organization_name_two').val(getMainValue);

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
