<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radicado;
use App\Models\Program;
use App\Models\Motivo;
use App\User;
use App\Models\FechRadic;


class DirprogController extends Controller
{
    public function index(){
        return('hola dirctor programa');
    }
}
