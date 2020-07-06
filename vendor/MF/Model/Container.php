<?php  

namespace MF\Model;
use App\Connection;

class Container{


	public static function getModel($model){
		/*Retornar o modelo solicitado ja instanciado, incluindo com a conexao estabelecida*/

		$class = "\\App\\Models\\".ucfirst($model);


		$conn = Connection::getDb();

		return new $class($conn);
	}
}

?>