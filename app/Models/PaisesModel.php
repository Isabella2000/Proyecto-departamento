<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class PaisesModel extends Model
{
    protected $table      = 'paises'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'codigo', 'estado', 'FechaCrea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField  = 'FechaCrea'; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerPaises()
    {
        $this->select('paises.*');
        $this->where('estado', "A");
        $datos = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $datos;
    }

    public function traer_Pais($id){
        $this->select('paises.*');
        $this->where('id', $id);
        $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $datos;
    }

    public function elimina_Pais($id,$estado){
        $datos = $this->update($id, ['estado' => $estado]);         
        return $datos;
    }
} 