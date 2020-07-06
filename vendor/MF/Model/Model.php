<?php  

	namespace MF\Model;

	abstract class Model{
		protected $db;

		//PDO faz parte da raiz do php e nao do namespace App\Models. Por isso tem q colocar a barra
		public function __construct(\PDO $db){
			$this->db = $db;
		}
	}


?>