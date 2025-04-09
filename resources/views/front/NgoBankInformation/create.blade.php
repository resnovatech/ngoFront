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
                        <div class="p-2 flex-grow-1 bd-highlight"> <h4>{{ trans('first_info.bankList')}}</h4></div>
                        <div class="p-2 bd-highlight"></div>
                      </div>
                    {{-- <div class="user_dashboard_right">
                  
                    </div> --}}

                    @include('flash_message')
                    <div class="row mt-4">
                        <div class="col-xl-7 col-md-7 col-sm-7">
                            <div class="card">

                       
                                <div class="card-body">
                                    <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ক্র : নং :</th>
                                    <th>{{ trans('first_info.bankDescrip')}}</th>
                                    <th>স্ট্যাটাস</th>
                                    <th>কর্ম পরিকল্পনা</th>
                                </tr>
                                @foreach($getNgoBankInfoList as $key=>$getCeoInfoLists)
                                <tr>
                                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                    <td>
                                    <b>{{ trans('fd_one_step_four.account_number')}}:</b> {{ $getCeoInfoLists->account_number }} <br>
                                    <b>{{ trans('fd_one_step_four.account_type')}}:</b> {{ $getCeoInfoLists->account_type}} <br>
                                    <b>{{ trans('fd_one_step_four.name_of_bank')}}:</b> {{ $getCeoInfoLists->name_of_bank}} <br>
                                    <b>{{ trans('fd_one_step_four.branch_name_of_bank')}}:</b> {{ $getCeoInfoLists->branch_name_of_bank}} <br>
                                    <b>{{ trans('fd_one_step_four.bank_address')}}:</b> {{ $getCeoInfoLists->bank_address}} 
                                   </td>
                
                                    <td>
                
                                        @if( $getCeoInfoLists->status == 1)
                                        <span class="badge bg-success"> সক্রিয় </span>
                                        @else
                
                                        <span class="badge bg-danger">   নিষ্ক্রিয় </span>
                                       @endif
                
                                    </td>
                                    <td>
                                        <a  href="{{ route('ngoBankInformationEdit',base64_encode($getCeoInfoLists->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                              
                            </table>
                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-5 col-sm-5">
                           
                            <div class="card">

                       
                                <div class="card-body">
                                    <form method="post" action="{{ route('ngoBankInformationStore') }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                      <!--new code for ngo-->
                                      <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.account_number')}}<span class="text-danger">*</span></label>
                                                    <input type="text" required value=""  name="account_number" class="form-control" id="">


                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.account_type')}}<span class="text-danger">*</span></label>
                                                    <input type="text" required  name="account_type"  class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.name_of_bank')}}<span class="text-danger">*</span></label>
                                                    <input type="text" required   name="name_of_bank"  class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.branch_name_of_bank')}}<span class="text-danger">*</span></label>
                                                    <input type="text" required   name="branch_name_of_bank"  class="form-control" id="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ trans('fd_one_step_four.bank_address')}}<span class="text-danger">*</span></label>
                                                    <input type="text" required   name="bank_address"  class="form-control" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <!-- end new code -->
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
