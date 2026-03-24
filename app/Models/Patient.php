<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'genero',
        'DNI',
        'fecha_nacimiento'
    ];


    public function consultations() {
        return $this->hasMany(Consultation::class, 'id_paciente', 'id');
    }

    public static function index() {
        return Patient::orderBy('id')->paginate(10);
    }

    public static function añadirPaciente($request) {
        $patient = new Patient();

        $patient->nombre = $request->input('nombre');
        $patient->apellido = $request->input('apellido');
        $patient->genero = $request->input('genero');
        $patient->DNI = $request->input('dni');
        $patient->fecha_nacimiento = $request->input('fecha_nacimiento');

        $patient->save();
    }

    public static function actualizarPaciente($request, $id) {
        $patient = Patient::find($id);

        $patient->nombre = $request->input('nombre');
        $patient->apellido = $request->input('apellido');
        $patient->genero = $request->input('genero');
        $patient->DNI = $request->input('dni');
        $patient->fecha_nacimiento = $request->input('fecha_nacimiento');

        $patient->save();

		return $patient->id;
    }

    public static function quitarPaciente($id) {
        $patientElem = Patient::find($id);
        $patientElem->delete();
    }

}
