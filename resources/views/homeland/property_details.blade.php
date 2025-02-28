@extends('layouts.homeland')

@section('content')
    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked~.icon,
        .rating:hover label:hover input~.icon {
            color: #09f;
        }

        .rating label input:focus:not(:checked)~.icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }
    </style>
    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_2.jpg);"
        data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{ $property->address }}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">$ {{ $property->price }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach (json_decode($property->images) as $img)
                                <div><img src="{{ asset('images') }}/{{ $img }}" alt="Image" class="img-fluid">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">{{ $property->getPriceAsCurrency() }} </strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $property->bedrooms }} <sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $property->bathrooms }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $property->sq_ft }}</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                <strong class="d-block">{{ $property->list_type->name }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $property->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">{{ $property->getPriceBySquareFeet() }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">City</span>
                                <strong class="d-block">{{ $property->city->name }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $property->description }}</p>

                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>

                            @foreach (json_decode($property->images) as $img)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('images') }}/{{ $img }}" class="image-popup gal-item">
                                        <img src="{{ asset('images') }}/{{ $img }}" alt="Image"
                                            class="img-fluid">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">


                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div id="successAlert" class="alert alert-success d-none">
                            Contact request sent successfully. We will get back to you shortly.
                        </div>
                        <form action="" class="form-contact-agent" method="POST" id="formContactAgent">
                            {{-- <input type="hidden" name="property_id" id="property_id" value="{{$property->id}}"> --}}
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Message</label>
                                <textarea id="message" name="message" class="form-control" cols="30" rows="10">{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="btnSendContactAgentMessage" class="btn btn-primary" value="Send Message">
                            </div>
                        </form>
                    </div>
                    {{--
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Share</h3>
                        <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=&quote="
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text=&url=" class="pt-3 pb-3 pr-3 pl-0"><span
                                    class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url="
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <h2>Give your review: </h2>
            <div class="row">
                <div class="col-md-12 col-lg-8 mb-5">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('property_details_review', $property->id) }}" method="POST"
                        class="p-5 bg-white border">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fullname">Full Name: </label>
                                <input type="text" id="fullname" class="form-control" placeholder="Full Name"
                                    name="nameReview" value="{{ old('nameReview') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Email Address"
                                    name="emailReview" value="{{ old('emailReview') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold" for="message">Review</label>
                                <textarea id="message" cols="30" rows="5" class="form-control" placeholder="Review"
                                    name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <!-- SISTEMA DE ESTRELLAS -->
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="font-weight-bold">Rating:</label><br>
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="rating" value="1" required />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="2" required />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="3" required />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="4" required />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rating" value="5" required />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Review" class="btn btn-primary  py-2 px-4 rounded-0">
                            </div>
                        </div>
                    </form>
                    <!-- MOSTRAR REVIEWS -->
                    <h3 class="mt-5">Reviews:</h3>
                    @if ($reviews->isEmpty())
                        <p>No reviews yet. Be the first to leave a review!</p>
                    @else
                        @foreach ($reviews as $review)
                            <div class="review p-3 border rounded mb-3">
                                <h4>{{ $review->name }}
                                    @php
                                        $fullStars = floor($review->rating);
                                        $emptyStars = 5 - $fullStars;
                                    @endphp

                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <span class="star filled text-warning">★</span>
                                    @endfor
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <span class="star empty text-secondary">☆</span>
                                    @endfor
                                </h4>
                                <p>{{ $review->description }}</p>
                                <small class="text-muted">{{ $review->created_at->format('d M, Y') }}</small>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">625 S. Berendo St</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 625
                                S. Berendo St Unit 607 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">7,000</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-danger">Sale</span>
                                <span class="offer-type bg-success">Rent</span>
                            </div>
                            <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite active"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">871 Crenshaw Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 1
                                New York Ave, Warners Bay, NSW 2282</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">1,620</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span class="offer-type bg-info">Lease</span>
                            </div>
                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="property-details.html">853 S Lucerne Blvd</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> 853
                                S Lucerne Blvd Unit 101 Los Angeles, CA 90005</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">$2,265,500</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">2 <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baths</span>
                                    <span class="property-specs-number">2</span>

                                </li>
                                <li>
                                    <span class="property-specs">SQ FT</span>
                                    <span class="property-specs-number">5,500</span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
