@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="w-50 mx-auto py-5">
            <h1 class="title-1">Boutiques</h1>
            <div class="seach-shop-container mt-5">
                <form class="seach-shop-form" action="" method="post">
                    <input type="search" class="form-control custom-form seach-shop-input" id="search-shop" name="search-shop" value="">
                    <button class="btn" type="submit">
                        <img src="{{ asset('images/icons/search.svg') }}" alt="...">
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($shops as $shop)
                <div class="col-4 p-4">
                    <div class="card position-relative j-rounded  sh-1 p-4">
                        <img alt="..." width="150px" src="{{ url('/storage/' . $shop->image) }}"
                            class="rounded-circle mx-auto">
                        <span class="product-count">6 Produits</span>
                        <div>
                            <h3 class="heading">{{ $shop->name }}</h3>
                        </div>
                        <hr>
                        <div class="">
                            <p class="mb-1">
                                <img style="transform: rotate(90deg)" src="{{ asset('/images/icons/phone.svg') }}" width="18px" alt="..."> + 14049242649</p>
                            <p>
                                <img src="{{ asset('/images/icons/location.svg') }}" width="18px" alt="..."> {{Str::limit('Address: 98424 Thiel Squares, East Valentin, Ohio, Puerto Ric', 30, $end='...')}} 
                            </p>
                        </div>
                        <div> <a href="/shops/{{ $shop->id }}" class="btn jr-btn">Shopping</a></div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
