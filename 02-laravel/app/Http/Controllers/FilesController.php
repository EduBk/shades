<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // return view('file');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $nombre = $request->file('nombre')->getClientOriginalName();
        $path = $request->file('nombre')->store('public/files');

        $array = explode('public', $path);

        $guardar = new File;

        $guardar->nombre = $nombre;
        $guardar->path = 'storage' . $array[1];
        $guardar->save();

        return redirect()->route('productos.index')->with('success', 'Archivo Agregado Correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
