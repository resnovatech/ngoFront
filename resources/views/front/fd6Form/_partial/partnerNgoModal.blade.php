<div class="modal modal-xl fade" id="PartnerNGO"  aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="" class="form-label">পার্টনার এনজিও'র নাম <span class="text-danger">*</span></label>
                                <input type="text" required name="partner_ngo_name" class="form-control" id="partner_ngo_name0"
                                placeholder="পার্টনার এনজিও'র নাম">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র ঠিকানা <span class="text-danger">*</span></label>
                                <input type="text" required name="partner_ngo_address" class="form-control" id="partner_ngo_address0"
                                placeholder="পার্টনার এনজিও'র ঠিকানা">
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র টেলিফোন <span class="text-danger">*</span></label>
                                <input type="text" required name="partner_ngo_telephone" class="form-control" id="partner_ngo_telephone0"
                                placeholder="পার্টনার এনজিও'র টেলিফোন">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র মোবাইল <span class="text-danger">*</span></label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type = "number"
                                maxlength = "11" data-parsley-required minlength="11"  data-parsley-trigger=“keyup” required name="partner_ngo_mobile" class="form-control" id="partner_ngo_mobile0"
                                placeholder="পার্টনার এনজিও'র মোবাইল">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র ইমেইল <span class="text-danger">*</span></label>
                                <input type="email" required name="partner_ngo_email" class="form-control" id="partner_ngo_email0"
                                placeholder="পার্টনার এনজিও'র ইমেইল">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র নিবন্ধন নং <span class="text-danger">*</span></label>
                                <input type="text" required name="partner_ngo_reg_name" class="form-control" id="partner_ngo_reg_name0"
                                placeholder="পার্টনার এনজিও'র নিবন্ধন নং">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও'র মেয়াদ <span class="text-danger">*</span></label>
                                <input type="text" required name="partner_ngo_duration" class="form-control" id="partner_ngo_duration0"
                                placeholder="পার্টনার এনজিও'র মেয়াদ">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য কার্যক্রমসমূহ <span class="text-danger">*</span></label>
                                <textarea required name="partner_ngo_work_detail" class="form-control summernote" id="partner_ngo_work_detail0"
                                placeholder="পার্টনার এনজিও /সংস্থা কর্তৃক বাস্তবায়িতব্য কার্যক্রমসমূহ"></textarea>
                            </div>

                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">বিভাগ <span class="text-danger">*</span></label>
                        {{-- <input type="text"  name="division_name[]" class="form-control" id=""
                        placeholder=""> --}}



                        <select  name="division_name" class="form-control division_name" id="division_name0">
                            <option value="">--- অনুগ্রহ করে বিভাগ নির্বাচন করুন ---</option>
                            @foreach($divisionList as $districtListAll)

                            <option value="{{ $districtListAll->division_bn }}">{{ $districtListAll->division_bn }}</option>
                            @endforeach

                        </select>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">জেলা <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="district_name[]" class="form-control" id=""
                                placeholder=""> --}}

                                <select  name="district_name" class="form-control district_name" id="district_name0">
                                    <option value="">--- অনুগ্রহ করে জেলা নির্বাচন করুন ---</option>


                                </select>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">সিটি কর্পোরেশন</label>
                                {{-- <input type="text" name="city_corparation_name[]" class="form-control" id=""
                                placeholder=""> --}}


                                <select  name="city_corparation_name" class="form-control city_corparation_name" id="city_corparation_name0">
                                    <option value="">--- অনুগ্রহ করে সিটি কর্পোরেশন নির্বাচন করুন ---</option>


                                </select>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="" class="form-label">উপজেলা</label>
                                {{-- <input type="text" name="upozila_name[]" class="form-control" id=""
                                placeholder=""> --}}

                                <select  name="upozila_name" class="form-control upozila_name" id="upozila_name0">
                                    <option value="">--- অনুগ্রহ করে উপজেলা নির্বাচন করুন ---</option>


                                </select>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="" class="form-label">থানা <span class="text-danger">*</span></label>
                                {{-- <input type="text"  name="thana_name[]" class="form-control" id=""
                                placeholder="" > --}}

                                <select  name="thana_name" class="form-control thana_name" id="thana_name0">
                                    <option value="">--- অনুগ্রহ করে থানা নির্বাচন করুন ---</option>


                                </select>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="" class="form-label">পৌরসভা/ইউনিয়ন</label>
                                <input type="text" name="municipality_name" class="form-control" id="municipality_name0"
                                placeholder="পৌরসভা/ইউনিয়ন">
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="" class="form-label">ওয়ার্ড</label>
                                <input type="text" name="ward_name" class="form-control" id="ward_name0"
                                placeholder="ওয়ার্ড">
                            </div>
                        </div>

                        <hr>

                        <div class="row">

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">বাজেট <span class="text-danger">*</span></label>
                                <input type="text" required name="budget_detail" class="form-control" id="budget_detail0"
                                placeholder="বাজেট">
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">সম্পাদনের সময়সীমা <span class="text-danger">*</span></label>
                                <input type="text" required name="execution_deadline" class="form-control" id="execution_deadline0"
                                placeholder="সম্পাদনের সময়সীমা">
                            </div>


                            <div class="col-lg-4 mb-3">
                                <label for="" class="form-label">উপকারভোগী <span class="text-danger">*</span></label>
                                <input type="text" required name="beneficiary" class="form-control" id="beneficiary0"
                                placeholder="উপকারভোগী">
                            </div>

                        </div>
                        <a id="partnerNgoPost"  class="btn btn-registration">জমা দিন</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
