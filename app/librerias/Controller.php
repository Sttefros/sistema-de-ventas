<?php 

	class Controller{
		
		//cargar modelo
		public function modelo($modelo){
			//carga
			require_once '../app/models/'.$modelo. '.php';

			return new $modelo();
		}

		public function vista($vista, $datos = []){

			if(file_exists('../app/views/'.$vista. '.php')){

				require_once '../app/views/'.$vista. '.php';

			} else {
				die('la vista no existe');
			}

		}
	}