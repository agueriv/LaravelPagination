<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Edit Movie')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')

<form action="{{ url('movie/' . $movie->id) }}" method="post">
    @method('put')
    @csrf
    <!-- Inputs del formulario -->
    <div class="mb-3">
        <label for="title" class="form-label">Movie title</label>
        <input type="text" class="form-control" id="title" name="title" maxlength="60" required value="{{old('title', $movie->title)}}">
    </div>
    <div class="mb-3">
        <label for="director" class="form-label">Movie director</label>
        <input type="text" class="form-control" id="director" name="director" maxlength="110" required value="{{old('director', $movie->director)}}">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Movie year</label>
        <input type="number" class="form-control" id="year" name="year" min="1901" max="2155" required value="{{old('year', $movie->year)}}">
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Movie genre</label>
        <input type="text" class="form-control" id="genre" name="genre" maxlength="50" value="{{old('genre', $movie->genre)}}">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection