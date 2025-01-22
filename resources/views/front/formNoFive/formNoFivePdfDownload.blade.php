<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('fd_one_step_one.f_form')}}</title>

    <style>

        body {
         /* font-family: 'bangla', sans-serif; */
            font-size: 14px;
            height: 11in;
            width: 8.5in;
        }
        table
        {
            width: 100%;
        }



        .pdf_header
        {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .pdf_header h5
        {
            font-size: 20px;
            font-weight: bold;
            padding: 0;
            margin: 0;
        }

        .pdf_header p
        {
            font-size: 14px;
            line-height: 1.3;
            padding: 0;
            margin: 0;
        }
      table td
      {
        vertical-align: top;
      }
        .first_table
        {
            text-align: center;
            margin-bottom: 30px;
        }
        /* .bt
      	{
			font-family: 'banglabold', sans-serif;
		} */

        .number_section
        {
            width: 15px !important;
        }

      .padding-left
      {
        padding-left: 18px;
      }
    </style>
</head>
<body>

    <div class="pdf_header">
        <h5>ফরম নং-৫</h5>
        <p>বার্ষিক প্রতিবেদন</p>

                                       <center>
                                        <span>(প্রকল্প বর্ষ সমাপ্তির ০২ (দুই) মাসের মধ্যে বার্ষিক প্রতিবেদন প্রণয়ন করে এনজিও বিষয়ক ব্যুরোতে প্রদান করতে হবে)</span><br>
                                        <span>বার্ষিক প্রতিবেদন সংক্রান্ত প্রয়োজনীয় তথ্যাদি :</span>
                                    </center>
    </div>

    <table class="">
        <tr>
            <td>ক. প্রকল্পের নাম</td>
            <td>: {{ $formFiveData->prokolpo_name }}</td>
        </tr>
        <tr>
            <td>খ. প্রকল্পের মোট মেয়াদকাল</td>
            <td>: {{ $formFiveData->prokolpo_duration }} </td>
        </tr>

        <tr>
            <td>গ. ব্যুরোর অনুমোদনের নম্বর ও তারিখ</td>
            <td>: {{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFiveData->ngo_registration_number.' ও '.$formFiveData->ngo_registration_date) }} </td>
        </tr>


        <tr>
            <td>ঘ. অনুমোদিত প্রাক্কলিত ব্যয় (বছর ভিত্তিক)</td>
            <td>: {{ $formFiveData->approved_estimated_expenditure_year_wise }}</td>
        </tr>

        <tr>
            <td>ঙ. প্রতিবেদনকালে ছাড়কৃত অর্থের পরিমাণ</td>
            <td>: {{ $formFiveData->received_money_during_report }}</td>
        </tr>

        <tr>
            <td>চ. প্রতিবেদনকাল (প্রকল্প বর্ষ)</td>
            <td>: {{ $formFiveData->report_year }}</td>
        </tr>

        <tr>
            <td>ছ. প্রকল্পের বিবেচ্য সময়ে অর্জনের শতকরা হার</td>
            <td>: {{ $formFiveData->percentage_of_achievement_during_project }}</td>
        </tr>

        <tr>
            <td>জ. প্রতিবেদনকালে বাস্তবায়িত এলাকা</td>
            <td>: {{ $formFiveData->prokolpo_araea }}</td>
        </tr>

    </table>

    <table class="table mt-3 maintable" style="text-align: center;margin-top:15px; border: 1px solid black;
    border-collapse: collapse;">
        <tr style="">
            <th style=" border: 1px solid black;
            border-collapse: collapse;">জেলা</th>
            <th style=" border: 1px solid black;
            border-collapse: collapse;">সিটি কর্পোরেশন/উপজেলা/থানা/পৌরসভা</th>
            <th style=" border: 1px solid black;
            border-collapse: collapse;">ইউনিয়ন/ওয়ার্ড</th>
        </tr>
        @foreach($formNoFiveStepFiveArea as $key=>$prokolpoAreaListAll)
        <tr>
            <td style=" border: 1px solid black;
            border-collapse: collapse;">{{ $prokolpoAreaListAll->district_name }}</td>
            <td style=" border: 1px solid black;
            border-collapse: collapse;">@if( $prokolpoAreaListAll->city_corparation_name == 'অনুগ্রহ করে নির্বাচন করুন')

                @else

                {{ $prokolpoAreaListAll->city_corparation_name  }}

                @endif/{{ $prokolpoAreaListAll->upozila_name }}/{{ $prokolpoAreaListAll->thana_name }}/{{ $prokolpoAreaListAll->municipality_name }}</td>
            <td style=" border: 1px solid black;
            border-collapse: collapse;">{{ $prokolpoAreaListAll->ward_name }}</td>
        </tr>
        @endforeach
    </table>




    <div class="pdf_header">

        <p style="margin-top: 15px;"><b>প্রকল্পের খাতভিত্তিক বিবরণী</b></p>


    </div>



    <div class="table-responsive">


        <table class="table table-bordered mt-3" style="text-align: center;border: 1px solid black;
        border-collapse: collapse;">
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">ক্র : নং :</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">এনেক্সার - সি এর খাত</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">খাত ওয়ারী বাজেট</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কার্যক্রম ও লক্ষ্যমাত্রা</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কার্যক্রম ওয়ারী বিভাজিত বাজেট</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কার্যক্রম ভিত্তিক অর্জিত লক্ষ্যমাত্রা</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কার্যক্রম ভিত্তিক প্রকৃত ব্যয়</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">খাতওয়ারী মোট  প্রকৃত ব্যয়</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" colspan="2">প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি বাস্তব</th>
                {{-- <th>প্রতিবেদনকাল পর্যন্ত পুঞ্জীভূত অগ্রগতি আর্থিক</th> --}}
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">মন্তব্য</th>

            </tr>
            <tr>
                <th>বাস্তব</th>
                <th>আর্থিক</th>
            </tr>
            @foreach($formNoFiveStepTwoData as $key=>$formNoFiveStepTwoDatas)
            <tr>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->sector_of_annexure_C }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->sector_wise_budget}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->activities_and_objectives}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->activity_wise_segmented_budget }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->activity_based_achievement_targets }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->activity_based_actual_costing }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->accounts_payable_total_actual_expenditure }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_real }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->cumulative_progress_during_reporting_in_financial }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepTwoDatas->comment }}</td>

            </tr>
            @endforeach
        </table>

    </div>



    <div class="pdf_header">



        <p style="margin-top: 15px;"><b>উপজেলা ওয়ারী প্রকল্পের আর্থিক বিবরণী (ছক-২)</b></p>


    </div>


    <table class="table table-borderless">
        <tr>
            <td>প্রকল্পের নাম</td>
            <td>: {{ $formFiveData->prokolpo_name_one }}</td>
        </tr>
        <tr>
            <td>প্রতিবেদনাধীন সময়</td>
            <td>: {{ $formFiveData->reporting_period }} </td>
        </tr>

    </table>

    <div class="table-responsive">


        <table class="table table-bordered mt-3" style="text-align: center;border: 1px solid black;
        border-collapse: collapse;">
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">ক্র : নং :</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">জেলার নাম</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">উপজেলার নাম</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">উপজেলার জন্য মোট বরাদ্দ</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">মোট প্রকৃত ব্যয়</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">মন্তব্য</th>

            </tr>

            @foreach($formNoFiveStepThreeData as $key=>$formNoFiveStepThreeDatass)
            <tr>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepThreeDatass->district_name }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepThreeDatass->upazila_name}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepThreeDatass->total_allocation_for_upazila}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepThreeDatass->total_actual_cost }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepThreeDatass->comment }}</td>

            </tr>
            @endforeach
        </table>

    </div>




    <div class="pdf_header">


        <p style="margin-top: 15px;"><b>যানবাহনসহ সংস্থার সকল স্থাবর/অস্থাবর সম্পদের পূর্ণাঙ্গ তালিকা</b></p>


    </div>


    <div class="table-responsive">


        <table class="table table-bordered mt-3" style="text-align: center;border: 1px solid black;
        border-collapse: collapse;">
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">ক্র : নং :</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">সম্পদ / সম্পত্তির বিবরণ</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">পরিমাণ /সংখ্যা</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">প্রাপ্তি/সংগ্রহের তারিখ</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">প্রকৃত ক্রয় মূল্য</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">অর্থের উৎস</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কি কাজে ব্যবহৃত হতেছে</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">অবস্থান(স্থান)</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">বিক্রিত স্থান্তরিত সম্পদ (সংখ্যা /পরিমাণ )</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" colspan="2">সংস্থার শুরু হতে প্রতিবেদনকাল পর্যন্ত ক্রম পুঞ্জীভূত</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" colspan="2">বর্তমান অবস্থা</th>

            </tr>
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">(সংখ্যা /পরিমাণ )</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">সর্বমোট ক্রয়মূল্য </th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">সচল</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">অচল</th>
            </tr>
            @foreach($formNoFiveStepFourData as $key=>$formNoFiveStepFourDatas)
            <tr>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->description_of_property }}({{ $formNoFiveStepFourDatas->sub_property }})</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->quantity}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formNoFiveStepFourDatas->collect_date)}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->real_buying_price }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->fund_source }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->what_is_it_used_for }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->place}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->assets_sold_transferred_number_or_quantity}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->quantity_during_start_of_organization }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFourDatas->total_during_start_of_organization }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">

                    @if($formNoFiveStepFourDatas->current_status == 'সচল')
                    সচল
                    @else

                    @endif

                </td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">

                    @if($formNoFiveStepFourDatas->current_status == 'অচল')
                    অচল
                    @else

                    @endif

                </td>

            </tr>
            @endforeach
        </table>

    </div>

    <table class="table table-borderless mt-3">
        <tr>
            <td>* জমি/যানবাহন  যার নামে রেজিস্ট্রিকৃত তার বিস্তারিত তথ্য উল্লেখ করতে হবে</td>
            <td>: {{ $formFiveData->land_and_transport_detail }}</td>
        </tr>
        <tr>
            <td>* ব্যুরোর অনুমোদনের প্রমাণক সংযুক্ত করতে হবে</td>
            <td>:

                সংযুক্ত

            </td>
        </tr>

    </table>



    <div class="pdf_header">

        <p style="margin-top: 15px;"><b>সংস্থার কর্মকর্তা ও কর্মচারীদের বিদেশ ভ্রমণের বিবরণ</b></p>


    </div>


    <div class="table-responsive">

        <table class="table table-bordered mt-3" style="text-align: center;border: 1px solid black;
        border-collapse: collapse;">
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">ক্র : নং :</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কর্মকর্তা কর্মচারীর নাম ও পদবি</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">যোগদানের তারিখ</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">যে দেশ ভ্রমণ করেছে তার নাম</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">সভা, প্রশিক্ষণ সেমিনার আয়োজনকারী প্রতিষ্ঠানের নাম ও ঠিকানা</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">প্রশিক্ষণ কোর্সের নাম</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">কোর্সের মেয়াদ</th>

                <th style=" border: 1px solid black;
                border-collapse: collapse;" rowspan="2">মোট ব্যয়</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" colspan="2">ব্যয়ের উৎস</th>
                {{-- <th >ব্যয়ের উৎস (দাতা সংস্থার দেশ)</th> --}}

            </tr>
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;" colspan="2">দাতা সংস্থার নাম,দেশ</th>
            </tr>
            @foreach($formNoFiveStepFiveData as $key=>$formNoFiveStepFiveDatas)
            <tr>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->name_of_the_officer }}({{ $formNoFiveStepFiveDatas->designation_of_the_officer }})</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formNoFiveStepFiveDatas->joining_date)}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->travel_country}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->organizing_organization_name }}({{ $formNoFiveStepFiveDatas->organizing_organization_address }})</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->name_of_training_course }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->course_duration }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->total_expense}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->name_of_donor_organization}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->country_name_of_donor_organization }}</td>


            </tr>
            @endforeach
        </table>

    </div>

    <table class="table table-borderless mt-3">
        <tr>
            <td>* সভা, সেমিনার, কর্মশালা,সম্মেলন ইত্যাদিও প্রশিক্ষণ হিসাবে গণ্য হবে</td>
            <td>: {{ $formFiveData->foreign_tour_detail }}</td>
        </tr>
        <tr>
            <td>* দাপ্তরিক কাজে বিদেশ ভ্রমণ শেষে ভ্রমণের অর্জন উল্লেখপূর্বক প্রতিবেদন দাখিলের প্রমাণক সংযুক্ত করতে হবে</td>
            <td>:

                সংযুক্ত



            </td>
        </tr>

    </table>


    <div class="pdf_header">

        <p style="margin-top: 15px;"><b>২৫০০০/- (পঁচিশ হাজার ) টাকার উর্ধ্বে (পরবর্তীতে ন্যূনতম করমুক্ত আয়সীমার সাথে সমন্বয় সাপেক্ষে ) মাসিক বেতন গ্রহণকারী কর্মকর্তা - কর্মচারীদের বিবরণ :</b></p>

    </div>

    <div class="table-responsive">

        <table class="table table-bordered mt-3" style="text-align: center;border: 1px solid black;
        border-collapse: collapse;">
            <tr>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">ক্র : নং :</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">কর্মকর্তা/কর্মচারীর নাম ও জাতীয়তা(দেশি /বিদেশি)</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">পদবি ও দায়িত্ব </th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">শিক্ষাগত যোগ্যতা ও অভিজ্ঞতা</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">বয়স</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">বেতন</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">অন্যান্য ভাতা/সুবিধাদি</th>

                <th style=" border: 1px solid black;
                border-collapse: collapse;">সংস্থায় চাকুরীর মেয়াদ</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">অন্য কোনো প্রকল্প থেকে/গৃহীত আর্থিক বা অন্যান্য সুবিধার বর্ণনা</th>
                <th style=" border: 1px solid black;
                border-collapse: collapse;">মন্তব্য</th>

            </tr>

            @foreach($formNoFiveStepFiveOther as $key=>$formNoFiveStepFiveDatas)
            <tr>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ App\Http\Controllers\NGO\CommonController::englishToBangla($key+1) }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->name_of_the_officer_depend_on_salary }} ও {{ $formNoFiveStepFiveDatas->nationality_of_the_officer_depend_on_salary }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->designation_of_the_officer_depend_on_salary}} ও {{ $formNoFiveStepFiveDatas->responsbility_of_the_officer_depend_on_salary}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->education_of_the_officer_depend_on_salary}} ও {{ $formNoFiveStepFiveDatas->experience_of_the_officer_depend_on_salary}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->age_of_the_officer_depend_on_salary }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->salary_of_the_officer_depend_on_salary }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->other_allowances_or_benefits_of_the_officer_depend_on_salary }}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->job_duration_of_the_officer_depend_on_salary}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->financial_benefit_received_from_any_other_scheme}}</td>
                <td style=" border: 1px solid black;
                border-collapse: collapse;">{{ $formNoFiveStepFiveDatas->comment }}</td>


            </tr>
            @endforeach
        </table>


    </div>

    <table class="table table-borderless mt-3">

        <tr>
            <td style="text-align: left;">

                <table style=" margin-top: 15px;width:100%">

                    <tr>
                        <td style="text-align: left;" ><img  src="{{ asset('/') }}{{ $formFiveData->report_preparar_sign }}"/></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" >{{ App\Http\Controllers\NGO\CommonController::englishToBangla($formFiveData->report_preparar_date) }}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;" ><img  src="{{ asset('/')}}{{ $formFiveData->report_preparar_seal }}"/></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;padding-top:15px;" >রিপোর্ট প্রুস্তুতকারীর স্বাক্ষর ও সিল :</td>
                    </tr>
                </table>

            </td>
            <td></td>
            <td style="text-align: right;padding-top:150px;">এনজিও প্রধানের স্বাক্ষর ও সিল :</td>
        </tr>

    </table>


</body>
</html>
