<div class="fv-row row mb-15">
    <div class="col-md-3">
        {{ Form::label('title', 'Title', array('class' => 'fs-6 fw-bold mt-2')) }}
    </div>
    <div class="col-md-9">
    {{ Form::text('title', old('title'), ['class' => 'form-control form-control-solid']) }}
    </div>
</div>
<div class="fv-row row mb-15">
    <div class="col-md-3">
        <span class="fs-4 me-2 mb-2" placeholder="Minimum 30 characters">Description</span>
    </div>
    <div class="col-md-9">
    {!! Form::textarea('description',null,['class'=>'form-control form-control-solid mb-9','placeholder' => 'Write Product Description...', 'rows' => 4, 'cols' => 60]) !!}
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
        <a href="{{ route('webadmin.categories.index') }}" class="btn btn-light me-3">Back</a>
        <button type="submit" class="btn btn-primary" id="kt_file_manager_settings_submit">
            <span class="indicator-label">Save</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</div>

