@extends('front.master.master')

@section('title')
{{ trans('first_info.dash')}} | {{ trans('header.ngo_ab')}}
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
                        <div class="p-2 flex-grow-1 bd-highlight"> <h4>{{ trans('first_info.profile')}}</h4></div>
                        @if(empty($get_reg_id))
                        <div class="p-2 bd-highlight"> <button class="btn  btn-registration" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ trans('first_info.edit')}}</button></div>
                        <div class="p-2 bd-highlight"> <a class="btn btn-registration" href="{{route('ngoCeoInfo.create')}}">{{ trans('ngo_member_doc.ceoInfo')}}</a></div>
                        @endif
                      </div>
                    {{-- <div class="user_dashboard_right">
                  
                    </div> --}}

                    @include('flash_message')
                    <div class="row mt-4">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>{{ trans('first_info.name')}}</td>
                                            <td>: {{ Auth::user()->user_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('first_info.email')}}</td>
                                            <td>: {{ Auth::user()->email }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Password</td>
                                            <td>: **********</td>
                                        </tr> --}}
                                        <tr>
                                            <td>{{ trans('first_info.e_verified')}}</td>
                                            @if(Auth::user()->is_email_verified == 1)
                                            <td>: {{ trans('first_info.yes')}}</td>
                                            @else
                                            <td>: {{ trans('first_info.no')}}</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>{{ trans('header.phone_number')}}</td>
                                            <td>:
                                                @if(session()->get('locale') == 'en')
                                                {{ App\Http\Controllers\NGO\CommonController::englishToBangla(Auth::user()->user_phone) }}

                                                @else
                                                {{ Auth::user()->user_phone}}
                                                @endif
                                            </td>
                                        </tr>
                                        {{-- <tr>
                                            <td>Country</td>
                                            <td>: Bangladesh</td>
                                        </tr> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="card">
                                @if($foreignNgoType == 'Old')
                                <div class="card-header"> NGO Renew Status</div>
                                @else
                                <div class="card-header">{{ trans('first_info.ngo_status')}}</div>
                                @endif
                                <div class="card-body">

                                   <table class="table table-borderless">

                                    @if(empty($fdoneFormId))

                                    <tr>
                                        @if($foreignNgoType == 'Old')
<td>{{ trans('first_info.fd_eight')}}</td>
                                        @else
                                        <td>{{ trans('first_info.fd_one')}}</td>
                                        @endif
                                        <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
                                    </tr>



                                    @else
                                    <tr>
                                        @if($foreignNgoType == 'Old')
                                        <td>{{ trans('first_info.fd_eight')}}</td>
                                                                                @else
                                                                                <td>{{ trans('first_info.fd_one')}}</td>
                                                                                @endif
                                        <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
                                    </tr>
                                       @endif

                                       @if($foreignNgoType == 'Old')

                                       @if(count($data3_m_one) > 0)
                                       <tr>
                                        <td>{{ trans('first_info.other_info')}}</td>
                                        <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
                                    </tr>
                                       @else
                                       <tr>
                                           <td>{{ trans('first_info.other_info')}}</td>
                                           <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
                                       </tr>
                                       @endif

                                       @else

                                    
@if(count($ngoOtherDocLists) > 0)
<tr>
 <td>{{ trans('first_info.other_info')}}</td>
 <td><span class="badge bg-success">{{ trans('first_info.complete')}}</span></td>
</tr>
@else
<tr>
    <td>{{ trans('first_info.other_info')}}</td>
    <td><span class="badge bg-danger">{{ trans('first_info.incomplete')}}</span></td>
</tr>
@endif
                                       @endif
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('first_info.update')}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('register.update') }}"  enctype="multipart/form-data" id="form" data-parsley-validate="">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ trans('header.person_name')}}</label>
                    <input type="text" value="{{ Auth::user()->user_name }}" class="form-control" name="name" id="">

                    <input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="id" id="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{ trans('header.email')}}</label>
                    <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" id="" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ trans('header.password')}}</label>
                    <input type="password" class="form-control" name="password" id="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ trans('header.phone_number')}}</label>
                    <input type="text" value="{{ Auth::user()->user_phone }}" class="form-control" name="phone" id="">
                    {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ trans('fd_one_step_one.Address')}}</label>
                    <input type="text" value="{{ Auth::user()->user_address }}" class="form-control" name="address" id="">
                    {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{ trans('ngo_member_doc.imageOne')}}</label>
                    <input type="file" value="" class="form-control" name="user_image" id="">
                    {{-- <div id="" class="form-text">Must be use valid phone number for varification</div> --}}
                    @if(empty(Auth::user()->user_image))
                    <img src="{{ asset('/') }}public/mainu.jpg" style="height:50px;"/>
                    @else
                    <img src="{{ asset('/') }}{{ Auth::user()->user_image }}" style="height:50px;"/>
                    @endif
                </div>
                <div class="d-grid d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-registration">{{ trans('first_info.update1')}}</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection

@section('script')

@endsection
