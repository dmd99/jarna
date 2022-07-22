@extends('layouts.admin')
@section('title', 'App')

@section('actions')
    <div class="col-sm-6 col-12 text-sm-end">
        <div class="mx-n1">
            <a href="/a/shops/edit/}" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
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
        <li class="nav-item">
            <a role="tab" data-toggle="tab" href="#users" class="nav-link font-regular">Utilisateurs</a>
        </li>
        <li class="nav-item">
            <a role="tab" data-toggle="tab" href="#orders" class="nav-link font-regular">Commandes</a>
        </li>
        <li class="nav-item">
            <a role="tab" data-toggle="tab" href="#commandes" class="nav-link font-regular">Produits</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="cont85/8ainer-fluid">
        <!-- Card stats -->
        <div role="tabpanel" id="users">
            @include('includes.admin.stats')
            <div class="card shadow border-0 mb-7">
                <div class="card-header">
                    <h5 class="mb-0">Utilisateurs</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">email</th>
                                <th scope="col">ville</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Rôles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img alt="..." src="{{ '/storage/' . $user->avatar }}"
                                            class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $user->address->city ?? 'null' }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->phone ?? '' }}
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            {{ $user->role_id ?? '' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0 py-5">
                    <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                </div>
            </div>
        </div>
        <div role="tabpanel" id="orders" class="@if ($orders) card shadow border-0 mb-7 @endif">
            @if ($orders)
                <div class="card-header">
                    <h5 class="mb-0">Orders</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">email</th>
                                <th scope="col">ville</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Rôles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img alt="..." src="{{ '/storage/' . $user->avatar }}"
                                            class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $user->address->city ?? 'null' }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->phone ?? '' }}
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            {{ $user->role_id ?? '' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0 py-5">
                    <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                </div>
            @else
                <div class="container text-center">
                    Aucune commande pour l'instant
                </div>
            @endif
        </div>
        <div role="tabpanel" id="commandes" class="@if ($orders) card shadow border-0 mb-7 @endif">
            @if ($orders)
                <div class="card-header">
                    <h5 class="mb-0">Orders</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">email</th>
                                <th scope="col">ville</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Rôles</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <img alt="..." src="{{ '/storage/' . $user->avatar }}"
                                            class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $user->address->city ?? 'null' }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $user->phone ?? '' }}
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            {{ $user->role_id ?? '' }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer border-0 py-5">
                    <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                </div>
            @else
                <div class="container text-center">
                    Aucun Produit pour l'instant
                </div>
            @endif
        </div>
    </div>
@endsection
