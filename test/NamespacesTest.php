<?php
include_once '../classes/Ecos/ClaseConNameSpace.class.php';
use Ecos\ClaseConNameSpace;
use Ecos as E;


class NamespacesTest extends PHPUnit_Framework_TestCase {	
    
    public function test_AccediendoAUnaClasePorSuQualifiedName(){
        $objeto = new \Ecos\ClaseConNameSpace();
        
        $this->assertEquals ( 'adios!!!', $objeto->hola() );
    }

    public function test_AccediendoAUnaClaseDentroDeUnNsSoloPorSuNombreYGraciasAlUse(){
        $objeto = new ClaseConNameSpace();
        
        $this->assertEquals ( 'adios!!!', $objeto->hola() );
    }

    public function test_AccediendoAUnaClaseDentroDeUnNsUsandoElAlias(){
        $objeto = new E\ClaseConNameSpace();
        
        $this->assertEquals ( 'adios!!!', $objeto->hola() );
    }
}
?>
