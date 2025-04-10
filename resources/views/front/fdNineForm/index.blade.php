@extends('front.master.master')

@section('title')
এফডি -৯ ফরম  | {{ trans('header.ngo_ab')}}
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
                        <div class="name_change_box">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="others_inner_section">
                                        <h1>এফডি -৯ ফরম </h1>
                                        @include('flash_message')
                                        <div class="notice_underline"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">

                                    <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
$name_change_list = DB::table('fd9_forms')->where('fd_one_form_id',$fdOneFormid->id)
->latest()->value('status');




            ?>

                                    <div class="d-grid d-md-flex justify-content-end">

                                        @if(  $name_change_list == 'Ongoing1' || $name_change_list == '1Review')

                                        <button type="button" disabled class="btn btn-registration"
                                        onclick="location.href = '{{ route('fdNineForm.create') }}';">নতুন অ্যাপ্লিকেশন যোগ করুন
                                </button>

                                        @else
                                        <button type="button" class="btn btn-registration"
                                                onclick="location.href = '{{ route('fdNineForm.create') }}';">নতুন অ্যাপ্লিকেশন যোগ করুন
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @if(count($fd9List) == 0)
                            <div class="no_name_change">
                                <div class="d-flex justify-content-center pt-5">
                                    <img src="{{ asset('/') }}public/noresult.png" alt="" width="120" height="120">
                                </div>
                                <div class="text-center">
                                    <h5>কোনো সত্যায়ন ফরম এর তালিকা নেই</h5>
                                </div>
                            </div>
                            @else
                            <div class="no_name_change pt-4">
                                <h5 class="pb-3">বিদেশি নাগরিক নিয়োগপত্র সত্যায়ন ফরম এর তালিকা</h5>



                                <table class="table table-bordered">
                                    <tr>
                                        <th>ক্রমিক নং </th>
                                        <th>বিদেশি নাগরিকের নাম</th>
                                        <th>পাসপোর্ট নম্বর</th>
                                        <th>জাতীয়তা / নাগরিকত্ব</th>
                                        <th>স্ট্যাটাস</th>
                                        <th>অপারেশন</th>
                                    </tr>
                                    @foreach($fd9List as $key=>$allFd9List)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $allFd9List->fd9_foreigner_name }}</td>
                                        <td>{{ $allFd9List->fd9_passport_number }}</td>
                                        <td>{{ $allFd9List->fd9_nationality_or_citizenship }}</td>
                                        <td>                                    @if(empty($allFd9List->status))
                                            <span class="text-success">চলমান</span>
@elseif($allFd9List->status == 'Accepted')
<span class="text-success">গৃহীত</span>

@elseif($allFd9List->status == 'Ongoing')
<span class="text-success">চলমান</span>

@else
<span class="text-success">খারিজ</span>

@endif</td>
                                        <td>

                                            @if(  $allFd9List->status == 'Ongoing' || $allFd9List->status == 'Accepted')

                                            @else

                                            <a  href="{{ route('fdNineForm.edit',base64_encode($allFd9List->id)) }}" class="btn btn-sm btn-outline-primary"> <i class="fa fa-pencil"></i> </a>
                                            @endif




                                            <a  href="{{ route('fdNineForm.show',base64_encode($allFd9List->id)) }}" class="btn btn-sm btn-outline-success"> <i class="fa fa-eye"></i> </a>




                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
