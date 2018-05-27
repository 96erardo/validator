<?php

use PHPUnit\Framework\TestCase;
use Gelp\Veredict;

class VeredictTest extends TestCase {
    
    public function testConstructor () {

        $fields = ['name'];

        $this->assertInstanceOf(
            Veredict::class,
            new Veredict($fields)
        );
    }

    public function testGet () {

        $fields = ['name'];

        $veredict = new Veredict($fields);

        $this->assertEquals(
            ['valid' => true, 'messages' => ['name' => []]],
            $veredict->get()
        );
    }
}

?>