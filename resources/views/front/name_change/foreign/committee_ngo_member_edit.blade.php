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
                    <div class="card-header">
                        {{ trans('ngo_member.ngo_member')}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('ngoCommitteMemberUpdate') }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                            @csrf

                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name')}}</label>
                                <input type="text" name="name" value="{{ $all_data_list->member_name }}"  class="form-control" id="">

                                <input type="hidden" name="id" value="{{ $all_data_list->id }}"  class="form-control" id="">

                            </div>
                           <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.designation')}}</label>
                                <input type="text" name="desi" value="{{ $all_data_list->member_designation }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.date_of_birth')}}</label>
                                <input type="text" name="dob" value="{{ $all_data_list->member_dob }}" class="form-control" id="datepicker">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.nid_no')}}</label>
                                <input type="text" name="nid_no" value="{{ $all_data_list->member_nid_no }}"  class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.mobile_no')}}</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" minlength="11" name="phone" value="{{ $all_data_list->member_mobile }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.fathers_name')}}</label>
                                <input type="text" name="father_name" value="{{ $all_data_list->member_father_name }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.present_address')}}</label>
                                <input type="text" value="{{ $all_data_list->member_present_address }}" class="form-control"  name="present_address" id="exampleFormControlTextarea1"
                                          rows="2"/>



                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.permanent_address')}}</label>
                                <input type="text" class="form-control" value="{{ $all_data_list->member_permanent_address }}" name="permanent_address"   id="exampleFormControlTextarea1"
                                          rows="2"/>


                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">{{ trans('form 8_bn.name_of_spouse')}}</label>
                                <input type="text" name="name_supouse" value="{{ $all_data_list->member_name_supouse }}" class="form-control" id="">
                            </div>
                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Educational Qualification</label>
                                <input type="text" name="edu_quali" value="{{ $all_data_list->edu_quali }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Profession</label>
                                <select class="form-control" name="profession"  id="">
                                    <option value="Govt./Semi Govt./Govt Autonomous" {{ $all_data_list->profession == 'Govt./Semi Govt./Govt Autonomous' ? 'selected':'' }}>Govt./Semi Govt./Govt Autonomous</option>
                                    <option value="Private Service" {{ $all_data_list->profession == 'Private Service' ? 'selected':'' }}>Private Service</option>
                                    <option value="Self Service"{{ $all_data_list->profession == 'Self Service' ? 'selected':'' }}>Self Service</option>
                                </select>
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Description of Job</label>
                                <input type="text" name="job_des" value="{{ $all_data_list->job_des }}" class="form-control" id="">
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Member of Service Holder of Any Other
                                    NGO</label>
                                <select class="form-control" name="service_status" id="">
                                    <option value="YES" {{ $all_data_list->profession == 'YES' ? 'selected':'' }}>YES</option>
                                    <option value="NO" {{ $all_data_list->profession == 'NO' ? 'selected':'' }}>NO</option>
                                </select>
                            </div> --}}

                            {{-- <div class=" mb-3">
                                <label for="" class="form-label">Signature</label>
                                <input type="file" accept=".jpg,.jpeg,.png" name="image" class="form-control" id="">

                                <img src="{{ asset('/') }}{{ $all_data_list->image  }}" style="height:50px;" />
                            </div>
                            <div class=" mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" name="main_date" value="{{ $all_data_list->main_date }}" class="form-control" id="">
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
