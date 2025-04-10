<div class="mb-3">
    <label for="" class="form-label">{{ trans('mview.ttTwo')}}: <span class="text-danger">*</span></label>
         <input type="text" readonly data-parsley-required  name="chief_name"  value="{{$chiefNameGlobal}}"  class="form-control" id="mainName" placeholder="{{ trans('mview.ttTwo')}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label mt-3">{{ trans('mview.ttThree')}}: <span class="text-danger">*</span></label>
        <input type="text" readonly data-parsley-required value="{{ $chiefDesignationGlobal }}"  name="chief_desi"  class="form-control"  placeholder="{{ trans('mview.ttThree')}}">
    </div>



    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSignature')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*80) , Size:Max 60 KB & Image Format:PNG)</b></span></label>

        <input type="hidden" value="{{ $chiefSignatureGlobal }}" name="image_base64">
        <div class="croppedInput mt-2">
            <img src="{{asset('/')}}{{ $chiefSignatureGlobal }}" style="width: 200px;" class="show-image">
        </div>
       

    </div>


    <div class="mb-3">
        <label for="" class="form-label">{{ trans('zoom.digitalSeal')}}: <span class="text-danger">*</span>
            <span class="text-danger"><b style="font-size: 12px;">(Dimension:(300*100) , Size:Max 80 KB & Image Format:PNG)</b> </label></span>
        

        <input type="hidden" value="{{ $chiefSealGlobal }}"  name="image_seal_base64">
        <div class="croppedInputss mt-2">
            <img src="{{asset('/')}}{{ $chiefSealGlobal }}" style="width: 200px;" class="show-image">
        </div>
       
    </div>
    <!-- end new code -->