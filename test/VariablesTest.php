<?php
class VariablesTest extends PHPUnit_Framework_TestCase {
	public function test_PHP_debilmente_tipado() {
		$variable = 0;
		$this->assertEquals ( 0, $variable );
		$variable = "soy una cadena de caracteres";
		$this->assertEquals ( "soy una cadena de caracteres", $variable );
	}
	public function test_diferencia_entre_que_no_pase_nada_si_no_existe_una_variable_y_que_esté_establecida() {
		$this->assertFalse ( isset ( $variable ) );
		
		$variable = 0;
		$this->assertTrue ( isset ( $variable ) );
	}
	public function test_referencia_indirecta() {
		$name = "John";
		
		$this->assertFalse ( isset ( $John ) );
		
		// AQUÍ ESTÁ LA CHICHA (estamos definiendo una variable con el mismo
		// nombre que tenga el valor de $name en ese instante)
		$$name = "Doe";
		
		// .. por lo tanto $John existe y está definido...
		$this->assertTrue ( isset ( $John ) );
		// .. y el valor coincide en todos los casos
		$this->assertEquals ( "Doe", $$name );
		$this->assertEquals ( $John, $$name );
	}
	public function test_unset() {
		$variable = 0;
		$this->assertTrue ( isset ( $variable ) );
		unset ( $variable );
		$this->assertFalse ( isset ( $variable ) );
	}
	public function test_empty_no_confundir_una_variable_no_iniciada_con_una_variable_vacia() {
		$this->assertFalse ( isset ( $variable ) );
		$this->assertTrue ( empty ( $variable ) );
		
		$variable = 0;
		$this->assertTrue ( isset ( $variable ) );
		$this->assertTrue ( empty ( $variable ) );
		
		$variable = "";
		$this->assertTrue ( isset ( $variable ) );
		$this->assertTrue ( empty ( $variable ) );
		
		$variable = NULL;
		$this->assertFalse ( isset ( $variable ) );
		$this->assertTrue ( empty ( $variable ) );
	}
	public function test_enteros() {
		$diez=10;
		$this->assertEquals ( 10, $diez );
		$diez=0x0A;
		$this->assertEquals ( 10, $diez );
 		$diez=012;
 		$this->assertEquals ( 10, $diez );
		
	}

	public function test_cadenas_de_caracteres() {
		$var = "hola";
		$var2 = "mundo";
		$this->assertEquals("hola mundo","$var $var2");
		
		$var = "hola";
		$var2 = "mundo";
		$this->assertNotEquals("hola mundo",'$var $var2');
		$this->assertEquals("$"."var "."$"."var2",'$var $var2');
		
		$str = "A";
		$str{2} = "d";
		$str{1} = "n";
		$str = $str . "i";
		$this->assertEquals("Andi", $str);
		
	}

}