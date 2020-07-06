<?php  

	namespace App\Controllers;

	//os recursos do miniframework
	use MF\Controller\Action; // é aqui q tem o construct , o atributo view e o metodo render (que é o responsavel por rodar a view). O namespace foi criado lá, e aqui eu so uso, por isso o 'use ...'. (esta dentro da pasta vendor, e dentro da MF e, por sua vez, na de Controller)
	//use App\Connection;
	use MF\Model\Container;

	//os models
	use App\Models\Produto;
	use App\Models\Info;


	class IndexController extends Action{

		public function index(){

			//$this->view->dados = array('Sofa', 'cadeira', 'Cama');
			//print_r($this->view->dados) ;

			//criar a instancia de conexao
			//$conn = Connection::getDb(); // nao precisou instanciar pois o metodo é estatico

			//instanciar modelo
			//$produto = new Produto($conn);

			//Container // aqui houve a abstracao na pasta MF dentro de vendor.

			$produto = Container::getModel('Produto');

			$produtos = $produto->getProdutos();

			$this->view->dados = $produtos;

			$this->render('index', 'layout1');

		}

		public function sobreNos(){
			
			//$this->view->dados = array('Notebook', 'celular', 'TV');

			//$conn = Connection::getDb();
			//$info = new Info($conn);

			$info = Container::getModel('Info');

			$informacoes = $info->getInfo();

			$this->view->dados = $informacoes;

			$this->render('sobreNos', 'layout2');
		}

	}

?>