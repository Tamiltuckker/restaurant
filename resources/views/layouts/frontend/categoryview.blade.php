@extends('frontend.partical.header')

        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                    <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
						
						<li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                             
								<img src="{{asset('/storage/'.$category->image->attachmentable_image)}}" height="30" width="50"/>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">{{ $category->name }}</h6>
                                </div>
                            </a>
                        </li>
				
                       
                     
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
								@foreach ($category->products as $productname )
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
										<img class="flex-shrink-0 img-fluid rounded" src="{{asset('/storage/'.$category->image->attachmentable_image)}}" alt="" style="width: 80px;"/>
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
												<span>{{ $productname->name }}</span>
                                                <span class="text-primary">Rs.{{ $productname->price }}</span>
                                            </h5>
                                            <small class="fst-italic">{{ $productname->description}}</small>
                                        </div>
									
                                    </div>
                                </div>
								@endforeach
                              
                    
                            </div>
                        </div>
                       
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
        

		@extends('frontend.partical.footer')