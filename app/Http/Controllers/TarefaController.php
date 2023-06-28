<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TarefaController extends Controller
{

    public function index()
    {
        $tarefas = Tarefa::when(request('query'), function ($q) {
            return $q->where('title', 'like', '%' . request('query') . '%');
        })
            ->paginate(5);
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | unique:tarefas',
            'content' => 'nullable | min:10',
            'cover_image' => 'required | image | mimes:png,webp,jpg,jpeg | max:1024' // 1MB
        ]);


        if ($request->cover_image) {
            $imgName = time() . '.' . $request->cover_image->extension(); // .png, .jpg
            $request->cover_image->storeAs('app/public/media/tarefas/', $imgName, 'storage');
        }

        Tarefa::create([
            'title' => $request->title,
            'content' => $request->content,
            'cover_image' => $imgName,
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Informações inseridas com sucesso!');
    }


    public function show(Tarefa $tarefa)
    {
        //
    }


    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit', compact('tarefa'));
    }


    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'title' => 'required | unique:tarefas,title,' . $tarefa->id,
            'content' => 'nullable | min:10',
            'cover_image' => 'nullable | image | mimes:png,webp,jpg,jpeg | max:1024' // 1MB
        ]);


        if ($request->cover_image) {

            Storage::disk('storage')->delete('app/public/media/tarefas/' . $tarefa->cover_image);

            $imgName = time() . '.' . $request->cover_image->extension(); 
            $request->cover_image->storeAs('app/public/media/tarefas/', $imgName, 'storage');
        }

        $tarefa->update([
            'title' => $request->title,
            'content' => $request->content,
            'cover_image' => $request->cover_image ? $imgName : $tarefa->cover_image,
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Informações atualizadas com sucesso!');
    }


    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        Storage::disk('storage')->delete('app/public/media/tarefas/' . $tarefa->cover_image);

        return redirect()->route('tarefas.index')->with('success', 'Opção excluída com sucesso!');
    }
}
