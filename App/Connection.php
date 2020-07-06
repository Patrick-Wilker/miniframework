<?php  
	
	namespace App;

	class Connection{
		//metodos static nao precisam ser instanciados
		public static function getDb(){
			try{

				//se nao colocar a barra o php vai buscar a funcao PDO dentro do namespace App, como se fosse App\PDO, porem o PDO é nativo do php e para isso funcionar tem que colocar a barra, para ele buscar na raiz do PHP (php mesmo)
				$conn = new \PDO(
					"mysql:host=localhost;dbname=mvc;charset=utf8",
					"root",
					"root"
				);

				return $conn;

			}catch(\PDOException $e){
				//tratar o erro
			}	
		}
	}
?>