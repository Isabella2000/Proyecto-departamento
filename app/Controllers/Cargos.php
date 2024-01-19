<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\CargosModel;

class Cargos extends BaseController
{
    protected $cargos;
    public function __construct()
    {
        $this->cargos = new CargosModel();
    }
    public function index()
    {

        $cargos = $this->cargos->obtenerCargos();

        $data = ['titulo' => 'Administrar Cargos', 'nombre' => 'Shadia Rangel', 'cargos' => $cargos]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
        echo view('/cargos/cargos', $data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" ) {
            
            $this->cargos->save([             
                'nombre' => $this->request->getPost('nombre')
            ]);
            return redirect()->to(base_url('/cargos'));
        } 
    }
}