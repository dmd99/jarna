@extends('layouts.admin')

@section('actions')
    <div class="col-sm-6 col-12 text-sm-end">
        <div class="mx-n1">
            <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                <span class=" pe-2">
                    <i class="bi bi-pencil"></i>
                </span>
                <span>Edit</span>
            </a>
            <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1 jr-btn">
                <span class=" pe-2">
                    <i class="bi bi-plus"></i>
                </span>
                <span>Create</span>
            </a>
        </div>
    </div>
@endsection

@section('nav')
    <ul class="nav nav-tabs mt-4 overflow-x border-0">
        <li class="nav-item ">
            <a href="#" class="nav-link active">All files</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link font-regular">Shared</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link font-regular">File requests</a>
        </li>
    </ul>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Card stats -->
        {{-- @include('includes.admin.stats') --}}
        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">Boutiques</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">phone</th>
                            <th scope="col">Proprietaire</th>
                            <th scope="col">CA</th>
                            <th scope="col">Promotion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $shop)
                            <tr>
                                <td>
                                    <img alt="..."
                                        src="{{url('/storage/'.$shop->image)}}"
                                        class="avatar avatar-sm rounded-circle me-2">
                                    <a class="text-heading font-semibold" href="{{'/a/shops/'.$shop->id}}">
                                       {{ $shop->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $shop->phone }}
                                </td>
                                <td>
                                    <img alt="..." src="{{url('/storage/'.$shop->user->avatar)}}"
                                        class="avatar avatar-xs rounded-circle me-2">
                                    <a class="text-heading font-semibold" href="#">
                                        {{$shop->user->name}}
                                    </a>
                                </td>
                                <td>
                                    $3.500
                                </td>
                                <td>
                                    <span class="badge badge-lg badge-dot">
                                        @if ($shop->is_featured == 0)
                                            <i class="bg-warning"></i>désactivé
                                        @else
                                            <i class="bg-success"></i>activé
                                        @endif
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{'/a/shops/'.$shop->id}}" class="btn btn-sm btn-neutral">View</a>
                                    <a href="{{'/a/shops/'.$shop->id.'/edit'}}" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-pen"></i>
                                    </a>
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
@endsection
