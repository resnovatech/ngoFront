@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন| {{ trans('header.ngo_ab')}}
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
                    <div class="card-header">
                        {{ trans('form 8_bn.ngo_committee_member_registration')}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('formEightDataUpdate') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name')}}:</label>
                                <input data-parsley-required type="text" name="name" value="{{ $all_data_list->name }}"  class="form-control" id="">

                                <input type="hidden" name="id" value="{{ $all_data_list->id }}"  class="form-control" id="">

                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.designation')}}:</label>
                                <input data-parsley-required type="text" name="desi" value="{{ $all_data_list->desi }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}}:</label>
                                <input data-parsley-required type="text" name="dob" value="{{ $all_data_list->dob }}" class="form-control" id="datepicker">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}}:</label>
                                <input data-parsley-required type="text" name="nid_no" value="{{ $all_data_list->nid_no }}"  class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}}:</label>
                                <input data-parsley-required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" name="phone" value="{{ $all_data_list->phone }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}}:</label>
                                <input data-parsley-required type="text" name="father_name" value="{{ $all_data_list->father_name }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.present_address')}}:</label>
                                <input data-parsley-required value="{{ $all_data_list->present_address }}" type="text"class="form-control"  name="present_address" id="exampleFormControlTextarea1"
                                          rows="2"/>



                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}}:</label>
                                <input data-parsley-required value="{{ $all_data_list->permanent_address }}" type="text" class="form-control" name="permanent_address"   id="exampleFormControlTextarea1"
                                          rows="2"/>


                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}}:</label>
                                <input type="text" data-parsley-required name="name_supouse" value="{{ $all_data_list->name_supouse }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.Educational_Qualification')}}:</label>
                                <input type="text" data-parsley-required name="edu_quali" value="{{ $all_data_list->edu_quali }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.profession')}}:</label>
                                <select data-parsley-required class="form-control" name="profession"  id="">
                                    <option value="{{ trans('form 8_bn.govt_semi_govt_autonomous') }}" {{ $all_data_list->profession == trans('form 8_bn.govt_semi_govt_autonomous') ? 'selected':'' }}>{{ trans('form 8_bn.govt_semi_govt_autonomous')}}</option>
                                    <option value="{{ trans('form 8_bn.private_service') }}" {{ $all_data_list->profession == trans('form 8_bn.private_service') ? 'selected':'' }}>{{ trans('form 8_bn.private_service')}}</option>
                                    <option value="{{ trans('form 8_bn.self_service')}}"{{ $all_data_list->profession == trans('form 8_bn.self_service') ? 'selected':'' }}>{{ trans('form 8_bn.self_service')}}</option>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.description_of_job')}}:</label>
                                <input type="text" data-parsley-required name="job_des" value="{{ $all_data_list->job_des }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.member_of_service_holder_of_Any_other_ngo')}}:</label>
                                <select data-parsley-required class="form-control" name="service_status" id="">
                                    <option value="{{ trans('form 8_bn.yes') }}" {{ $all_data_list->profession == trans('form 8_bn.yes') ? 'selected':'' }}>{{ trans('form 8_bn.yes')}}</option>
                                    <option value="{{ trans('form 8_bn.no') }}" {{ $all_data_list->profession == trans('form 8_bn.no') ? 'selected':'' }}>{{ trans('form 8_bn.no')}}</option>
                                </select>
                            </div>

                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Signature</label>
                                <input type="file" accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">

                                <img src="{{ asset('/') }}{{ $all_data_list->image  }}" style="height:50px;" />
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" data-parsley-required name="main_date" value="{{ $all_data_list->main_date }}" class="form-control" id="">
                            </div> --}}
                            <div class="d-grid d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-registration">{{ trans('form 8_bn.update')}}
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
