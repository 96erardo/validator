<?php 

use PHPUnit\Framework\TestCase;
use Gagl\Validator;

class ValidatorTest extends TestCase {

    public function testContructor () {
        
        $params = [
            'name' => 'Gerardo García',
        ];

        $rules = [
            'name' => 'required|string',
        ];
        
        $this->assertInstanceOf(
            Validator::class,
            new Validator($params, $rules)
        );
    }

    public function testNameValidation () {

        $name = 'Gerardo';

        $this->assertEquals(
            ['valid' => true, 'messages' => ['name' => []]],
            Validator::isName($name)
        );
    }
}
?>