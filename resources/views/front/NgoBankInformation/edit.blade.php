@extends('front.master.master')

@section('title')
{{ trans('first_info.bankList')}} | {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')

@include('translate')
<section>
    <div class="container">
        <div class="form-card">
            <div class="dashboard_box">
                <div class="dashboard_left">
                    <ul>
                   @include('front.include.sidebar_dash')
                    </ul>
                </div>
                <div class="dashboard_right">
                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight"> <h4>{{ trans('first_info.update')}}</h4></div>
                        <div class="p-2 bd-highlight"></div>
                      </div>
                    {{-- <div class="user_dashboard_right">
                  
                    </div> --}}

                    @include('flash_message')
                    <div class="row mt-4">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                           
                            <div class="card">

                       
                                <div class="card-body">
                                    <form method="post" action="{{ route('ngoBankInformationUpdate',$getBankInfoListEdit->id) }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
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
</section>

    

@endsection

@section('script')
@include('front.zoomButtonImage')
@endsection
