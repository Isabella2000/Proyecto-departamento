<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MunicipiosModel;

class Municipios extends BaseController
{
    protected $municipios;
    public function __construct()
    {
        $this->municipios = new MunicipiosModel();
    }
    public function index()
    {

        $municipios = $this->municipios->obtenerMunicipios();

        $data = ['titulo' => 'Administrar Municipios', 'nombre' => 'Shadia Rangel', 'municipios' => $municipios]; // le asignamos a la variable data, que es la que interactua con la vista, los datos obtenidos del modelo, ademas de enviarle una variable titulo para el reporte.
        echo view('/principal/header', $data);
        echo view('/municipios/municipios', $data); //mostramos la vista desde el controlador y le enviamos la data necesaria, en este caso, estamos enviando el titulo
    }
    public function insertar()
    {
        $tp=$this->request->getPost('tp');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->municipios->save([
                    'id_dpto' => $this->request->getPost('id_dpto'),
                    'nombre' => $this->request->getPost('nombre')
                ]);
            } else {
                $this->municipios->update($this->request->getPost('id'),[ 
                    'id_dpto' => $this->request->getPost('id_dpto'),                   
                    'nombre' => $this->request->getPost('nombre')
                ]);
            }
            return redirect()->to(base_url('/municipios'));
        }
    }

    public function buscar_Municipio($id)
    {
        $returnData = array();
        $municipio_ = $this->municipios->traer_Municipio($id);
        if (!empty($municipio_)) {
            array_push($returnData, $municipio_);
        }
        echo json_encode($returnData);
    }
}