<?php
function my_autoloader($class_name) {
	include_once 'classes/' . $class_name . '.class.php';
}
/**
 * test case.
 */
class ClassTest extends PHPUnit_Framework_TestCase {
	public function setUp() {
		spl_autoload_REGister ( 'my_autoloader' );
	}
	public function test_crear_un_objecto_de_una_clase_y_acceder_a_un_metodo() {
		$clase = new Clase ();
		$this->assertEquals ( 1, $clase->getPropiedad () );
	}
	public function test_en_php5_los_objetos_pasados_en_metodos_se_pasan_por_referencia_o_sea_un_enlace_al_mismo_objeto_no_una_copia() {
		$clase = new Clase ();
		$this->assertEquals ( 1, $clase->getPropiedad () );
		
		$clase2 = new Clase2 ();
		$nuevoValor = 2;
		$clase2->metodoQueModificaPropiedadDeClase ( $clase, $nuevoValor );
		$this->assertEquals ( $nuevoValor, $clase->getPropiedad () );
	}

	public function test_control_de_errores() {
		$pasaPorElError = false;
		try {
			$a = 1/0;
		} catch (Exception $e) {
			$pasaPorElError = true;
		}
		$this->assertTrue ( $pasaPorElError );
		
	}
	
}