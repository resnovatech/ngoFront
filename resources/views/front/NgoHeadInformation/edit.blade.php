@extends('front.master.master')

@section('title')
{{ trans('ngo_member_doc.ceoInfoList')}} | {{ trans('header.ngo_ab')}}
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
                                    <form method="post" action="{{ route('ngoHeadInformationUpdate',$getCeoInfoListEdit->id) }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                                        @csrf
                                        @method('PUT')
                                      <!--new code for ngo-->
                         <div class="mb-3">
                            <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                                 <input type="text" data-parsley-required  name="chief_name" value="{{$getCeoInfoListEdit->chief_name}}"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                                <input type="text" data-parsley-required  name="chief_desi" value="{{$getCeoInfoListEdit->chief_desi}}"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                            </div>



                            <div class="mb-3">
                                <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}:
                                    <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
                    <br>
                                    <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
                    <br>
                                <input type="hidden"   name="image_base64">
                                <div class="croppedInput mt-2">
                                    <img src="{{asset('/')}}{{ $getCeoInfoListEdit->chief_signature }}" style="width: 200px;" class="show-image">
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
                                    <img src="{{asset('/')}}{{ $getCeoInfoListEdit->chief_seal }}" style="width: 200px;" class="show-image">
                                </div>
                                <!-- new code for image cropper start --->
                                @include('front.signature_modal.seal_main_modal')
                                <!-- new code for image cropper end -->
                            </div>
                            <!-- end new code -->

                            <div class="mb-3">
                                <label for="" class="form-label">স্ট্যাটাস: <span class="text-danger">*</span></label>

                                <select data-parsley-required  name="status"   class="form-control">
                                    <option value="1" {{ $getCeoInfoListEdit->status == 1 ? 'selected':'' }}>সক্রিয়</option>
                                    <option value="0" {{ $getCeoInfoListEdit->status == 0 ? 'selected':'' }}>নিষ্ক্রিয় </option>
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
