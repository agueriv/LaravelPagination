<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Artist Paginate List')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')

<div class="d-flex">
    <form action="" class="d-flex me-4">
        <div class="form-group">
            <select class="form-select" name="rowPerPage" id="rowPerPage">
                @foreach($rpps as $index => $value)
                    <option value="{{ $index }}" {{ $rpp == $index ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <input type="hidden" name="orderBy" value="{{$orderBy}}"/>
        <input type="hidden" name="orderType" value="{{$orderType}}"/>
        <input type="hidden" name="q" value="{{$q}}"/>
        <input type="submit" class="btn btn-primary" value="Submit"/>
    </form>
    <form action="" class="d-flex">
        <div class="form-group">
            <input class="form-control" type="search" name="q" placeholder="Search..." value="{{$q}}"/>
        </div>
        <input type="hidden" name="orderBy" value="{{$orderBy}}"/>
        <input type="hidden" name="orderType" value="{{$orderType}}"/>
        <input type="hidden" name="rowPerPage" value="{{$rpp}}"/>
        <input type="submit" class="btn btn-primary" value="Filter"/>
    </form>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">
                    #
                    <a href="?rowPerPage={{$rpp}}&orderBy=id&orderType=desc"><svg class="bi"><use xlink:href="#arrow-down" /></svg></a>
                    <a href="?rowPerPage={{$rpp}}&orderBy=id&orderType=asc"><svg class="bi"><use xlink:href="#arrow-up" /></svg></a>
                </th>
                <th scope="col">
                    Name
                    <a href="?rowPerPage={{$rpp}}&orderBy=name&orderType=desc"><svg class="bi"><use xlink:href="#arrow-down" /></svg></a>
                    <a href="?rowPerPage={{$rpp}}&orderBy=name&orderType=asc"><svg class="bi"><use xlink:href="#arrow-up" /></svg></a>
                </th>
                <th scope="col">
                    Idargo
                    <a href="?rowPerPage={{$rpp}}&orderBy=idargo&orderType=desc"><svg class="bi"><use xlink:href="#arrow-down" /></svg></a>
                    <a href="?rowPerPage={{$rpp}}&orderBy=idargo&orderType=asc"><svg class="bi"><use xlink:href="#arrow-up" /></svg></a>
                </th>
                <th scope="col">
                    Idoltro
                    <a href="?rowPerPage={{$rpp}}&orderBy=idoltro&orderType=desc"><svg class="bi"><use xlink:href="#arrow-down" /></svg></a>
                    <a href="?rowPerPage={{$rpp}}&orderBy=idoltro&orderType=asc"><svg class="bi"><use xlink:href="#arrow-up" /></svg></a>
                </th>
                <th scope="col">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>{{$artist->argo->name}}</td>
                    <td>{{ $artist->idoltro }}</td>
                    <td>
                        <a href="{{ url('artist/' . $artist->id) }}" class="btn btn-info">Show</a>
                    </td>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    {{ $artists->appends(['rowPerPage' => $rpp, 'orderBy' => $orderBy, 'orderType' => $orderType, 'q' => $q])->onEachSide(2)->links() }}
</div>
@endsection