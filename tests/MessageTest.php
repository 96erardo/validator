<?php

use PHPUnit\Framework\TestCase;
use Gelp\Message;

class MessageTest extends TestCase {
    
    public function testGet () {

        $this->assertEquals(
            'The name field is required',
            Message::get('required', 'name')
        );
    }
}

?>