@if($main_year == 1)
<div class="row">
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)</label>
        <input type="number" value="{{ $fd6FormList->grants_received_from_abroad_first_year }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroadfd61"
        placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান</label>
        <input type="number" value="{{ $fd6FormList->donations_made_by_foreign_donors_first_year }}" name="donations_made_by_foreign_donors" class="form-control" id="donations_made_by_foreign_donorsfd61"
        placeholder="দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</label>
        <input type="number" value="{{ $fd6FormList->local_grants_first_year }}" name="local_grants" class="form-control" id="local_grantsfd61"
        placeholder="স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">মোট অনুদান</label>
        <input type="number" value="{{ $fd6FormList->total_first_year  }}" readonly name="grants_total" class="form-control" id="grants_totalfd61"
        placeholder="মোট">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">প্রকল্প বর্ষ</label>
        <input type="text" value="১ম বছর" readonly name="prokolpo_year_grant" class="form-control" id="prokolpo_year_grantfd61"
        placeholder="প্রকল্প বর্ষ">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ শুরুর তারিখ</label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_start_date_first }}"  name="prokolpo_year_grant_start_date" class="form-control datepickerOne" id="prokolpo_year_grant_start_datefd61"
        placeholder="প্রকল্পের মেয়াদ শুরুর তারিখ">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ সমাপ্তির তারিখ </label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_end_date_first }}"  name="prokolpo_year_grant_end_date" class="form-control datepickerOne" id="prokolpo_year_grant_end_datefd61"
        placeholder="প্রকল্পের মেয়াদ সমাপ্তির তারিখ">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">মন্তব্য</label>
        <textarea  name="comment_grant" class="form-control" id="comment_grantfd61" placeholder="">{{ $fd6FormList->total_donors_comment }}</textarea>
    </div>
</div>


<a id="fd61"  class="btn btn-registration GrantAjaxEdit">দাখিল করুন</a>
@elseif($main_year == 2)

<div class="row">
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)</label>
        <input type="number" value="{{ $fd6FormList->grants_received_from_abroad_second_year }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroadfd62"
        placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)">
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
        <textarea  name="comment_grant" class="form-control" id="comment_grantfd62" placeholder="">{{ $fd6FormList->total_donors_comment }}</textarea>
    </div>
</div>


<a id="fd62"  class="btn btn-registration GrantAjaxEdit">দাখিল করুন</a>
@elseif($main_year == 3)
<div class="row">
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)</label>
        <input type="number" value="{{ $fd6FormList->grants_received_from_abroad_third_year }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroadfd63"
        placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান</label>
        <input type="number" value="{{ $fd6FormList->donations_made_by_foreign_donors_third_year }}" name="donations_made_by_foreign_donors" class="form-control" id="donations_made_by_foreign_donorsfd63"
        placeholder="দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</label>
        <input type="number" value="{{ $fd6FormList->local_grants_third_year }}" name="local_grants" class="form-control" id="local_grantsfd63"
        placeholder="স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">মোট অনুদান</label>
        <input type="number" value="{{ $fd6FormList->total_third_year  }}" readonly name="grants_total" class="form-control" id="grants_totalfd63"
        placeholder="মোট">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">প্রকল্প বর্ষ</label>
        <input type="text" value="৩য় বছর" readonly name="prokolpo_year_grant" class="form-control" id="prokolpo_year_grantfd63"
        placeholder="প্রকল্প বর্ষ">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ শুরুর তারিখ</label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_start_date_third }}"  name="prokolpo_year_grant_start_date" class="form-control datepickerOne" id="prokolpo_year_grant_start_datefd63"
        placeholder="প্রকল্পের মেয়াদ শুরুর তারিখ">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ সমাপ্তির তারিখ </label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_end_date_third }}"  name="prokolpo_year_grant_end_date" class="form-control datepickerOne" id="prokolpo_year_grant_end_datefd63"
        placeholder="প্রকল্পের মেয়াদ সমাপ্তির তারিখ">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">মন্তব্য</label>
        <textarea  name="comment_grant" class="form-control" id="comment_grantfd63" placeholder="">{{ $fd6FormList->total_donors_comment }}</textarea>
    </div>
</div>


<a id="fd63"  class="btn btn-registration GrantAjaxEdit">দাখিল করুন</a>
@elseif($main_year == 4)

<div class="row">
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)</label>
        <input type="number" value="{{ $fd6FormList->grants_received_from_abroad_fourth_year }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroadfd64"
        placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান</label>
        <input type="number" value="{{ $fd6FormList->donations_made_by_foreign_donors_fourth_year }}" name="donations_made_by_foreign_donors" class="form-control" id="donations_made_by_foreign_donorsfd64"
        placeholder="দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</label>
        <input type="number" value="{{ $fd6FormList->local_grants_fourth_year }}" name="local_grants" class="form-control" id="local_grantsfd64"
        placeholder="স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">মোট অনুদান</label>
        <input type="number" value="{{ $fd6FormList->total_fourth_year  }}" readonly name="grants_total" class="form-control" id="grants_totalfd64"
        placeholder="মোট">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">প্রকল্প বর্ষ</label>
        <input type="text" value="৪র্থ বছর" readonly name="prokolpo_year_grant" class="form-control" id="prokolpo_year_grantfd64"
        placeholder="প্রকল্প বর্ষ">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ শুরুর তারিখ</label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_start_date_fourth }}"  name="prokolpo_year_grant_start_date" class="form-control datepickerOne" id="prokolpo_year_grant_start_datefd64"
        placeholder="প্রকল্পের মেয়াদ শুরুর তারিখ">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ সমাপ্তির তারিখ </label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_end_date_fourth }}"  name="prokolpo_year_grant_end_date" class="form-control datepickerOne" id="prokolpo_year_grant_end_datefd64"
        placeholder="প্রকল্পের মেয়াদ সমাপ্তির তারিখ">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">মন্তব্য</label>
        <textarea  name="comment_grant" class="form-control" id="comment_grantfd64" placeholder="">{{ $fd6FormList->total_donors_comment }}</textarea>
    </div>
</div>


<a id="fd64"  class="btn btn-registration GrantAjaxEdit">দাখিল করুন</a>
@elseif($main_year == 5)
<div class="row">
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)</label>
        <input type="number" value="{{ $fd6FormList->grants_received_from_abroad_fifth_year }}" name="grants_received_from_abroad" class="form-control" id="grants_received_from_abroadfd65"
        placeholder="বিদেশ থেকে প্রাপ্ত অনুদান (বাংলাদেশি টাকায় পরিবর্তিত)">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান</label>
        <input type="number" value="{{ $fd6FormList->donations_made_by_foreign_donors_fifth_year }}" name="donations_made_by_foreign_donors" class="form-control" id="donations_made_by_foreign_donorsfd65"
        placeholder="দেশে অবস্থানরত বিদেশি দাতার প্রদত্ত অনুদান">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)</label>
        <input type="number" value="{{ $fd6FormList->local_grants_fifth_year }}" name="local_grants" class="form-control" id="local_grantsfd65"
        placeholder="স্থানীয় অনুদান (উৎসের বিস্তারিত বিবরণ ও প্রমাণকসহ)">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">মোট অনুদান</label>
        <input type="number" value="{{ $fd6FormList->total_fifth_year  }}" readonly name="grants_total" class="form-control" id="grants_totalfd65"
        placeholder="মোট">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">প্রকল্প বর্ষ</label>
        <input type="text" value="৫ম বছর" readonly name="prokolpo_year_grant" class="form-control" id="prokolpo_year_grantfd65"
        placeholder="প্রকল্প বর্ষ">
    </div>

    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ শুরুর তারিখ</label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_start_date_fifth }}"  name="prokolpo_year_grant_start_date" class="form-control datepickerOne" id="prokolpo_year_grant_start_datefd65"
        placeholder="প্রকল্পের মেয়াদ শুরুর তারিখ">
    </div>
    <div class="col-lg-6 mb-3">
        <label for="" class="form-label">প্রকল্পের মেয়াদ সমাপ্তির তারিখ </label>
        <input type="text" value="{{ $fd6FormList->prokolpo_year_grant_end_date_fifth }}"  name="prokolpo_year_grant_end_date" class="form-control datepickerOne" id="prokolpo_year_grant_end_datefd65"
        placeholder="প্রকল্পের মেয়াদ সমাপ্তির তারিখ">
    </div>

    <div class="col-lg-12 mb-3">
        <label for="" class="form-label">মন্তব্য</label>
        <textarea  name="comment_grant" class="form-control" id="comment_grantfd65" placeholder="">{{ $fd6FormList->total_donors_comment }}</textarea>
    </div>
</div>


<a id="fd65"  class="btn btn-registration GrantAjaxEdit">দাখিল করুন</a>
@endif

