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
                @include('flash_message')
                <div class="card">
                    <div class="card-body">
                        <div class="step_box">
                            <ul class="process-model more-icon-preocess">
                                 <li class="active visited">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <p>নতুন নাম</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    <p>ফর্ম-0৮</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                    <p>কমিটি মেম্বার</p>

                                </li>
                                <li>
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <p>আইডি কার্ড এবং ছবি</p>

                                </li>
                                <li>
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>নথিপত্র</p>

                                </li>
                            </ul>
                        </div>

                        <div class="committee_container">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="p-2">
                                    <h5>এনজিও সদস্যরা</h5>
                                </div>
                                <div class="p-2">
                                    <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('ngoCommitteMemberAdd') }}';">
                                        নতুন এনজিও সদস্য যোগ করুন
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">

                                    <table class="table table-bordered mt-4 custom_table">
                                        <tr>
                                            <th>{{ trans('form 8_bn.sl')}}</th>
                                            <th>{{ trans('form 8_bn.name')}} & {{ trans('form 8_bn.designation')}}</th>
                                            <th>{{ trans('form 8_bn.date_of_birth')}}</th>
                                            <th>{{ trans('form 8_bn.address')}}</th>
                                            <th>{{ trans('form 8_bn.action')}}</th>

                                        </tr>
                                       @foreach($form_eight_list as $key=>$main_all_data_list)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $main_all_data_list->member_name }} <br> <span class="text-success">{{ trans('form 8_bn.designation')}}:</span>
                                                {{ $main_all_data_list->member_designation }}
                                            </td>
                                            <td>

                                                <?php

    $newDate12 = date("d-m-Y", strtotime($main_all_data_list->member_dob ));

                                                    ?>

    @if(session()->get('locale') == 'en')


    {{ App\Http\Controllers\NGO\CommonController::englishToBangla($newDate12)}}


    @else

        {{ $newDate12 }}
    @endif

                                            </td>
                                            <td><span>{{ trans('form 8_bn.present_address')}}:</span>  {{ $main_all_data_list->member_present_address }} <br>
                                                <span>{{ trans('form 8_bn.permanent_address')}}:</span>  {{ $main_all_data_list->member_permanent_address }}
                                            </td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="location.href = '{{ route('ngoCommitteMemberEdit',$main_all_data_list->member_name_slug) }}';"><i
                                                                class="bi bi-pencil-fill"></i></button>



                                                    <button type="button" onclick="deleteTag({{ $main_all_data_list->id}})" class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash"></i></button>

                                                                <form id="delete-form-{{ $main_all_data_list->id }}" action="{{ route('ngoMember.destroy',$main_all_data_list->id) }}" method="POST" style="display: none;">

                                                                    @csrf
                                                                    @method('DELETE')

                                                                </form>


                                                    <button id="member_id{{ $main_all_data_list->id }}" class="btn btn-success btn-sm" type="button"
                                                            data-bs-toggle="offcanvas"
                                                            data-bs-target="#offcanvasWithBothOptions"
                                                            aria-controls="offcanvasWithBothOptions"><i
                                                                class="bi bi-eye-fill"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                    </table>
                                    <div class="d-grid d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-registration me-3"
                                                onclick="location.href = '{{ route('formEightData') }}';">পূর্ববর্তী
                                        </button>
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('ngoMemberNidAndImage') }}';">পরবর্তী
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

</section>
<div class=" offcanvas offcanvas-end" style="width:40vw !important" data-bs-scroll="true" tabindex="-1"
     id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">{{ trans('form 8_bn.personal_info')}}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="committee_profile" id="main_content_table">

        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){

        //new_cat_n


        $("[id^=member_id]").click(function(){

            //alert(3);

            var main_id = $(this).attr('id');
       var id_for_pass = main_id.slice(9);


       $.ajax({
        url: "{{ route('ngoMemberView') }}",
        method: 'GET',
        data: {id_for_pass:id_for_pass},
        success: function(data) {
          $("#main_content_table").html('');
          $("#main_content_table").html(data);
        }
        });

        });
        });



</script>
@endsection
