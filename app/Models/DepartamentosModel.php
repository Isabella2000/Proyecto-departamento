<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class DepartamentosModel extends Model
{
    protected $table      = 'departamentos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_pais', 'nombre', 'estado']; /* relacion de campos de la tabla */

    protected $useTimestamps = false; /*tipo de tiempo a utilizar */
    protected $createdField  = ''; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerDepartamentos()
    {
        $this->select('departamentos.*');
        $this->where('estado', "A");
        $departamento = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $departamento;
    }
    
    public function traer_Departamento($id){
        $this->select('paises.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }
} 