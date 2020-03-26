@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">

        <div class="text-white">
            <h2 class="title text-center">Panel de compras</h2>

            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif
<!--
            <p>
                <a href="#tasks" role="tab" data-toggle="tab" class="btn btn-outline-warning">Historial de Pedidos</a>
            </p>
-->
            <div class="">
                <div class="">
                    <hr>
                    @if( auth()->user()->cart->details->count() > 0 )
                    <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>
                    @endif
                    <div class="row table-responsive">
                        <div class="col-sm-12">
                            <table class="table table-striped text-white">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (auth()->user()->cart->details as $detail)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $detail->product->featured_image_url }}" height="50">
                                        </td>
                                        <td><a href="#modalProductDetail{{$detail->product->id}}" class="t-white-link" title="Detalle de {{ $detail->product->name }}"data-toggle="modal"  data-target="#modalProductDetail{{$detail->product->id}}">{{ $detail->product->name }}</a></td>
                                        <td>$ {{ $detail->product->price }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                                        <td class="t-white">
                                            <button class="btn btn-outline-dark btn-sm" type="button" title="Detalle de {{ $detail->product->name }}" data-toggle="modal"  data-target="#modalProductDetail{{$detail->product->id}}">&nbsp;<i class="fa fa-info t-yellow">&nbsp;</i></button>
                                            <button class="btn btn-outline-dark btn-sm" type="button" title="Eliminar Producto {{ $detail->product->name }}" data-toggle="modal"  data-target="#modalDeleteProduct{{$detail->product->id}}"><i class="fa fa-times t-red"></i></button>
                                        </td>
                                    </tr>

                                    <!-- Modal Delete Product -->
                                    <div class="modal fade text-center" id="modalDeleteProduct{{$detail->product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteProduct{{$detail->product->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center bg-danger">
                                                    <h5 class="modal-title text-white" id="modalDeleteProduct{{$detail->product->id}}Title">Desea eliminar el producto {{ $detail->product->name }}?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <img src="{{ asset($detail->product->featured_image_url) }}" alt="Thumbnail Image" class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>{{ $detail->product->name}}</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p>{{ $detail->product->description}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h2 class="t-blue">@if($detail->product->price>0)$@endif{{ $detail->product->price}}</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{ url('/cart') }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button class="btn btn-outline-danger" type="submit" title="Eliminar el Producto {{ $detail->product->name }}"><i class="fa fa-times"></i> Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Delete Product -->

                                    <!-- Modal Product Detail -->
                                    <div class="modal fade t-black text-center" id="modalProductDetail{{$detail->product->id}}" tabindex="-1" role="dialog" aria-labelledby="modalProductDetail{{$detail->product->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title" id="modalProductDetail{{$detail->product->id}}Title">Detalle de {{ $detail->product->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <img src="{{ asset($detail->product->featured_image_url) }}" alt="Thumbnail Image" class="img-thumbnail">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>{{ $detail->product->name}}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p>{{ $detail->product->description}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h2 class="t-blue">@if($detail->product->price>0)$@endif{{ $detail->product->price}}</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Product Detail -->


                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(auth()->user()->cart->total>0)
                    <h4>Importe a pagar: {{ auth()->user()->cart->total }}</h4>

                    <div class="text-center">
                        <form method="post" action="{{ url('/order') }}">
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-round">Realizar pedido</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
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
