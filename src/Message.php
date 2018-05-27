<?php

namespace Gelp;

class Message {

    private static $messages = [
        'required' => 'The :field: field is required',
        'numeric' => 'The :field: field must be a number',
        'string' => 'The :field: field must be a string',
        'word' => 'The :field: field must contain only one word',
    ];

    public static function get ($rule, $field) {

        return str_replace(':field:', $field, self::$messages[$rule]);
    }
}