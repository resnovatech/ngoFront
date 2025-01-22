<div class="modal modal-xl fade" id="JelawaisKarjokokromEdit{{ $districtWiseLists->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    বিবরণী

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                            <div class="row">


                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                            {{-- <input type="text"  name="division_name[]" class="form-control" id=""
                            placeholder=""> --}}



                            <select  name="division_name" class="form-control division_name" id="division_name{{ $districtWiseLists->id }}">
                                <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                                <option value="{{ $districtWiseLists->division_name }}" selected>{{ $districtWiseLists->division_name }}</option>
                                @foreach($divisionList as $districtListAll)

                                <option value="{{ $districtListAll->division_bn }}" >{{ $districtListAll->division_bn }}</option>
                                @endforeach

                            </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                    {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="district_name" class="form-control district_name" id="district_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>
                                        @foreach($districtList as $districtListAll)
                                        <option value="{{ $districtListAll->district_bn }}" {{ $districtWiseLists->district_name == $districtListAll->district_bn ? 'selected':'' }}>{{ $districtListAll->district_bn }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                    {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                    placeholder=""> --}}


                                    <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>
                                        @foreach($cityCorporationList as $districtListAll)
                                        <option value="{{ $districtListAll->city_orporation }}" {{ $districtWiseLists->city_corparation_name == $districtListAll->city_orporation ? 'selected':'' }}>{{ $districtListAll->city_orporation }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="" class="form-label">উপজেলা</label>
                                    {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                    placeholder=""> --}}

                                    <select  name="upozila_name" class="form-control upozila_name" id="upozila_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>
                                        @foreach($subdDistrictList as $districtListAll)
                                        <option value="{{ $districtListAll->thana_bn }}" {{ $districtWiseLists->upozila_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                    {{-- <input type="text"  name="thana_name[]" class="form-control" id=""
                                    placeholder="" > --}}

                                    <select  name="thana_name" class="form-control thana_name" id="thana_name{{ $districtWiseLists->id }}">
                                        <option value="">--- অনুগ্রহ করে থানা নির্বাচন করুন ---</option>

                                        @foreach($thanaList as $districtListAll)
                                        <option value="{{ $districtListAll->thana_bn }}" {{ $districtWiseLists->thana_name == $districtListAll->thana_bn ? 'selected':'' }}>{{ $districtListAll->thana_bn }}</option>
                                        @endforeach


                                    </select>
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="" class="form-label">পৌরসভা</label>
                                    <input type="text" name="municipality_name" value="{{ $districtWiseLists->municipality_name }}" class="form-control" id="municipality_name{{ $districtWiseLists->id }}"
                                    placeholder="">
                                </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="" class="form-label">ওয়ার্ড</label>
                                    <input type="text" name="ward_name" value="{{ $districtWiseLists->ward_name }}" class="form-control" id="ward_name{{ $districtWiseLists->id }}"
                                    placeholder="">
                                </div>
                                    <div class="col-lg-3 mb-3">
                                        <label for="" class="form-label">পৌরসভা</label>
                                        <input type="text" value="{{ $districtWiseLists->municipality_name }}" name="municipality_name" class="form-control" id="municipality_name{{ $districtWiseLists->id }}"
                                        placeholder="">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label for="" class="form-label">ওয়ার্ড</label>
                                        <input type="text" value="{{ $districtWiseLists->ward_name }}" name="ward_name" class="form-control" id="ward_name{{ $districtWiseLists->id }}"
                                        placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">কার্যক্রম সমূহ</label>
                                        <textarea name="activities" value="{{ $districtWiseLists->activities}}" class="form-control" id="activities{{ $districtWiseLists->id }}"
                                        placeholder="">
                                    </textarea>
                                    </div>


                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">প্রকল্প সময়<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->prokolpo_time}}"  name="prokolpo_time" class="form-control" id="prokolpo_time{{ $districtWiseLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা (বছর)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->target_year}}"  name="target_year" class="form-control" id="last_target_year{{ $districtWiseLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা (বাস্তব)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->last_year_target_real}}"  name="last_year_target_real" class="form-control" id="alllast_year_target_real{{ $districtWiseLists->id }}" placeholder="">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">লক্ষ্যমাত্রা (আর্থিক)<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->last_year_target_financial}}"  name="last_year_target_financial" class="form-control" id="alllast_year_target_financial{{ $districtWiseLists->id }}" placeholder="">
                                    </div>

                                    <div class="col-lg-4 mb-3">
                                        <label for="" class="form-label">মোট বাজেট<span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $districtWiseLists->total_budget}}"  name="total_budget" class="form-control" id="alltotal_budget{{ $districtWiseLists->id }}" placeholder="">
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <label for="" class="form-label">মন্তব্য (যেখানে প্রযোজ্য)<span class="text-danger">*</span></label>
                                        <textarea name="comment" class="form-control" id="allcomment{{ $districtWiseLists->id }}" placeholder="">
                                            {{ $districtWiseLists->comment}}
                                        </textarea>
                                    </div>

                            </div>
                            <a id="{{ $districtWiseLists->id}}"  class="btn btn-registration jelawaisKarjokokromUpdate">আপডেট করুন</a>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
