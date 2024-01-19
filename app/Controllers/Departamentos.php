<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\DepartamentosModel;

class Departamentos extends BaseController
{
    protected $departamentos;
    public function __construct()
    {
        $this->departamentos = new DepartamentosModel();
    }
    public function index()
    {

        $departamentos = $this->departamentos->obtenerDepartamentos();

        $data = ['titulo' => 'Administrar Departamentos', 'nombre' => 'Shadia Rangel', 'departamentos' => $departamentos]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
        echo view('/departamentos/departamentos', $data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" ) {
            
            $this->departamentos->save([    
                'id_pais' => $this->request->getPost('id_pais'),          
                'nombre' => $this->request->getPost('nombre')
            ]);
            return redirect()->to(base_url('/departamentos'));
        } 
    }
} 