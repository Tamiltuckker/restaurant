<div class="fv-row row mb-15">
          <div class="col-md-3">
              {{ Form::label('name', 'Name', array('class' => 'fs-6 fw-bold mt-2')) }}
          </div>
          <div class="col-md-9">
            {{ Form::text('name', old('name'), ['class' => 'form-control form-control-solid']) }}
          </div>
</div>
<div class="fv-row row mb-15">
          <div class="col-md-3">
              {{ Form::label('name', 'Image', array('class' => 'fs-6 fw-bold mt-2')) }}
          </div>
          <div class="col-md-9">
          <input  type="file" name="image"  accept="image/*" class="form-control form-control-solid" id="image" />
          </div>
</div>  									
<div class="row mt-12">
    <div class="col-md-9 offset-md-3">
        <!--begin::Cancel-->
        <a href="{{ route('webadmin.categories.index') }}" class="btn btn-light me-3">Back</a>
        <!-- <button type="button"  class="btn btn-light me-3">Cancel</button> -->
        <!--end::Cancel-->
        <!--begin::Button-->
        <button type="submit" class="btn btn-primary" id="kt_file_manager_settings_submit">
            <span class="indicator-label">Save</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        <!--end::Button-->
    </div>
</div>

