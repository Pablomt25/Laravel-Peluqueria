<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peluqueros;

class PeluquerosController extends Controller
{
    protected $peluquerosModel;

    public function __construct(Peluqueros $peluquerosModel)
    {
        $this->peluquerosModel = $peluquerosModel;
    }

    public function index()
    {
        $peluqueros = $this->peluquerosModel->verPeluqueros();
        return view('peluqueros.index', ['peluqueros' => $peluqueros]);
    }

    public function show($id)
    {
        $peluqueros = $this->peluquerosModel->verPeluquero($id);
        return view('peluqueros.index', ['peluqueros' => $peluqueros]);
    }

    public function create()
    {
        return view('peluqueros.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellidos' => 'required',
            'especialidad' => 'required'
        ]);

        $this->peluquerosModel->crearPeluquero(
            $request->input('nombre'),
            $request->input('apellidos'),
            $request->input('especialidad')
        );

        return redirect()->route('peluqueros.index')->with('success', 'Peluquero creado exitosamente');
    }

    public function edit($id)
    {
        $peluquero = $this->peluquerosModel->verPeluquero($id);
        return view('peluqueros.edit', ['peluquero' => $peluquero]);
    }

    public function update(Request $request, $id)
    {
        $this->peluquerosModel->editarPeluquero(
            $id,
            $request->input('nombre'),
            $request->input('apellidos'),
            $request->input('especialidad')
        );

        return redirect()->route('peluqueros.index')->with('success', 'Peluquero actualizado exitosamente');
    }

    public function destroy($id)
    {
        $this->peluquerosModel->borrarPeluquero($id);
        return redirect()->route('peluqueros.index')->with('success', 'Peluquero eliminado exitosamente');
    }
}