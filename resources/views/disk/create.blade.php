<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Create Disk')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')

<form action="{{ url('disk') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Inputs del formulario -->
    <div class="mb-3">
        <label for="title" class="form-label">Disk title</label>
        <input type="text" class="form-control" id="title" name="title" maxlength="60" required value="{{old('title')}}">
    </div>
    <div class="mb-3">
        <label for="idartist">Disk artist</label></label>
        <input type="hidden" name="idartist" value="{{ $artist->id }}"/>
        <h5>{{ $artist->name }}</h5>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{old('year')}}">
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Cover</label>
        <input type="file" class="form-control" id="file" name="file" value="{{old('cover')}}">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection