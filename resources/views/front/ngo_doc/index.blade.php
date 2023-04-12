@extends('front.master.master')

@section('title')
{{ trans('other_doc.reg')}}| {{ trans('header.ngo_ab')}}
@endsection

@section('css')

@endsection

@section('body')
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
                    <div class="d-flex justify-content-between mb-4">
                        <div class="p-2">
                            <h5>{{ trans('other_doc.all_doc')}}</h5>
                        </div>
                        <div class="p-2">
                            <button class="btn btn-primary btn-custom" type="button" onclick="location.href = '{{ route('ngo_document_create') }}';">
                                {{ trans('other_doc.add_new_document')}}
                            </button>
                        </div>
                    </div>
                    <div class="file-content">
                        <div class="card">
                            <div class="card-body file-manager">
                                <div class="files">

                                    @foreach($ngo_list_all as $key=>$all_ngo_list_all)

                                <?php

                                $file_path = url($all_ngo_list_all->primary_portal);
                                $filename  = pathinfo($file_path, PATHINFO_FILENAME);






                                ?>


                                    <div class="file-box">

                                        @if($key+1 == 1)

                                            @if(session()->get('locale') == 'en')
                                            <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                            @else

                                            <h6>Executive committee of primary registering authority and attested copy</h6>
                                            @endif

                                        @elseif($key+1 == 2)

                                        @if(session()->get('locale') == 'en')
                                        <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                        @else

                                        <h6>Attested copy of constitution</h6>
                                        @endif

                                        @elseif($key+1 == 3)

                                        @if(session()->get('locale') == 'en')
                                        <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                        @else

                                        <h6>Activity report of the organization</h6>
                                        @endif

                                        @elseif($key+1 == 4)


                                        @if(session()->get('locale') == 'en')
                                        <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                        @else

                                        <h6>Donors Receipt</h6>
                                        @endif



                                        @elseif($key+1 == 5)

                                        @if(session()->get('locale') == 'en')
                                        <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                        @else

                                        <h6>Attested copy of the minutes of the general meeting regarding</h6>
                                        @endif
                                        @endif



                                        <div class="file-top">
                                            <i class="fa fa-file-image-o txt-primary"></i>
                                        </div>
                                        <div class="mt-2">
                                            <h6>{{ $filename }}</h6>
                                            <p class="mb-1">{{ $all_ngo_list_all->primary_portal_size }} {{ trans('other_doc.m_b')}}</p>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $all_ngo_list_all->id  }}"><i class="fa fa-pencil"></i></button>

                                                    <!--modal -->
                                                    <div class="modal fade" id="exampleModal{{ $all_ngo_list_all->id  }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"> @if($key+1 == 1)

                                                                        @if(session()->get('locale') == 'en')
                                                                        <h6>কমিটির তালিকা ও নিবন্ধন সনদপত্রের সত্যায়িত অনুলিপি</h6>
                                                                        @else

                                                                        <h6>Executive committee of primary registering authority and attested copy</h6>
                                                                        @endif

                                                                    @elseif($key+1 == 2)

                                                                    @if(session()->get('locale') == 'en')
                                                                    <h6>গঠনতন্ত্রের সত্যায়িত অনুলিপি</h6>
                                                                    @else

                                                                    <h6>Attested copy of constitution</h6>
                                                                    @endif

                                                                    @elseif($key+1 == 3)

                                                                    @if(session()->get('locale') == 'en')
                                                                    <h6>সংস্থার কার্যক্রম প্রতিবেদন</h6>
                                                                    @else

                                                                    <h6>Activity report of the organization</h6>
                                                                    @endif

                                                                    @elseif($key+1 == 4)


                                                                    @if(session()->get('locale') == 'en')
                                                                    <h6>দাতা সংস্হার প্রতিশুতিপত্র</h6>
                                                                    @else

                                                                    <h6>Donors Receipt</h6>
                                                                    @endif



                                                                    @elseif($key+1 == 5)

                                                                    @if(session()->get('locale') == 'en')
                                                                    <h6>সাধারণ সভার কার্যবিবরণীর সত্যায়িত অনুলিপি</h6>
                                                                    @else

                                                                    <h6>Attested copy of the minutes of the general meeting regarding</h6>
                                                                    @endif
                                                                    @endif</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" action="{{ route('ngo_document_update') }}" enctype="multipart/form-data">
                                                                        <input type="hidden" name="id" value="{{ $all_ngo_list_all->id  }}" class="form-control" id="">
                                                                        @csrf

                                                                        <div class="mb-3">

                                                                            <input type="file" name="primary_portal" class="form-control" id="">

                                                                            <iframe src="{{ asset('/') }}{{'public/'. $all_ngo_list_all->primary_portal  }}"
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

                                            <a class="btn btn-sm btn-registration" target="_blank"  href = '{{ route('ngo_document_download',$all_ngo_list_all->id) }}'><i class="fa fa-download"></i></a>
                                            <button  onclick="deleteTag({{ $all_ngo_list_all->id}})" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <form id="delete-form-{{ $all_ngo_list_all->id }}" action="{{ route('ngo_document_delete',$all_ngo_list_all->id) }}" method="POST" style="display: none;">

                                        @csrf

                                    </form>
                                    @endforeach

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
