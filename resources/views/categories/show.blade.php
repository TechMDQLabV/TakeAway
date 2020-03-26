@extends('layouts.app')

@section('body-class', 'profile-page')

@section('styles')

@endsection

@section('content')


        <div class="container div_trans8 corner4 mt-4 mb-4 p-4 text-white">
            <div class="row">
                <div class="col-md-12">
                    @if (session('notification'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('notification') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="d-flex justify-content-center">
                        <div class="col-md-3">
                            <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-fluid mx-auto d-block rounded-circle img-responsive">
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="text-white">{{ $category->name }}</h3>
                    </div>

                    <div class="text-center">
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row d-flex justify-content-center">
                <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($products as $product)
                        <div class="col mb-3 d-inline-flex justify-content-center">
                            <div class="card text-center m-1 t-black">
                                <img src="{{ $product->featured_image_url }}" alt="Imagen {{ $product->name }}" class="card-img-top">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <h3 class="card-price">@if($product->price>0)$@endif{{ $product->price }}</h3>
                                </div>
                                <div class="text-center">
                                    @if (auth()->check())
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddToCart{{$product->id}}">Añadir al carrito de compras</button>
                                    @else
                                        <a href="{{ url('/login?redirect_to='.url()->current()) }}" class="btn btn-primary">Añadir al carrito de compras</a>
                                    @endif
                                    <p>&nbsp;</p>
                                </div>
                            </div>
                        </div>
                                    <!-- Modal -->
                                    <div class="modal fade t-black text-center col-md-12" id="modalAddToCart{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalAddToCart{{$product->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="{{ url('/cart') }}">
                                                    {{ csrf_field() }}
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title" id="modalAddToCart{{$product->id}}Title">Agregar Producto al Carro de Compras</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                            <div class="col-md-12">
                                                                <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-thumbnail">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>{{ $product->name}}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>{{ $product->description}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h2 class="t-blue">@if($product->price>0)$@endif{{ $product->price}}</h2>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <label class=" t-black" id="myModalLabel">Seleccione la cantidad que desea agregar</label>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="number" name="quantity" value="1" class="form-control">
                                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Fin Modal -->

                    @endforeach
                </div>
            </div>
            <p class="text-center text-white font12">Las imágenes son ilustrativas</p>
        </div>
    <p>&nbsp;</p>

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
                $(".alert").alert('close');
            }, 2000);
        });
    </script>
@endsection
