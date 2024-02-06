<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios; // Importa el modelo de Servicio

class ServiciosController extends Controller
{
    protected $servicioModel;

    public function __construct(Servicios $servicioModel)
    {
        $this->servicioModel = $servicioModel;
    }

    public function index()
    {
        $servicios = $this->servicioModel->all();
        return view('servicios.index', ['servicios' => $servicios]);
    }

    public function show($id)
    {
        $servicio = $this->servicioModel->find($id);
        return view('servicios.show', ['servicio' => $servicio]);
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'duracion' => 'required|integer',
            'precio' => 'required|numeric'
        ]);

        $this->servicioModel->create([
            'nombre' => $request->nombre,
            'duracion' => $request->duracion,
            'precio' => $request->precio
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente');
    }

    public function edit($id)
    {
        $servicio = $this->servicioModel->find($id);
        return view('servicios.edit', ['servicio' => $servicio]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'duracion' => 'required|integer',
            'precio' => 'required|numeric'
        ]);

        $servicio = $this->servicioModel->find($id);
        $servicio->update([
            'nombre' => $request->nombre,
            'duracion' => $request->duracion,
            'precio' => $request->precio
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio actualizado exitosamente');
    }

    public function destroy($id)
    {
        $this->servicioModel->destroy($id);
        return redirect()->route('servicios.index')->with('success', 'Servicio eliminado exitosamente');
    }
}
