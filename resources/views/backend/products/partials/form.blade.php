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
    {{ Form::text('name', old('name'), ['class' => 'form-control form-control-solid','placeholder' => 'Product Name']) }}
    </div>
</div>

<div class="fv-row row mb-15">
    <div class="col-md-3 d-flex align-items-center">
        {!! Form::label('tag', 'Tags',['class' => 'fs-6 fw-bold']) !!}
    </div>
    <div class="col-md-9">
        {{ Form::select('tags[]', $tags, NULL, ['class' => 'form-control form-control-solid form-select mb-2 ec-select2-wos', 'multiple' ]) }}
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
        <a href="{{ route('webadmin.products.index') }}" class="btn btn-light me-3">Back</a>
        <button type="submit" class="btn btn-primary" id="kt_file_manager_settings_submit">
            <span class="indicator-label">Save</span>
            <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
</div>


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">
@endpush

@push('js')
<script src="{{ asset('js/select2.full.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function(){
         $(".ec-select2-wos").select2({
             tags: true,
            tokenSeparators: [',']
        });
    });
</script>
@endpush
