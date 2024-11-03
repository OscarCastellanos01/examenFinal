@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Blog</h1>
@stop

@section('content')
    <a 
        href="{{ route('blog.create') }}"
        class="btn btn-sm btn-primary"
    >
        Crear
    </a>

    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead class="table-dark">
            <tr>
                <td>Titulo</td>
                <td>Contenido</td>
                <td>Etiqueta</td>
                <td>Imagenes</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($blogs as $blog)
                <tr>
                    <td>{{ $blog->titulo }}</td>
                    <td>{{ $blog->contenido }}</td>
                    <td>{{ $blog->etiqueta }}</td>
                    <td>{{ $blog->imagen }}</td>
                    <td>
                        <a 
                            href="{{ route('blog.edit', $blog) }}"
                            class="btn btn-sm btn-warning"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="{{ route('blog.delete', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Sin resultados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop