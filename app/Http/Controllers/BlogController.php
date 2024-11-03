<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('blog.index', [
            'blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'titulo' => 'required',
                'etiqueta' => 'required',
                'contenido' => 'required'
            ]);

            Blog::create([
                'titulo' => $request->titulo,
                'etiqueta' => $request->etiqueta,
                'contenido' => $request->contenido
            ]);

            DB::commit();

            session()->flash('success', 'Registro creado correctamente');

            return to_route('blog.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'No se pudo crear el registro: ' . $th->getMessage());
        }
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'titulo' => 'required',
                'etiqueta' => 'required',
                'contenido' => 'required'
            ]);

            $blog->update([
                'titulo' => $request->titulo,
                'etiqueta' => $request->etiqueta,
                'contenido' => $request->contenido
            ]);

            DB::commit();

            session()->flash('success', 'Registro actualizado correctamente');

            return to_route('blog.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'No se pudo actualizar el registro: ' . $th->getMessage());
        }
    }

    public function destroy($id)
    {
        Blog::destroy($id);

        session()->flash('success', 'Registro eliminado correctamente');

        return to_route('blog.index');
    }
}
