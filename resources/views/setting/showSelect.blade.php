<!-- Heredamos el contenido base de layout -->
@extends('app.layout')

@section('title', 'Argo ShowSelect')

@section('content')

<!-- Creamos los 3 selects -->
<label for="pais">Paises</label>
<select name="pais" class="form-select" id="pais" required>
    <option value="" hidden>-- Selecciona un país --</option>
    @foreach ($paises as $value => $label)

        <option value="{{ $value }}" {{ $pais === $value ? 'selected' : ''}}>{{ $label }}</option>

    @endforeach
</select>

<br>

<label for="pais">Provincias</label>
<select name="provincias" class="form-select" id="provincias" required>
    <option value="" disabled {{ $provincia === '' ? 'selected' : '' }}>-- Selecciona una provincia --</option>
    @foreach ($provincias as $value => $label)

        <option value="{{ $value }}" {{ $provincia === $value ? 'selected' : '' }}>{{ $label }}</option>

    @endforeach
</select>

<br>

<label for="pais">Countries</label>
<select name="countries" class="form-select" id="countries" required>
    <option value="" disabled {{ $selectedCountry === '' ? 'selected' : '' }}>-- Selecciona un country --</option>
    @foreach ($countries as $country)

        <option value="{{ $country->code }}" {{ $selectedCountry === $country->code ? 'selected' : '' }}>{{ $country->name }}</option>

    @endforeach
</select>

<br>

<label for="countries2">Countries with pluck</label>
<select name="countries2" class="form-select" id="countries2" required>
    <option value="" disabled {{ $selectedCountry2 === '' ? 'selected' : '' }}>-- Selecciona un country --</option>
    @foreach ($countries2 as $value => $label)

        <option value="{{ $value }}" {{ $selectedCountry2 === $value ? 'selected' : '' }}>{{ $label }}</option>

    @endforeach
</select>

@endsection