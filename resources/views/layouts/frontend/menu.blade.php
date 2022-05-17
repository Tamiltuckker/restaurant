@include('frontend.partical.header')
            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


         <!-- Menu Start -->
         <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach ($categories as $category )
                       
                        <li class="nav-item">
                            <a href="{{ route('productcategory.show',$category->slug) }}" >
                                 <img src="{{asset('/storage/'.$category->image->attachmentable_image)}}" height="30" width="50"/>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">{{$category->name }}</h6>
                                </div>
                            </a>
                    </a>
                        </li>
                        @endforeach
                       
                    </ul>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                @foreach ($products as $product )
                                {{-- @dd($product); --}}
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        {{-- <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('frontend/img/menu-1.jpg')}}" alt="" style="width: 80px;"> --}}
                                        <img src="{{asset('/storage/'.$product->image->attachmentable_image)}}" class="flex-shrink-0 img-fluid rounded" alt="" style="width: 80px;"/>
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>{{$product->name}}</span>
                                                <span class="text-primary">Rs.{{$product->price}}</span>
                                            </h5>
                                            <small class="fst-italic">{{$product->description}}</small>
                                        </div>
                                    </div>
                                </div>
                                @endforeach    
            </div>
        </div>
    </div>
        <!-- Menu End -->

        @include('frontend.partical.footer')  

   