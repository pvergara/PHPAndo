<?php

class ControlDeErrores extends PHPUnit_Framework_TestCase {

    public function test_control_de_errores() {
        $pasaPorElError = false;
        try {
            $a = 1 / 0;
        } catch (Exception $e) {
            $pasaPorElError = true;
        }
        $this->assertTrue($pasaPorElError);
    }

}

?>
