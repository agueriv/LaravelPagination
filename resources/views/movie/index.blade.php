<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Movie List')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')

@include('modal.deletemovie')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Director</th>
                <th scope="col">Year</th>
                <th scope="col">Genre</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>
                        <a href="{{ url('movie/' . $movie->id) }}" class="btn btn-info">View</a>
                        <a href="{{ url('movie/' . $movie->id . '/edit')}}" class="btn btn-primary">Edit</a>
                        <form data-movie="{{ $movie->title }}" class="formDelete" action="{{ url('movie/' . $movie->id) }}" method="post" style="display: inline-block;">
                            <!-- Solucion de error por CSRF -->
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a data-url="{{ url('movie/' . $movie->id) }}" href="" class="btn btn-secondary hrefDelete">Delete v2</a>
                        <button data-url="{{ url('movie/' . $movie->id) }}" data-title="{{ $movie->title }}" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteMovieModal">
                          Delete v3
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('movie/create')}}" class="btn btn-success">Create movie</a>
    <form id="formDeleteV2" name="formDeleteV2" action="{{ url('') }}" method="post">
        @csrf
        @method('delete')
    </form>
</div>

<script>
    // Solucion 1
    const forms = document.querySelectorAll('.formDelete');
    forms.forEach(function(form) {
        form.onsubmit = (event) => {
            return confirm('Are you sure to delete ' + event.target.dataset.movie + '?');
        }
    });
    // Solución 2
    const ahrefs = document.querySelectorAll('.hrefDelete');
    const formDelete = document.getElementById('formDeleteV2');
    ahrefs.forEach(function(ahref) {
        ahref.onclick = (e) => {
            // Cancela el evento anterior de click del enlace para que se ejecute el evento submit
            e.preventDefault();
            if(confirm('Are u sure to delete?')) {
                let url = e.target.dataset.url;
                formDelete.action = url;
                formDelete.submit();
            }
        };
    });
    // Solución 3 (mas mejor)
    const deleteMovieModal = document.getElementById('deleteMovieModal');
    const movieTitle = document.getElementById('movieTitle');
    const formDeleteV3 = document.getElementById('formDeleteV3');
    
    deleteMovieModal.addEventListener('show.bs.modal', event => {
      let movieTitleContent = event.relatedTarget.dataset.title;
      let url = event.relatedTarget.dataset.url;
      
      movieTitle.innerText = movieTitleContent;
      formDeleteV3.action = url;
    });
</script>
@endsection