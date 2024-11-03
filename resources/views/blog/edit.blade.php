@extends('adminlte::page')

@section('title', 'Blog | Editar')

@section('content_header')
    <h1>Editar Blog</h1>
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
        action="{{ route('blog.update', $blog) }}"
        class="mt-3"
        method="POST"
    >
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="titulo">Titulo *</label>
            <input 
                type="text"
                class="form-control"
                id="titulo"
                name="titulo"
                value="{{ $blog->titulo }}"
            >
        </div>
        <div class="mb-3">
            <label for="etiqueta">Etiqueta *</label>
            <input 
                type="text"
                class="form-control"
                id="etiqueta"
                name="etiqueta"
                value="{{ $blog->etiqueta }}"
            >
        </div>
        <div class="mb-3">
            <label for="contenido">Contenido *</label>
            <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control">{{ $blog->contenido }}</textarea>
        </div>

        <button type="submit" class="btn btn-sm btn-success">
            Guardar
        </button>
    </form>
@stop