@extends('front.master.master')

@section('title')
এনজিওর নাম পরিবর্তন | {{ trans('header.ngo_ab')}}
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

            <?php
$fdOneFormid = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->first();
            $name_change_list = DB::table('ngo_name_changes')->where('fd_one_form_id',$fdOneFormid->id)->latest()->value('status');




            ?>
            <div class="col-lg-9 col-md-6 col-sm-12">

                @include('flash_message')

                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="name_change_box">




                                    {{-- <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="others_inner_section">
                                                <h1>এনজিও নাম পরিবর্তন তথ্য</h1>
                                                <div class="notice_underline"></div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="no_name_change pt-4">
                                        <div class="others_inner_section mb-4">
                                            <h1>নাম পরিবর্তন সংক্রান্ত  সব নথি</h1>
                                            <div class="notice_underline"></div>
                                        </div>
                                        <div class="row">


                                            <!-- new code in table formate start --->

                                            <table class="table table-bordered">
                                                @foreach($nameChangeInfoDoc as $key=>$AllNameChangeInfoDoc)
                                                <tr>
                                                    <td>
                                                        @if(($key+1) ==1)



                                                            ০২টি জাতীয় পত্রিকায় (বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি



                                                        @elseif(($key+1) ==2)

                                                        নাম পরিবর্তন ফি বাবদ- ২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ অনুলিপি


                                                       @elseif(($key+1) ==3)

                                                            গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপিসহ


                                                       @elseif(($key+1) ==4)




                                                        ফরম -৮ মোতাবেক নির্বাহী কমিটির তালিকা



                                                       @elseif(($key+1) ==5)


                                                        নির্বাহী কমিটির সদস্যদের ভোটার আইডি কার্ডের ফটোকপিসহ সত্যায়িত পাসপোর্ট সাইজের ছবি



                                                       @elseif(($key+1) ==6)



                                                        ৩০০/-(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি





                                                       @elseif(($key+1) ==7)


                                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র


                                                       @elseif(($key+1) ==8)


                                                        পরিবর্তিত নামে প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের সত্যায়িত সনদপত্রের কপি


                                                       @elseif(($key+1) ==9)


                                                        প্রাথমিক নিবন্ধন প্রদানকারী কর্তৃপক্ষের অনুমোদিত নির্বাহী কমিটির তালিকার সত্যায়িত কপি




                                                       @elseif(($key+1) ==10)


                                                        সর্বশেষ সাধারণ সদস্যদের তালিকা


                                                        @elseif(($key+1) == 11)


                                                            নাম পরিবর্তন সংক্রান্ত বিষয়ে সাধারণ সভার কার্যবিবরণীর (উপস্থিত সদস্যদের তালিকাসহ) সত্যায়িত কপি



                                                            @elseif(($key+1) == 12)


                                                                পূর্ববর্তী নামের সকল দায়-দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অংগীকার নামা (সভাপতি ও সাধারণ সম্পাদক কর্তৃক স্বাক্ষরিত)।


                                                                @elseif(($key+1) == 13)


                                                                    দাখিলকৃত চালানের উপর ১৫% ভ্যাট নির্ধারিত কোডে জমাপূর্বক চালানের মূলকপিসহ (কোড নং-১-১১৩৩-০০৩৫-০৩১১)




                                                       @elseif(($key+1) ==14)


                                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
                                                        জমাপূর্বক চালানের মুলকপিসহ





                                                       @elseif(($key+1) ==15)


                                                        প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি



                                                       @elseif(($key+1) ==16)



                                                        সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি



                                                       @elseif(($key+1) ==17)


                                                        গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি


                                                       @elseif(($key+1) ==18)


                                                        গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি

                                                       @elseif(($key+1) ==19)


                                                        পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)

                                                       @endif
                                                    </td>
                                                    <td>


                                                        <div class="d-flex justify-content-between mt-3">
                                                            <div class="">


                                                            </div>
                                                            <div class="">

                                                                <a target="_blank" data-toggle="tooltip" data-placement="top" title="{{ trans('form 8_bn.download_pdf')}}"  class="btn btn-sm btn-registration"  href="{{ route('nameChangeDocDownload',$AllNameChangeInfoDoc->id) }}" >
                                                                    <i class="fa fa-print"></i>
                                                                </a>
                                                                <button type="button"  class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $AllNameChangeInfoDoc->id}}"><i
                                                                    class="bi bi-pencil-fill"></i></button>
                                                            </div>
                                                        </div>




                                                            <div class="modal modal-xl fade" id="exampleModal{{ $AllNameChangeInfoDoc->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            @if(($key+1) ==1)

                                                                            ০২টি জাতীয় পত্রিকায় (বাংলা ও ইংরেজী পত্রিকায়) নাম পরিবর্তন বিষয়ে বিজ্ঞাপনের মূলকপি

                                                                        @elseif(($key+1) ==2)

                                                                            নাম পরিবর্তন ফি বাবদ-২৬,০০০/- (ছাব্বিশ হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ

                                                                       @elseif(($key+1) ==3)

                                                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ- ১৩,০০০/- (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% (কোড নং -১-১১৩৩-০০৩৫-০৩১১) জমাপূর্বক চালানের মূলকপিসহ

                                                                       @elseif(($key+1) ==4)

                                                                        সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টির তালিকা ( সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত )

                                                                       @elseif(($key+1) ==5)

                                                                       নাম পরিবর্তন বিষয়ে সংশ্লিষ্ট দেশের বোর্ড অব ডিরেক্টরস /বোর্ড অব ট্রাস্টির সিদ্ধান্তের কপি  (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কর্তৃক নোটারীকৃত মূলকপিসহ )

                                                                       @elseif(($key+1) ==6)

                                                                        ৩০০/-(তিনশত) টাকার স্টাম্পে নাম পরিবর্তনের বিষয়ে এফিডেবিট এর কপি

                                                                       @elseif(($key+1) ==7)

                                                                        এনজিও বিষয়ক ব্যুরোর মূল সনদপত্র

                                                                       @elseif(($key+1) ==8)


                                                                        সংস্থার পরিবর্তিত নামের সনদপত্র /ইনকর্পোরেটর সার্টিফিকেট (সংশ্লিষ্ট দেশের নোটারীকৃত মূলকপি )


                                                                       @elseif(($key+1) ==9)


                                                                        সংস্থার পরিবর্তিত নামের বাই লজ (By Laws)/গঠনতন্ত্রের কপি (সংশ্লিষ্ট দেশের পিস অব জাস্টিস কতৃক নোটারীকৃত মূলকপিসহ )

                                                                       @elseif(($key+1) ==10)


                                                                        সংস্থার পূর্ববর্তী নামের সকল দায় -দায়িত্ব বর্তমানে পরিবর্তিত নামের সংস্থার উপর বর্তাইবে মর্মে অঙ্গীকার নামা (সংস্থার প্রধান কতৃক স্বাক্ষরিত )


                                                                       @elseif(($key+1) ==11)


                                                                        ২০১০-২০১১ অর্থবছর হতে হালনাগাদ পর্যন্ত সংস্থার নিবন্ধন/নিবন্ধন নবায়ন /নাম পরিবর্তন /গঠনতন্ত্রের যে কোনো ধারা পরিবর্তনের বিষয়ের দাখিলকৃত ফি এর ১৫% বকেয়া ভ্যাট (যদি ইতিমধ্যে প্রদান করা হয়ে না থাকে ) সংশ্লিষ্ট কোডে
                                                                        জমাপূর্বক চালানের মুলকপিসহ


                                                                       @elseif(($key+1) ==12)


                                                                        গঠনতন্ত্র পরিবর্তন ফি বাবদ-১৩,০০০/ (তের হাজার) টাকার (কোড নং-১-০৩২৩-০০০০- ১৮৩৬) চালানের মূলকপি এবং ১৫% ভ্যাট (কোড নং - ১-১১৩৩ -০০৩৫ - ০৩১১) প্রদানপূর্বক চালানের মূলকপিসহ

                                                                       @elseif(($key+1) ==13)

                                                                        প্রাথমিক নিবন্ধনকারী কতৃপক্ষের অনুমোদিতো গঠনতন্ত্রের সত্যায়িত কপি

                                                                       @elseif(($key+1) ==14)

                                                                        সংস্থার চেয়ারম্যান ও সেক্রেটারি কর্তৃক যৌথ স্বাক্ষরিত গঠনতন্ত্র পরিচ্ছন্ন কপি

                                                                       @elseif(($key+1) ==15)

                                                                        গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ফি জমা প্রদানের চালানের মূলকপি

                                                                       @elseif(($key+1) ==16)

                                                                        গঠনতন্ত্রের কোন ধারা, উপধারা পরিবর্তন ও সংযোজনের বিষয়ে সাধারণ সভার কার্যবিবরণীর সত্যায়িত কপি

                                                                       @elseif(($key+1) ==17)

                                                                        পূর্ব গঠনতন্ত্র ও বর্তমান গঠনতন্ত্রের তুলনামূলক বিবরণী (প্রতি পাতায় সভাপতি ও সম্পাদকের যৌথ স্বাক্ষরসহ)

                                                                       @endif
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <form method="post" action="{{ route('nameChangeSingleFile',$AllNameChangeInfoDoc->id ) }}" enctype="multipart/form-data" id="form" data-parsley-validate="">

                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3">

                                                                                                <input type="file" accept=".pdf" data-parsley-required name="nameChangeFile"  class="form-control" id="">
                                                                                            </div>


                                                                                        </div>
                                                                                        <button type="submit" class="btn btn-registration"
                                                                                        >{{ trans('form 8_bn.update')}}
                                                                                 </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>




                                                    </td>
                                                </tr>
                                                @endforeach

                                            </table>


                                            <!-- new code in table formate end -->

                                            <div class="d-grid d-md-flex justify-content-md-end">
                                                <a href="{{ url()->previous() }}" class="btn btn-secondary"
                                                    >পিছনে যান
                                        </a>

                                                <a href="{{ route('nameChange.view',base64_encode($nameChangeInfo->id)) }}" style="margin-left: 10px;" class="btn btn-registration"
                                                        >জমা দিন
                                    </a>
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
    </div>

</section>

@endsection

@section('script')
<script type="text/javascript">
    function editTag(id) {
        swal({
            title: '{{ trans('notification.success_one')}}',
            text: "{{ trans('notification.success_two')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'হ্যাঁ, এটি পাঠান !',
            cancelButtonText: '{{ trans('notification.success_four')}}',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {


                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();


            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    '{{ trans('notification.success_five')}}',
                    'আপনার আবেদন পাঠানো হয়নি :)',
                    'error'
                )
            }
        })
    }
</script>
@endsection
