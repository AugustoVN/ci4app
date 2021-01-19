<?php namespace App\Controllers;

use App\Models\ClientesModel;

class Clientes extends BaseController{

//construtor 
public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
{
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);

    //--------------------------------------------------------------------
    // Preload any models, libraries, etc, here.
    //--------------------------------------------------------------------
    // E.g.:
    $this->session = \Config\Services::session();
}
//anexar com o banco por orm padrão do ci4 + CRUD controle
    public function index()
    {
        //exibir todos os clientes com uma view
        $clientesModel = new \App\Models\ClientesModel();
        $data['clientes'] = $clientesModel->find();
        $data['titulo']='Todos os clientes';
        $data['msg']= $this->session->getFlashdata('msg');

        echo view('clientes', $data);
    }

    public function inserir(){
        $data['titulo']='Cadastrar novos clientes ou atualizar por id';
        $data['acao']='inserir';
        $data['msg']= '';
        if($this->request->getMethod()==='post'){
            //Instanciando de ORM
            $clientesModel = new \App\Models\ClientesModel();

            $clientesModel->set('nome', $this->request->getPost('nome'));
            $clientesModel->set('endereço', $this->request->getPost('endereço'));
            $clientesModel->set('telefone', $this->request->getPost('telefone'));
            $clientesModel->set('email', $this->request->getPost('email'));

            //teste de validação de inserção
            if($clientesModel->insert())
               $data['msg']= 'Inserido com sucesso';
            else
                 $data['msg']= 'Erro de chamada';
        }
        echo view('form_clientes', $data);
    }

    public function atualizar($id)
    {
    $data['titulo']='Cadastrar novos clientes '. $id;
    $data['acao']='Atualizar';
    $data['msg']= '';
    $clientesModel = new \App\Models\ClientesModel();
    $cliente = $clientesModel->find($id);
    
    if($this->request->getMethod()==='post'){
        //caso o form for atualizado
        $cliente->nome=$this->request->getPost('nome');
        $cliente->endereço=$this->request->getPost('endereço');
        $cliente->telefone=$this->request->getPost('telefone');
        $cliente->email=$this->request->getPost('email');

        if($clientesModel->update($id, $cliente))
             $data['msg']= 'atualizado com sucesso';
        else
          $data['msg']= 'error ';
   
    }
    $data['clientes']= $cliente;
    echo view('form_clientes', $data);
    }



    public function delete($id=null){

        if(is_null($id)){
        //criar variavel temp na session
        $this->session->setFlashdata('msg', 'Cliente não encontrado');
        return redirect()->to(base_url('clientes'));
        }
        $clientesModel = new \App\Models\ClientesModel();
        if($clientesModel->delete($id)){
            //caso apagou com sucesso
            $this->session->setFlashdata('msg', 'Cliente apagado');
        }else{
            $this->session->setFlashdata('msg', 'Erro ao apagar');
        }
        return redirect()->to(base_url('clientes'));
    }
}