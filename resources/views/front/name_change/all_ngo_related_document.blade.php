@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন  | {{ trans('header.ngo_ab')}}
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
                                <li class="active visited">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <p>আইডি কার্ড এবং ছবি</p>

                                </li>
                                <li class="active visited">
                                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <p>নথিপত্র</p>

                                </li>
                            </ul>
                        </div>

                        <div>
                            <div class="d-flex justify-content-between mb-4">
                                <div class="p-2">
                                    <h5>সকল নথি </h5>
                                </div>
                                <div class="p-2">
                                    <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('addOtherDoc') }}';">
                                       নতুন নথি যুক্ত করুন
                                    </button>
                                </div>
                            </div>
                            <div class="file-content">
                                <div class="card">
                                    <div class="card-body file-manager">
                                        <div class="files">

                                    @foreach($form_eight_list as $key=>$all_ngo_list_all)

                                    <?php

                                    $file_path = url($all_ngo_list_all->pdf_file_list);
                                    $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                                    ?>


                                        <div class="file-box">

                                            <h6>PDF : {{ $key+1 }}</h6>



                                            <div class="file-top">
                                                <i class="fa fa-file-pdf-o txt-primary"></i>
                                            </div>
                                            <div class="mt-2">
                                                <h6>{{ $filename }}</h6>
                                                <p class="mb-1">{{ $all_ngo_list_all->file_size }} {{ trans('other_doc.m_b')}}</p>

                                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}"><i class="fa fa-pencil"></i></button>

                                                <!--modal -->
                                                <div class="modal fade" id="exampleModal{{ $all_ngo_list_all->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Update Data </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{ route('updateOtherDoc') }}" enctype="multipart/form-data" id="form">
                                                                    <input type="hidden" name="id" value="{{ $all_ngo_list_all->id  }}" class="form-control" id="">
                                                                    @csrf

                                                                    <div class="mb-3">

                                                                        <input type="file" name="primary_portal" class="form-control" id="">

                                                                        <iframe src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->pdf_file_list  }}"
            style="width:300px; height:150px;" frameborder="0"></iframe>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">{{ trans('form 8_bn.update')}}</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--model end -->


                                                <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('ngoDocumentDownload',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                                                <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                        <form id="delete-form-{{ $all_ngo_list_all->id }}" action="{{ route('ngoDocument.destroy',$all_ngo_list_all->id) }}" method="POST" style="display: none;">

                                            @csrf
@method('DELETE')
                                        </form>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid d-md-flex justify-content-md-end mt-2">
                                <button type="button" class="btn btn-danger me-3"
                                        onclick="location.href = '{{ route('ngoMemberNidAndImage') }}';">Previous
                                </button>
                                <button type="button" class="btn btn-registration"
                                        onclick="location.href = '{{ route('finalSubmitNameChange') }}';">Submit
                                </button>
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
