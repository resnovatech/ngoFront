@extends('front.master.master')

@section('title')
{{ trans('first_info.dash')}} | {{ trans('header.ngo_ab')}}
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
                        <div class="d-flex bd-highlight">
                            <div class="p-2 flex-grow-1 bd-highlight"></div>
                            <div class="p-2 bd-highlight"> <button class="btn  btn-registration" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ trans('ngo_member_doc.ceoInfoList')}}</button></div>
                          </div>
                          <form method="post" action="{{ route('ngoCeoInfo.update',$getCeoInfoListEdit->id) }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                            @csrf
                            @method('PUT')
                          <!--new code for ngo-->
             <div class="mb-3">
                <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
                     <input type="text" data-parsley-required  name="chief_name" value="{{$getCeoInfoListEdit->ceo_name}}"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
                    <input type="text" data-parsley-required  name="chief_desi" value="{{$getCeoInfoListEdit->ceo_designation}}"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
                </div>



                <div class="mb-3">
                    <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}:
                        <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>
        <br>
                        <button type="button" class="btn btn-custom btn-sm next_button btn22">{{ trans('zoom.upload')}}</button>
        <br>
                    <input type="hidden"   name="image_base64">
                    <div class="croppedInput mt-2">
                        <img src="{{asset('/')}}{{ $getCeoInfoListEdit->ceo_signature }}" style="width: 200px;" class="show-image">
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
                        <img src="{{asset('/')}}{{ $getCeoInfoListEdit->ceo_seal }}" style="width: 200px;" class="show-image">
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

</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('first_info.update')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th>ক্র : নং :</th>
                    <th>{{ trans('mview.ttTwo')}}</th>
                    <th>{{ trans('mview.ttThree')}}</th>
                    <th>{{ trans('zoom.digitalSignature')}}</th>
                    <th>{{ trans('zoom.digitalSeal')}}</th>
                    <th>স্ট্যাটাস</th>
                    <th>কর্ম পরিকল্পনা</th>
                </tr>
                @foreach($getCeoInfoList as $key=>$getCeoInfoLists)
                <tr>
                    <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                    <td>{{ $getCeoInfoLists->ceo_name }}</td>
                    <td>{{ $getCeoInfoLists->ceo_designation}}</td>

                    <td><img src="{{asset('/')}}{{ $getCeoInfoLists->ceo_signature }}" style="width: 100px;" class="show-image"></td>
                    <td><img src="{{asset('/')}}{{ $getCeoInfoLists->ceo_seal }}" style="width: 100px;" class="show-image"></td>
                    <td>

                        @if( $getCeoInfoLists->status == 1)
                        <span class="badge bg-success"> সক্রিয় </span>
                        @else

                        <span class="badge bg-danger">   নিষ্ক্রিয় </span>
                       @endif

                    </td>
                    <td>
                        <a  href="{{ route('ceoInfoUpdate',base64_encode($getCeoInfoLists->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('script')
@include('front.zoomButtonImage')
@endsection
