<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class CargosModel extends Model
{
    protected $table      = 'cargos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType     = 'array';  /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'estado']; /* relacion de campos de la tabla */

    protected $useTimestamps = false; /*tipo de tiempo a utilizar */
    protected $createdField  = ''; /*fecha automatica para la creacion */
    protected $updatedField  = ''; /*fecha automatica para la edicion */
    protected $deletedField  = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerCargos()
    {
        $this->select('cargos.*');
        $this->where('estado', "A");
        $cargo = $this->findAll();  // nos trae todos los registros que cumplan con una condicion dada 
        return $cargo;
    }
} 