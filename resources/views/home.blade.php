@extends('adminlte::page')

@section('title', 'SIBAE')

@section('content_header')
@stop

@section('content')
<BR></BR>
<div class="container">
    <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" class="responsive-img main-img">
    <BR></BR>
    <h4>Sistema De Gestión De Balance De Energía</h4>
  </div>
@stop

@section('css')
<style>
    .container {
  text-align: center;
  padding: 20px;
}

.responsive-img {
  max-width: 100%;
  height: auto;
}

.logo {
  width: 100px;
}

.main-img {
  width: 310px;
}

</style>
@stop

@section('js')
@stop
