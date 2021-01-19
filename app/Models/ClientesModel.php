<?php namespace App\Models;

use CodeIgniter\Model;
//indexar banco com restrições de orm
class ClientesModel extends Model {

    protected $table = 'tb_clientes';
    protected $primaryKey ='id';
    protected $allowedFields = ['nome','endereço','telefone','email'];
    protected $returnType = 'object';
    
}