@extends('layouts.admin')
@section('title', $shop->name)

@section('actions')
    <div class="col-sm-6 col-12 text-sm-end">
        <div class="mx-n1">
            <a href="/a/shops/edit/{{ $shop->id }}" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                <span class=" pe-2">
                    <i class="bi bi-pencil"></i>
                </span>
                <span>Editer</span>
            </a>
            <a href="/a/shops/create" class="btn d-inline-flex btn-sm btn-primary mx-1 jr-btn">
                <span class=" pe-2">
                    <i class="bi bi-plus"></i>
                </span>
                <span>Créer une Boutique</span>
            </a>
        </div>
    </div>
@endsection

@section('nav')
    <ul class="nav nav-tabs mt-4 overflow-x border-0">
        <li class="nav-item ">
            <a href="#" class="nav-link active">Boutique</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link font-regular">Commandes</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link font-regular">Clients</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Card stats -->
        <div class="row">


            <div class="col-8 p-4  mb-7">
                <div class="card p-5 pb-2 shadow border-0">
                    <div class="d-flex">
                        <img alt="..." src="{{ $shop->image }}" width="100px" height="100px"
                            class="rounded-circle border me-2">
                        <h2 class=" text-heading font-semibold">
                            {{ $shop->name }}
                        </h2>
                    </div>
                    <p style="width: 70%;margin-bottom: 16px;margin-top: 16px" class="w-50">{{ $shop->description }}</p>
                    <p style="color: #6ec291"><i class="bi bi-telephone"></i> {{ $shop->phone }}</p>
                    <div> <span class="badge badge-lg badge-dot">
                            @if ($shop->is_featured == 0)
                            <i class="bg-warning"></i>status: désactivé
                            @else
                                <i class="bg-success"></i>activé
                            @endif
                        </span></div>
                        <hr class="mb-0">
                    <div class="text-end" style="color: gray">Créée le {{ date_format($shop->created_at, 'd M y') }}</div>
                </div>
            </div>
            <div class="col-4 p-4 mb-7">
                <div class="card shadow text-center p-4 border-0 h-full" style="background-color: {{ $shop->color }}">
                    <img alt="..." src="{{ url('/storage/' . $shop->user->avatar) }}" width="100px" height="100px"
                        class="mx-auto mb-3 rounded-circle">
                        <h4>{{$shop->user->name}}</h4>
                        <br>
                        <p>
                            <i class="bi bi-envelope"></i>&nbsp;{{$shop->user->email}} <br>
                            <i class="bi bi-telephone"></i>&nbsp;{{$shop->user->phone}}
                        </p>
                </div>
            </div>
        </div>
    </div>
@endsection
