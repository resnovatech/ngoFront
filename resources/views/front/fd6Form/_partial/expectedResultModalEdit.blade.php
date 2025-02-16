<!--modal-->
<div class="modal modal-xl fade" id="expectedResultModalEdit{{ $expectedResultDetails->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    প্রত্যাশিত ফলাফল

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <?php

                        $prokolpoPriod = \App\Models\Fd6Form::where('id',$fd6Id)->get();



                            ?>

                            <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">গুনবাচক</label>
                                        <input type="text" value="{{ $expectedResultDetails->multiplicative }}" name="multiplicative" class="form-control" id="multiplicative{{ $expectedResultDetails->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">সংখ্যা বাচক<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $expectedResultDetails->number_reader }}"  name="number_reader" class="form-control" id="number_reader{{ $expectedResultDetails->id }}"
                                        placeholder="" >
                                    </div>


                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">সময়কাল<span class="text-danger">*</span></label>
                                        {{-- <input type="text" value="{{ $expectedResultDetails->duration }}"  name="duration" class="form-control" id="duration{{ $expectedResultDetails->id }}"
                                        placeholder="" > --}}

                                        <select  name="duration" class="form-control" id="duration{{ $expectedResultDetails->id }}"
                                            placeholder="" >

                                            <option value="{{ $expectedResultDetails->duration }}" selected>{{ $expectedResultDetails->duration }}</option>

                                            @foreach($prokolpoPriod as $sprokolpoPriod)



                                    @if(!empty($sprokolpoPriod->prokolpo_year_grant_start_date_first))

                                    <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_first))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_first)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_first))) }}</option>
            @endif
            @if(!empty($sprokolpoPriod->prokolpo_year_grant_start_date_second))

                                    <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_second)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_second))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_second)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_second))) }}</option>
                                    @endif
                                    @if(!empty($sprokolpoPriod->prokolpo_year_grant_start_date_third))
                                    <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_third)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_third))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_third)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_third))) }}</option>
                                    @endif
                                    @if(!empty($sprokolpoPriod->prokolpo_year_grant_start_date_fourth))
                                    <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_fourth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_fourth))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_fourth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_fourth))) }}</option>
                                    @endif
                                    @if(!empty($sprokolpoPriod->fifth))
                                    <option value="{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_fifth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_fifth))) }}">{{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_start_date_fifth)))}} - {{ App\Http\Controllers\NGO\CommonController::englishToBangla(date('F Y', strtotime($sprokolpoPriod->prokolpo_year_grant_end_date_fifth))) }}</option>
            @endif
                                            @endforeach

                                            </select>
                                    </div>

                            </div>
                            <a id="{{ $expectedResultDetails->id }}"  class="btn btn-registration expectedResultUpdate">দাখিল করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- end modal -->
