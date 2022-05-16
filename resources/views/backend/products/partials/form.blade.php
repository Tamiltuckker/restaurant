<div class="fv-row row mb-15">
    <div class="col-md-3 d-flex align-items-center">
        {!! Form::label('category', 'Category',['class' => 'fs-6 fw-bold']) !!}
    </div>
    <div class="col-md-9">
        {{ Form::select('category_id', $categories, NULL, ['class' => 'form-control form-control-solid form-select mb-2', 'placeholder' => 'Select Category' ]) }}
    </div>
</div>

<div class="fv-row row mb-15">
    <div class="col-md-3">
        {{ Form::label('name', 'Product Name', array('class' => 'fs-6 fw-bold mt-2')) }}
    </div>
    <div class="col-md-9">
    {{ Form::text('name', old('name'), ['class' => 'form-control form-control-solid','placeholder' => 'Product name']) }}
    </div>
</div>

<div class="fv-row row mb-15">
    <div class="col-md-3">
        {{ Form::label('price', 'Price Name', array('class' => 'fs-6 fw-bold mt-2')) }}
    </div>
    <div class="col-md-9">
    {{ Form::number('price', old('price'), ['class' => 'form-control form-control-solid','placeholder' => 'Price']) }}
    </div>
</div>
<div class="fv-row row mb-15">
    <div class="col-md-3">
        <span class="fs-4 me-2 mb-2" placeholder="Minimum 30 characters">Description</span>
    </div>
    <div class="col-md-9">
    <textarea class="form-control form-control-solid mb-9"  name="description" placeholder="Minimum 30 characters"   rows="4"></textarea>
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
        <a href="{{ route('webadmin.products.index') }}" class="btn btn-light me-3">Back</a>
        <button type="submit" class="btn btn-primary" id="kt_file_manager_settings_submit">
            <span class="indicator-label">Save</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</div>

