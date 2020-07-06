<?php  

namespace MF\Controller;

abstract class Action{

	protected $view;

	public function __construct(){
		$this->view = new \stdClass();  // um objeto vazio
	}

	protected function render($view, $layout){
		$this->view->page = $view;
		if(file_exists("../App/Views/".$layout.".phtml")){
			require_once "../App/Views/".$layout.".phtml";
		}else{
			$this->content();
		}
		
	}

	public function content(){
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));


		require_once "../App/Views/".$classAtual."/".$this->view->page.".phtml";

		// todos os require tem como referencia o index.php da pasta public, pois é lá que o autolaod é carregado. tudo é feito lá
	}
}



?>