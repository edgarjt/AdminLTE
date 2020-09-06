<?php

namespace App\Http\Controllers;

use App\Emergencia;
use App\Enfermedad;
use App\Fallecido;
use App\Municipio;
use App\Paciente;
use App\SubDelegacion;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getUsers() {
        $users = User::all();
        return view('users.user',['users' => $users]);
    }

    public function getMunicipios() {
        $municipios = Municipio::all();
        return view('municipios.municipios', ['municipios' => $municipios]);
    }

    public function getSubDelegaciones() {
        $subDelegaciones = SubDelegacion::all();
        return view('subDelegaciones.subDelegaciones', ['subDelegaciones' => $subDelegaciones]);
    }

    public function getEnfermedades() {
        $enfermedades = Enfermedad::all();
        return view('enfermedades.enfermedades', ['enfermedades' => $enfermedades]);
    }

    public function getEmergencias() {
        $emergencias = Emergencia::all();
        return view('emergencias.emergencias', ['emergencias' => $emergencias]);
    }

    public function getPacientes() {
        $pacientes = Paciente::all();
        return view('pacientes.pacientes', ['pacientes' => $pacientes]);
    }

    public function getFallecidos() {
        $fallecidos = Paciente::all();
        return view('fallecidos.fallecidos', ['fallecidos' => $fallecidos]);
    }
}
