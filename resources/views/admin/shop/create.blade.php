@extends('layouts.admin')
@section('title', 'Creer une boutique ' . '')

@section('actions')
    <div class="col-sm-6 col-12 text-sm-end">
        <div class="mx-n1">
            <button onclick="event.preventDefault();
                document.getElementById('create-shop-form').submit();"
                class="btn d-inline-flex btn-sm btn-primary mx-1 jr-btn">
                <span class=" pe-2">
                    <i class="bi bi-save"></i>
                </span>
                <span>Enregistrer</span>
            </button>
        </div>
    </div>
@endsection

@section('nav')
    <ul class="nav nav-tabs mt-4 overflow-x border-0">

    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Félicitation!</strong> {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form id="create-shop-form" method="POST" enctype="multipart/form-data" action="{{ route('shops.store') }}"
            class="row">
            @csrf
            <div class="col-8 p-4  mb-7">
                <div class="card p-5 pb-2 shadow border-0">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="mx-3" for="name">Nom</label>
                            <input type="name" class="form-control custom-form" id="name" name="name"
                                value="{{ old('name') }}" placeholder="{{ '' }}" autocomplete="name" autofocus>

                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="mx-3" for="image">Image</label>
                            <input type="file" class="form-control custom-form" id="image" name="image" autofocus>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="mx-3" for="description">Description</label>
                            <textarea type="text" class="form-control custom-form" rows="6" cols="30" id="description" name="description"
                                placeholder="description" autofocus></textarea>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="mx-3" for="phone">Téléphone</label>
                            <input type="phone" class="form-control custom-form" id="phone" name="phone"
                                value="{{ old('phone') }}" placeholder="{{ '' }}" autocomplete="phone"
                                autofocus>
                        </div>
                        <div class="col-md-6 mb-4" style="display: flex;align-items: center;gap: 8px;">
                            <input class="form-check-input" type="checkbox" value="1" id="featured" name="featured">
                            <label class="mt-1 form-check-label" for="featured">
                                featured
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-4 mb-7">
                <div class="card shadow text-center p-4 border-0 " style="background-color: #aed2f3">
                    <label for="exampleDataList" class="form-label">Datalist example</label>
                    <input name="datalistOptions" class="form-control" list="datalistOptions" id="exampleDataList"
                        placeholder="Type to search...">
                    <datalist id="datalistOptions">
                        @foreach ($user as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
        </form>
    </div>
@endsection
