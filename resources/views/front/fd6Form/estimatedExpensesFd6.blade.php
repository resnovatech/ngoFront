<table class="table table-bordered">

    @if($fd6FormList->new_prokolpo_year == '১ম বছর')

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th >১ম বছর 
            
            <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div>
    
    </th>

        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
        <th rowspan="2"></th>
    </tr>
    <tr style="text-align: center;">
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_first))) }}</th>
    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td rowspan="3">{{ $fd6FormList->total_donors_comment }}</td>
        <td>
            <a type="a" id="1" onclick="deleteTagExp(1)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year) }}</td>
        <td>
            <a type="a" id="2" onclick="deleteTagExp(1)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year) }}</td>
        <td>
            <a type="a" id="3" onclick="deleteTagExp(1)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>মোট</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year) }}</td>
        <td></td>
    </tr>

    @elseif($fd6FormList->new_prokolpo_year == '২য় বছর')

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর   <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
        <th rowspan="2"></th>
    </tr>
    <tr style="text-align: center;">
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_first))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_second)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_second))) }}</th>
    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_second_year + $fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td rowspan="3">{{ $fd6FormList->total_donors_comment }}</td>
        <td>
            <a type="a" id="1" onclick="deleteTagExp(2)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year + $fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>
        <td>
            <a type="a" id="2" onclick="deleteTagExp(2)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year + $fd6FormList->local_grants_second_year) }}</td>
        <td>
            <a type="a" id="3" onclick="deleteTagExp(2)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>মোট</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year + $fd6FormList->total_second_year) }}</td>
        <td></td>
    </tr>

    @elseif($fd6FormList->new_prokolpo_year == '৩য় বছর')

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>৩য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="3" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>


        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
        <th rowspan="2"></th>
    </tr>
    <tr style="text-align: center;">
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_first))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_second)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_second))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_third)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_third))) }}</th>
    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_third_year + $fd6FormList->grants_received_from_abroad_second_year + $fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td rowspan="3">{{ $fd6FormList->total_donors_comment }}</td>
        <td>
            <a type="a" id="1" onclick="deleteTagExp(3)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_third_year + $fd6FormList->donations_made_by_foreign_donors_first_year + $fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>

        <td>
            <a type="a" id="2" onclick="deleteTagExp(3)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_third_year + $fd6FormList->local_grants_first_year + $fd6FormList->local_grants_second_year) }}</td>
        <td>
            <a type="a" id="3" onclick="deleteTagExp(3)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>মোট</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_third_year + $fd6FormList->total_first_year + $fd6FormList->total_second_year) }}</td>
        <td></td>
    </tr>


    @elseif($fd6FormList->new_prokolpo_year == '৪র্থ বছর')

    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>৩য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="3" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>৪র্থ বছর <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="4" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>

        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
        <th rowspan="2"></th>
    </tr>
    <tr style="text-align: center;">
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_first))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_second)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_second))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_third)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_third))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_fourth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_fourth))) }}</th>

    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_fourth_year + $fd6FormList->grants_received_from_abroad_third_year + $fd6FormList->grants_received_from_abroad_second_year + $fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td rowspan="3">{{ $fd6FormList->total_donors_comment }}</td>
        <td>
            <a type="a" id="1" onclick="deleteTagExp(4)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_fourth_year + $fd6FormList->donations_made_by_foreign_donors_third_year + $fd6FormList->donations_made_by_foreign_donors_first_year + $fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>
<td>
    <a type="a" id="2" onclick="deleteTagExp(4)" class="btn btn-sm btn-outline-danger"><i
        class="bi bi-trash"></i></a>
</td>
    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_fourth_year + $fd6FormList->local_grants_third_year + $fd6FormList->local_grants_first_year + $fd6FormList->local_grants_second_year) }}</td>
        <td>
            <a type="a" id="3" onclick="deleteTagExp(4)" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></a>
        </td>
    </tr>
    <tr>
        <td>মোট</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_fourth_year + $fd6FormList->total_third_year + $fd6FormList->total_first_year + $fd6FormList->total_second_year) }}</td>
        <td></td>
    </tr>


    @elseif($fd6FormList->new_prokolpo_year == '৫ম বছর')

    <tr>
        <th rowspan="3" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="1" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>২য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="2" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>৩য় বছর  <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="3" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>৪র্থ বছর <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="4" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th>৫ম বছর <div class="d-flex justify-content-center">


            <a class="btn btn-sm btn-outline-primary expenseEditModalup" data-year="5" id="{{$fd6FormList->id}}">
                <i class="fa fa-pencil"></i>
            </a>



        </div></th>
        <th rowspan="3">মোট</th>
        <th rowspan="3">মন্তব্য</th>

    </tr>
    <tr style="text-align: center;">
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_first))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_second)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_second))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_third)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_third))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_fourth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_fourth))) }}</th>
        <th>{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_start_date_fifth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($fd6FormList->prokolpo_year_grant_end_date_fifth))) }}</th>
    </tr>
    <tr style="text-align: center;">

    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_fifth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->grants_received_from_abroad_fifth_year+$fd6FormList->grants_received_from_abroad_fourth_year + $fd6FormList->grants_received_from_abroad_third_year + $fd6FormList->grants_received_from_abroad_second_year + $fd6FormList->grants_received_from_abroad_first_year) }}</td>
        <td rowspan="3">{{ $fd6FormList->total_donors_comment }}</td>

    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_fifth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->donations_made_by_foreign_donors_fifth_year + $fd6FormList->donations_made_by_foreign_donors_fourth_year + $fd6FormList->donations_made_by_foreign_donors_third_year + $fd6FormList->donations_made_by_foreign_donors_first_year + $fd6FormList->donations_made_by_foreign_donors_second_year) }}</td>

    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_fifth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->local_grants_fifth_year + $fd6FormList->local_grants_fourth_year + $fd6FormList->local_grants_third_year + $fd6FormList->local_grants_first_year + $fd6FormList->local_grants_second_year) }}</td>

    </tr>
    <tr>
        <td>মোট</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_first_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_second_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_third_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_fourth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_fifth_year) }}</td>
        <td>{{ App\Http\Controllers\NGO\CommonController::englishToBangla($fd6FormList->total_fifth_year + $fd6FormList->total_fourth_year + $fd6FormList->total_third_year + $fd6FormList->total_first_year + $fd6FormList->total_second_year) }}</td>
        <td></td>

    </tr>

    @else
    <tr>
        <th rowspan="2" >অর্থের উৎসের বিবরণ:</th>
        <th>১ম বছর</th>
        <th>২য় বছর</th>
        <th>৩য় বছর</th>
        <th>৪র্থ বছর</th>
        <th>৫ম বছর</th>
        <th rowspan="2">মোট</th>
        <th rowspan="2">মন্তব্য</th>
    </tr>
    <tr style="text-align: center;">
        <th>তারিখ</th>
        <th>তারিখ </th>
        <th>তারিখ</th>
        <th>তারিখ </th>
        <th>তারিখ</th>
    </tr>
    <tr>
        <td>১.বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি
            টাকায় পরিবর্তিত)
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td rowspan="3"></td>
    </tr>
    <tr>
        <td>২.দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত
            অনুদান
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr>
        <td>৩.স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ
            ও প্রমাণকসহ)
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr>
        <td>মোট</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @endif

</table>
