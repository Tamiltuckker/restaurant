@include('frontend.partical.header')

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
             <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Services</h5>
                    <h1 class="mb-5">Explore Our Services</h1>
                </div>
                <div class="row g-4">
                    @foreach ($services as $service ) 
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <img src="{{asset('/storage/'.$service->image->attachmentable_image)}}" height="50" width="50"/>
                                {{-- <i class="fa fa-3x fa-user-tie text-primary mb-4"></i> --}}
                                <h5>{{$service->title }}</h5>
                                <p>{{$service->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach     
                </div>
            </div>
        </div>
        <!-- Service End -->
        @include('frontend.partical.footer')