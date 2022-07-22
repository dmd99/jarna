@extends('layouts.admin')
@section('title', 'Modifier la boutique ' . $shop->name)

@section('actions')
    <div class="col-sm-6 col-12 text-sm-end">
        <div class="mx-n1">
            <button onclick="updateShop()" class="btn d-inline-flex btn-sm btn-primary mx-1 jr-btn">
                <span class=" pe-2">
                    <i class="bi bi-save"></i>
                </span>
                <span>Enregistrer</span>
            </button>
            <form class="d-inline" action="{{ route('shops.destroy', $shop->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button onclick="" class="btn d-inline-flex btn-sm btn-danger mx-1">
                    <span class=" pe-2">
                        <i class="bi bi-trash"></i>
                    </span>
                    <span>Supprimer</span>
                </button>
            </form>
        </div>
    </div>
@endsection

@section('nav')
    <ul class="nav nav-tabs mt-4 overflow-x border-0">

    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="update-shop-form" method="POST" enctype="multipart/form-data" action="{{ route('shops.update', $shop->id) }}" class="row">
            <div class="col-8 p-4  mb-7">
                <div class="card p-5 pb-2 shadow border-0">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="mx-3" for="name">Nom</label>
                                <input type="name" class="form-control custom-form" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="{{ $shop->name }}" autocomplete="name"
                                    autofocus>

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
                                    value="{{ old('phone') }}" placeholder="{{ $shop->phone }}" autocomplete="phone"
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
                <div class="card shadow text-center p-4 border-0 " style="background-color: {{ $shop->color }}">
                    <label for="exampleDataList" class="form-label">Datalist example</label>
                    <input name="datalistOptions" class="form-control" list="datalistOptions" id="exampleDataList"
                        placeholder="Type to search...">
                    <datalist id="datalistOptions">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </datalist>
                </div>
            </div>
            <button type="submit">update</button>
        </form>
        <script>
            function updateShop() {
                event.preventDefault();
                document.getElementById('update-shop-form').submit();
            }
        </script>
    </div>
@endsection
