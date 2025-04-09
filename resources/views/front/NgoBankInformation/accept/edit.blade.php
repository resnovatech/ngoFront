@extends('front.master.master')

@section('title')
{{ trans('first_info.bankList')}} | {{ trans('header.ngo_ab')}}
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
                <div class="card">
                    <div class="card-body">
                        @include('flash_message')
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>{{ trans('first_info.update')}}</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row mt-4">
                                <div class="col-xl-12 col-md-12 col-sm-12">
                                   
                                    <div class="card">
        
                               
                                        <div class="card-body">
                                            <form method="post" action="{{ route('ngoBankInformationUpdate',$getBankInfoListEdit->id) }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="hideValue" value="1"/>
                                              <!--new code for ngo-->
                                              <div class="mb-3">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.account_number')}}<span class="text-danger">*</span></label>
                                                            <input type="text" required value="{{$getBankInfoListEdit->account_number}}"  name="account_number" class="form-control" id="">
        
        
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.account_type')}}<span class="text-danger">*</span></label>
                                                            <input type="text" required value="{{$getBankInfoListEdit->account_type}}"  name="account_type"  class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}<span class="text-danger">*</span></label>
                                                            <input type="text" required value="{{$getBankInfoListEdit->name_of_bank}}"   name="name_of_bank"  class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}<span class="text-danger">*</span></label>
                                                            <input type="text" required value="{{$getBankInfoListEdit->branch_name_of_bank}}"  name="branch_name_of_bank"  class="form-control" id="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address')}}<span class="text-danger">*</span></label>
                                                            <input type="text" required value="{{$getBankInfoListEdit->bank_address}}"   name="bank_address"  class="form-control" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <!-- end new code -->
        
                                    <div class="mb-3">
                                        <label for="" class="form-label">স্ট্যাটাস: <span class="text-danger">*</span></label>
        
                                        <select data-parsley-required  name="status"   class="form-control">
                                            <option value="1" {{ $getBankInfoListEdit->status == 1 ? 'selected':'' }}>সক্রিয়</option>
                                            <option value="0" {{ $getBankInfoListEdit->status == 0 ? 'selected':'' }}>নিষ্ক্রিয় </option>
                                        </select>
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
        </div>
    </div>

</section>

@endsection

@section('script')

@endsection
