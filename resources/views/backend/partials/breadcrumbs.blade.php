<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <small class="text-muted fs-6 fw-normal ms-1"></small></h1>
             <ul class="breadcrumb fw-bold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="../dist/index.html" class="text-muted text-hover-primary">Home</a>
                </li>
                @foreach($segments = request()->segments() as $index => $segment)
                    <li class="breadcrumb-item text-muted">
                        <a href="">
                            {{ isset($model) && $index === count($segments)-1 ? $model->title : Illuminate\Support\Str::title($segment) }}
                        </a>    
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

   
   

