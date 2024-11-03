@extends('adminlte::page')

@section('title', 'Blog | Crear')

@section('content_header')
    <h1>Crear Blog</h1>
@stop

@section('content')
    <a 
        href="{{ route('blog.index') }}"
        class="btn btn-sm btn-primary"
    >
        Regresar
    </a>

    @if (session('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form 
        action="{{ route('blog.store') }}"
        class="mt-3"
        method="POST"
    >
    @csrf
        <div class="mb-3">
            <label for="titulo">Titulo *</label>
            <input 
                type="text"
                class="form-control"
                id="titulo"
                name="titulo"
            >
        </div>
        <div class="mb-3">
            <label for="etiqueta">Etiqueta *</label>
            <input 
                type="text"
                class="form-control"
                id="etiqueta"
                name="etiqueta"
            >
        </div>
        <div class="mb-3">
            <label for="contenido">Contenido *</label>
            <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-sm btn-success">
            Guardar
        </button>
    </form>
@stop