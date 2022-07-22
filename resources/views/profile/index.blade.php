@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('profile.sidebar')
            <div class="col-md-8 col-12 mt-2 px-4 pt-5 dash-card">
                <div class="">
                    <div>
                        <div style="gap: 18px;flex-wrap: wrap" class="d-flex mb-4">
                            <img width="120px" height="120px" src="{{ '/storage/' . Auth::user()->avatar }}" alt="">
                            <div class="pl-4">
                                <h2>{{ Auth::user()->name }}</h2>
                                @if ($address)
                                    <div style="color: gray">
                                        {{ $address->country }}
                                        {{ $address->city }}
                                        <br>
                                        {{ $address->address_line1 }}
                                        {{ $address->address_line2 }}
                                    </div>
                                @else
                                    <div>
                                        <div class="alert alert-warning" role="alert">
                                            Merci de bien vouloir <a class="alert-link" href="#save-address">
                                                <b>Enregister votre adresse.</b></a>
                                        </div>
                                        
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <h3>Modifier le profil</h3>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Félicitation!</strong> {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form class="mt-4" method="PUT" action="{{ url('/edit_profile/' . Auth::User()->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row ">
                                <div class="col-md-6 mb-3">
                                    <label class="mx-3 opacity-75" for="email">Nom</label>
                                    <input type="name" class="form-control custom-form" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="{{ Auth::User()->name }}" required
                                        autocomplete="name" autofocus>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mx-3 opacity-75" for="email">Téléphone</label>
                                    <input type="phone" class="form-control custom-form" id="phone" name="phone"
                                        value="{{ old('phone') }}" placeholder="{{ Auth::User()->phone }}" required
                                        autocomplete="phone" autofocus>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mx-3 opacity-75" for="email">Email address</label>
                                    <input type="email" class="form-control custom-form" id="email" name="email"
                                        value="{{ Auth::User()->email }}" disabled placeholder="name@example.com"
                                        required autocomplete="email" autofocus>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4 mb-2">
                                <input type="submit" value="Submit" class="btn jr-btn">
                            </div>
                        </form>
                        <div id="save-address" class="address">
                            <h4 class="title mb-4">Addresses</h4>
                            <form method="PUT" action="{{ url('/edit_address/' . Auth::User()->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="mx-3 opacity-75" for="country">Pays</label>
                                        <input type="text" class="form-control custom-form" id="country" name="country"
                                            value="" placeholder="Sénégal" required autocomplete="country" autofocus>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="mx-3 opacity-75" for="city">Ville</label>
                                        <input type="text" class="form-control custom-form" id="city" name="city" value=""
                                            placeholder="Dakar" required autocomplete="city" autofocus>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="mx-3 opacity-75" for="postal_code">Code Postal</label>
                                        <input type="text" class="form-control custom-form" id="postal_code"
                                            name="postal_code" value="22500" placeholder="00000" required
                                            autocomplete="postal_code" autofocus>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="mx-3 opacity-75" for="address1">Addresse 1</label>
                                        <input type="text" class="form-control custom-form" id="address1" name="address1"
                                            value="{{ old('address1') }}" placeholder="16341 Rte de Fann, Dakar, Sénégal"
                                            required autocomplete="address" autofocus>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="mx-3 opacity-75" for="address2">Addresse 2</label>
                                        <input type="text" class="form-control custom-form" id="address2" name="address2"
                                            value="{{ old('address2') }}" placeholder="16341 Rte de Fann, Dakar, Sénégal"
                                            required autocomplete="address" autofocus>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4 mb-2">
                                    <input type="submit" value="Submit" class="btn jr-btn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
