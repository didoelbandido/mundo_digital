<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CursoModel;

class Curso extends BaseController
{
    public function __construct()
    {
        helper(['form','url']);
    }

    public function index()
    {
        return view('header').view('cursoView').view('footer');
    }
}