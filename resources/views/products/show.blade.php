@extends('layouts.app')

@section('body-class', 'profile-page')

@section('content')


        <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="avatar">
                        <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-fluid mx-auto d-block rounded-circle" width="150px">
                    </div>

                    <div class="text-center">
                        <h3 class="text-white">{{ $product->name }}</h3>
                        <h6>{{ $product->category->name }}</h6>
                    </div>

                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="text-center text-white">
                <h3>@if($product->price > 0)$@endif{{ $product->price }}</h3>
                <p>{{ $product->long_description }}</p>
            </div>
<!--
            <div class="text-center">
                @if (auth()->check())
                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                        <i class="material-icons">add</i> Añadir al carrito de compras
                    </button>
                @else
                    <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary btn-round">
                        <i class="material-icons">add</i> Añadir al carrito de compras
                    </a>
                @endif
            </div>
-->

            <div class="row d-flex justify-content-center">
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($images as $image)
                        <div class="col mb-3 d-inline-flex justify-content-center">
                            <div class="card text-center m-1 t-black">
                                <img src="{{ $image->url }}" alt="Imagen {{ $product->name }}" class="card-img-top">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


                   <!-- End Profile Tabs -->
                </div>
            </div>

        </div>
    <p>&nbsp;</p>

@endsection
