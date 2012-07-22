<?php
class ArraysTest extends PHPUnit_Framework_TestCase {
	public function test_tablas_iniciar() {
		$array1= array(1,2,3);
	
		$array2[0]= 1;
		$array2[1]= 2;
		$array2[2]= 3;
	
		$array3=array(0=>1,1=>2,2=>3,);
	
		$array4[]= 1;
		$array4[]= 2;
		$array4[]= 3;
	
		$this->assertEquals($array1, $array2);
		$this->assertEquals($array2, $array3);
		$this->assertEquals($array3, $array4);
	
		//fuera de los test.. pero para indicar como se imprime un array
		print_r($array1);
		print_r($array2);
		print_r($array3);
	}
	
	public function test_tablas_asociativas_iniciar() {
		$array1= array("name"=>"John","surname"=>"Doe");
		$array2["name"]= "John";
		$array2["surname"]= "Doe";
		$this->assertEquals($array1, $array2);
	}
	
	public function test_tablas_multidimensionales() {
		$array1= array(1=>array("name"=>"John","surname"=>"Doe"),array("name"=>"Perico","surname"=>"De los palotes"));
	
		$array2[1]["name"]= "John";
		$array2[1]["surname"]= "Doe";
		$array2[2]["name"]= "Perico";
		$array2[2]["surname"]= "De los palotes";
	
		$this->assertEquals($array1, $array2);
	}
	
	public function test_tablas_foreach_SIN_modificar() {
		$array1= array(1,2,3);
		foreach ($array1 as $key => $value) {
			$value = $key+10;
		}
		$this->assertEquals(array(1,2,3), $array1);
	}
	
	public function test_tablas_foreach_MODIFICANDO() {
		$array1= array(1,2,3);
		//la "clave de todo esto" está en el ampbersand (ese permite modificar los valores)
		foreach ($array1 as $key => &$value) {
			$value = $key+10;
		}
		$this->assertEquals(array(10,11,12), $array1);
	}

	public function test_tablas_reset_each_list() {
		$array1= array("name"=>"John","surname"=>"Doe");
		
		list($key,$value) = each($array1);	
		$this->assertEquals("name",$key);
		$this->assertEquals("John",$value);
		
		list($key,$value) = each($array1);
		$this->assertEquals("surname",$key);
		$this->assertEquals("Doe",$value);
		
 		$this->assertFalse(each($array1));
 		$this->assertFalse(each($array1));
 		$this->assertFalse(each($array1));
 			
 		reset($array1);

 		list($key,$value) = each($array1);
 		$this->assertEquals("name",$key);
 		$this->assertEquals("John",$value);
		//and so on.... 			
	}
}

