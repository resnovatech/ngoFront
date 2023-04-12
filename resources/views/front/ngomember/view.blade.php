<p class="member_profile_text">{{ trans('form 8_bn.member_profile')}}</p>
<hr>
<table class="table table-borderless">
    <tr>
        <td>{{ trans('form 8_bn.name')}}</td>
        <td>: {{ $all_data_list->name }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.designation')}}</td>
        <td>:{{ $all_data_list->desi }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.date_of_birth')}}</td>
        <td>:{{ $all_data_list->dob }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.present_address')}}</td>
        <td>:{{ $all_data_list->present_address }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.permanent_address')}}</td>
        <td>:{{ $all_data_list->permanent_address }}</td>
    </tr>

    <tr>
        <td>{{ trans('form 8_bn.nid_no')}}</td>
        <td>:{{ $all_data_list->nid_no }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.mobile_no')}}</td>
        <td>:{{ $all_data_list->phone }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.fathers_name')}}</td>
        <td>:{{ $all_data_list->father_name }}</td>
    </tr>
    <tr>
        <td>{{ trans('form 8_bn.name_of_spouse')}}</td>
        <td>: {{ $all_data_list->name_supouse }}</td>
    </tr>

    <tr>
        <td>{{ trans('form 8_bn.remarks')}}</td>
        <td>: {{ $all_data_list->remarks }}</td>
    </tr>

</table>
