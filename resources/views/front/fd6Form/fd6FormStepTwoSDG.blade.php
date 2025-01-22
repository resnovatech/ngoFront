<table class="table table-bordered">
    <tr style="text-align: center">
        <th>অভিষ্ঠ(Goal)</th>
        <th>লক্ষ্যমাত্রা(Target)</th>
        <th>বাজেট বরাদ্দ </th>
        <th>যৌক্তিকতা </th>
        <th>মন্তব্য</th>
        <th></th>
    </tr>
@foreach($SDGDevelopmentGoal as $SDGDevelopmentGoals)
    <tr>
        <td>{{ $SDGDevelopmentGoals->goal }}</td>
        <td>{{ $SDGDevelopmentGoals->target }}</td>
        <td>{{ $SDGDevelopmentGoals->budget_allocation }}</td>
        <td>{{ $SDGDevelopmentGoals->rationality }}</td>
        <td>{{ $SDGDevelopmentGoals->comment }}</td>
        <td>

            <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#prokolpoSDG{{ $SDGDevelopmentGoals->id }}" >
                <i class="fa fa-pencil"></i>
            </button>
            @include('front.fd6Form._partial.stepTwoSDGModalEdit')


            <button type="button" onclick="deleteTagSDG({{ $SDGDevelopmentGoals->id}})" class="btn btn-sm btn-outline-danger"><i
                class="bi bi-trash"></i></button>


        </td>
    </tr>
    @endforeach


</table>
