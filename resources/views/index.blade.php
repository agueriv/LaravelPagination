<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Second Title')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')
<h3>This is the new content.</h3>
@endsection