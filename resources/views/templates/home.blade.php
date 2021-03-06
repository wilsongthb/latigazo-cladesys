<!-- <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="text-center">BIENVENIDO AL SISTEMA DE LOGISTICA</h1>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
        <location-select></location-select>
        <locations-crud></locations-crud>
    </div>
</div> -->

@extends('templates.layouts.container')


@section('content')
<div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>CLADESYS - LOGISTICS</h1>
                <h3>
                    <p>
                        Bienvenido al Sistema de Logistica, este Sistema de Información sirve para administrar varios almacenes,
                        registrar productos, controlar la entrada de estos a los almacén, seguir su distribución entre estos
                        almacenes registrados y controlar el stock de los productos.
                    </p>
                    <!-- <p>- Control de Usuarios (pendiente)</p>
                    <p>- Control de Diferentes ubicaciones </p>
                    <p>- Proceso de compra, requerimientos, cotización y compra</p> -->
                </h3>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Caracteristicas:</h3>
                <ul>
                    <li>Control de usuarios</li>
                    <li>Control de Stock</li>
                    <li>Proceso de compra por requerimientos</li>
                    <li>Configuracion de productos por almacen</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@stop
