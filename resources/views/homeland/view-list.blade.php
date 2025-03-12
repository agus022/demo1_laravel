@extends('layouts.homeland')

@section('content')
            <div class="container">

                <div class="row mb-4">
                    @foreach ($properties as $propertie)
                        <div class="col-md-12">
                            <div class="property-entry horizontal d-lg-flex">
                                <a href="{{ route('property_details', $propertie->id) }}" class="property-thumbnail h-100">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-danger">{{ $propertie->offer_type }}</span>
                                    </div>
                                    @foreach (json_decode($propertie->images) as $img)
                                        @if ($loop->first)
                                            <img src="{{ asset('images') }}/{{ $img }}" alt="Image"
                                                class="img-fluid">
                                            @break
                                        @endif
                                    @endforeach
                                </a>

                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title"><a
                                            href="{{ route('property_details', $propertie->id) }}">{{ $propertie->address }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3"><span
                                            class="property-icon icon-room"></span> {{ $propertie->address }}<< /span>
                                            <strong class="property-price text-primary mb-3 d-block text-success">
                                                {{ number_format($propertie->price, 2, '.', ',') }}</strong>
                                            <p>{{ $propertie->description }}</p>
                                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                                <li>
                                                    <span class="property-specs">Beds</span>
                                                    <span class="property-specs-number">{{ $propertie->bedrooms }}
                                                        <sup>+</sup></span>

                                                </li>
                                                <li>
                                                    <span class="property-specs">Baths</span>
                                                    <span class="property-specs-number">{{ $propertie->bathrooms }}</span>

                                                </li>
                                                <li>
                                                    <span class="property-specs">SQ FT</span>
                                                    <span class="property-specs-number">{{ $propertie->sq_ft }}</span>

                                                </li>
                                                <li>
                                                    <span class="property-specs">Type</span>
                                                    <span
                                                        class="property-specs-number">{{ $propertie->list_type->name }}</span>

                                                </li>
                                            </ul>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

@endsection
