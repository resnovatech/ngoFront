@extends('front.master.master')

@section('title')
{{ trans('ngo_member_doc.ceoInfoList')}} | {{ trans('header.ngo_ab')}}
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
                                        <h1>{{ trans('ngo_member_doc.ceoInfoList')}}</h1>
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row mt-4">
                                <div class="col-xl-7 col-md-7 col-sm-7">
                                    <div class="card">
        
                               
                                        <div class="card-body">
                                            <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>ক্র : নং :</th>
                                            <th>{{ trans('first_info.headInfo')}}</th>
                                            <th>{{ trans('first_info.headInfoSeal')}}</th>
                                            <th>স্ট্যাটাস</th>
                                            <th>কর্ম পরিকল্পনা</th>
                                        </tr>
                                        @foreach($getNgoHeadInfoList as $key=>$getCeoInfoLists)
                                        <tr>
                                            <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                                            <td>
                                            <b>{{ trans('mview.ttTwo')}}:</b> {{ $getCeoInfoLists->chief_name }} <br>
                                            <b>{{ trans('mview.ttThree')}}:</b> {{ $getCeoInfoLists->chief_desi}}
                                           </td>
                        
                                            <td>
                                            <img src="{{asset('/')}}{{ $getCeoInfoLists->chief_signature }}" style="width: 100px;" class="show-image"><br>
                                            <img src="{{asset('/')}}{{ $getCeoInfoLists->chief_seal }}" style="width: 100px;" class="show-image">
                                             </td>
                                            <td>
                        
                                                @if( $getCeoInfoLists->status == 1)
                                                <span class="badge bg-success"> সক্রিয় </span>
                                                @else
                        
                                                <span class="badge bg-danger">   নিষ্ক্রিয় </span>
                                               @endif
                        
                                            </td>
                                            <td>
                                                <a  href="{{ route('ngoHeadInformationEditAccept',base64_encode($getCeoInfoLists->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
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
                                            <form method="post" action="{{ route('ngoHeadInformationStore') }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                                @csrf
                                              <!--new code for ngo-->
                                 <div class="mb-3">
                                    <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                                         <input type="text" data-parsley-required  name="chief_name"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                                        <input type="text" data-parsley-required  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                                    </div>
        
        
        
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                            <br>
                                            <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                            <br>
                                        <input type="hidden" required  name="image_base64">
                                        <div class="croppedInput mt-2">
        
                                        </div>
                                        <!-- new code for image cropper start --->
                                        @include('front.signature_modal.sign_main_modal')
                                        <!-- new code for image cropper end -->
        
                                    </div>
        
        
                                    <div class="mb-3">
                                        <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
                                            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
                                         <br>
                                        <button type="button" class="btn btn-custom btn-sm next_button btn22ss">{{ trans('zoom.upload')}}</button>
        
                                        <input type="hidden" required  name="image_seal_base64">
                                        <div class="croppedInputss mt-2">
        
                                        </div>
                                        <!-- new code for image cropper start --->
                                        @include('front.signature_modal.seal_main_modal')
                                        <!-- new code for image cropper end -->
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
        </div>
    </div>

</section>

@endsection

@section('script')
@include('front.zoomButtonImage')
@endsection
