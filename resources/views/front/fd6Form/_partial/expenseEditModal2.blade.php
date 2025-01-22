<div class="modal modal-xl fade" id="expenseEditModal2"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    প্রাক্কলিক ব্যয় (টাকায়)

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি তাকে পরিবর্তিত)</label>
                                <input type="number" value="{{ $fd6FormList->grants_received_from_abroad_second_year }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroadfd62"
                                placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি তাকে পরিবর্তিত)">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান</label>
                                <input type="number" value="{{ $fd6FormList->donations_made_by_foreign_donors_second_year }}" name="donations_made_by_foreign_donors" class="form-control" id="donations_made_by_foreign_donorsfd62"
                                placeholder="দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</label>
                                <input type="number" value="{{ $fd6FormList->local_grants_second_year }}" name="local_grants" class="form-control" id="local_grantsfd62"
                                placeholder="স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">মোট অনুদান</label>
                                <input type="number" value="{{ $fd6FormList->total_second_year  }}" readonly name="grants_total" class="form-control" id="grants_totalfd62"
                                placeholder="মোট">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">প্রকল্প বর্ষ</label>
                                <input type="text" value="২য় বছর" readonly name="prokolpo_year_grant" class="form-control" id="prokolpo_year_grantfd62"
                                placeholder="প্রকল্প বর্ষ">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">প্রকল্পের মেয়াদ শুরুর তারিখ</label>
                                <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_start_date_second }}"  name="prokolpo_year_grant_start_date" class="form-control datepickerOne" id="prokolpo_year_grant_start_datefd62"
                                placeholder="প্রকল্পের মেয়াদ শুরুর তারিখ">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label">প্রকল্পের মেয়াদ সমাপ্তির তারিখ </label>
                                <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_end_date_second }}"  name="prokolpo_year_grant_end_date" class="form-control datepickerOne" id="prokolpo_year_grant_end_datefd62"
                                placeholder="প্রকল্পের মেয়াদ সমাপ্তির তারিখ">
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label">মন্তব্য</label>
                                <textarea required name="comment_grant" class="form-control" id="comment_grantfd62" placeholder="">{{ $fd6FormList->total_donors_comment }}</textarea>
                            </div>
                        </div>
                        

                        <a id="fd62"  class="btn btn-registration GrantAjaxEdit">আপডেট করুন</a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
