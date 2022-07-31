@extends('layouts.default')

@section('content')
    @include('includes.home.hero')
    <div class="container">
        {{-- {{$shop, }} --}}
        {{-- <code>{{ $products }}</code> --}}
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-4 p-4">
                        <div class="card position-relative j-rounded  sh-1 p-4">
                            <img alt="..." width="150px" src="{{$product->product_image}}"
                                class="rounded-circle mx-auto">
                            <span class="product-count">6 Produits</span>
                            <div>
                                <h3 class="heading">edede</h3>
                            </div>
                            <hr>
                            <div class="">
                                <p class="mb-1">
                                    <img style="transform: rotate(90deg)" src="{{ asset('/images/icons/phone.svg') }}" width="18px" alt="..."> + 14049242649</p>
                                <p>
                                    <img src="{{ asset('/images/icons/location.svg') }}" width="18px" alt="..."> {{Str::limit('Address: 98424 Thiel Squares, East Valentin, Ohio, Puerto Ric', 30, $end='...')}} 
                                </p>
                            </div>
                            <div> <a href="/shops/{{ '' }}" class="btn jr-btn">Shopping</a></div>
                        </div>
                    </div>
                @endforeach
            </div>
    
    </div>
@endsection