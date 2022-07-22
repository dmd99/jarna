@extends('layouts.default')

@section('content')
    <div class="container">
        <!-- Card stats -->
        <div role="tabpanel" id="users">
            @include('includes.seller.stats')
            <div class="card shadow border-0 my-5">
                <div class="card-header">
                    <h5 class="mb-0">Utilisateurs</h5>
                </div>
                <div class="table-responsive d-none">
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
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <img alt="..." src="{{ '/storage/' . $product->avatar }}"
                                            class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $product->email }}
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            {{ $product->address->city ?? 'null' }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $product->phone ?? '' }}
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            {{ $product->role_id ?? '' }}
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
                    <span class="text-muted text-sm d-none">Showing 10 items out of 250 results found</span>
                </div>
            </div>
        </div>
    </div>
@endsection
