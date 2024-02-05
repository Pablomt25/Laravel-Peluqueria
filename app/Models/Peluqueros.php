<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluqueros extends Model
{
    use HasFactory;

    protected $table = 'peluqueros';

    protected $fillable = [
        'nombre',
        'apellidos',
        'especialidad',
    ];

    public function verPeluqueros()
    {
        return $this->all();
    }

    public function verPeluquero($id)
    {
        return $this->find($id);
    }

    public function crearPeluquero($nombre, $apellidos, $especialidad)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->especialidad = $especialidad;
        $this->save();
    }

    public function editarPeluquero($id, $nombre, $apellidos, $especialidad)
    {
        $peluquero = $this->find($id);
        $peluquero->nombre = $nombre;
        $peluquero->apellidos = $apellidos;
        $peluquero->especialidad = $especialidad;
        $peluquero->save();
    }

    public function borrarPeluquero($id)
    {
        $peluquero = $this->find($id);
        $peluquero->delete();
    }


}
