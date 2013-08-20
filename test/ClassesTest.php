<?php

function my_autoloader($class_name) {
    include_once __DIR__ . '/../classes/' . $class_name . '.class.php';
}

/**
 * test case.
 */
class ClassTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        spl_autoload_register('my_autoloader');
    }

    public function test_crear_un_objecto_de_una_clase_y_acceder_a_un_metodo() {
        $clase = new Clase ();
        $this->assertEquals(1, $clase->getPropiedad());
    }

    public function test_en_php5_los_objetos_pasados_en_metodos_se_pasan_por_referencia_o_sea_un_enlace_al_mismo_objeto_no_una_copia() {
        $clase = new Clase ();
        $this->assertEquals(1, $clase->getPropiedad());

        $clase2 = new Clase2 ();
        $nuevoValor = 2;
        $clase2->metodoQueModificaPropiedadDeClase($clase, $nuevoValor);
        $this->assertEquals($nuevoValor, $clase->getPropiedad());
    }

    public function test_en_php5_al_igualar_dos_objetos_se_referencian_a_la_misma_clase() {
        $clase = new Clase();
        $this->assertEquals(1, $clase->getPropiedad());
        
        $referencia = $clase;
        $referencia->setPropiedad(2);
        $this->assertEquals(2, $clase->getPropiedad());
    }
    public function test_clonar_objetos_en_php5() {
        $clase = new Clase();
        $this->assertEquals(1, $clase->getPropiedad());
        
        $objetoClonado = clone $clase;
        $objetoClonado->setPropiedad(2);
        $this->assertEquals(1, $clase->getPropiedad());
        $this->assertEquals(2, $objetoClonado->getPropiedad());
    }

}