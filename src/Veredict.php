<?php 

namespace Gelp;

use Gelp\Message;

class Veredict {

    /**
     * Indicates if all values a valid
     *
     * @var boolean
     */
    private $valid;
    
    /**
     * Validation messages
     *
     * @var array
     */
    private $messages;

    public function __construct($fields) {

        $this->messages = [];

        $this->valid = true;

        foreach ($fields as $field) {
            $this->messages[$field] = [];
        }
    }

    public function valid(boolean $valid) {

        $this->valid = $valid;
    }

    public function addField ($field) {
        
        $this->messages[$field] = [];
    }

    public function addValidationMessage ($rule, $field) {

        $this->messages[$field][] = Message::get($rule, $field);
    }

    public function get () {

        return [
            'valid' => $this->valid,
            'messages' => $this->messages,
        ];
    }
}

?>