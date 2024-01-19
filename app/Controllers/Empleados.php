<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\EmpleadosModel;

class Empleados extends BaseController
{
    protected $empleados;
    public function __construct()
    {
        $this->empleados = new EmpleadosModel();
    }
    public function index()
    {

        $empleados = $this->empleados->obtenerEmpleados();

        $data = ['titulo' => 'Administrar Empleados', 'nombre' => 'Shadia Rangel', 'empleados' => $empleados]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
        echo view('/empleados/empleados', $data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }
    public function insertar()
    {
        if ($this->request->getMethod() == "post" ) {
            
            $this->empleados->save([    
                'nombres' => $this->request->getPost('nombres'),          
                'apellidos' => $this->request->getPost('apellidos'),
                'id_municipio' => $this->request->getPost('id_municipio'),
                'nacimiento' => $this->request->getPost('nacimiento'),
                'id_cargo' => $this->request->getPost('id_cargo')
            ]);
            return redirect()->to(base_url('/empleados'));
        } 
    }
} 