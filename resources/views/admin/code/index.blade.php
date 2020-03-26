@extends('layouts.app')

@section('title', 'Listado de productos')

@section('body-class', 'product-page')

@section('content')

    <div class="container div_trans8 corner4 mt-4 mb-4 p-4">
        <div class="section text-center text-white">
            <h2 class="title">Generar Código</h2>
            <p>&nbsp;</p>
            <h4>{{$codec->code}}</h4>
            <p>&nbsp;</p>
            <div class="">
                <div class="text-center">
                    <p><a href="{{ url('/admin/products/code') }}" class="btn btn-info btn-round">Nuevo Código</a></p>
                </div>
            </div>
        </div>
    </div>
 </div>
        <p>&nbsp;</p>


@endsection
