<?php

namespace Gagl;

use Gagl\Veredict;

class Validator {
    
    /**
     * Associative array with validation rules
     *
     * @var array
     */
    private $rules;
    
    /**
     *  Associative array with input names and values
     *
     * @var array
     */
    private $params;
    
    /**
     * The response that goes back when everything is validated
     *
     * @var \Gagl\Veredict
     */
    private $veredict;

    /**
     * Associative array with rule => function that validates that rule
     *
     * @var array
     */
    private static $map = [
        'required' => 'required',
        'number' => 'number',
        'string' => 'string',
        'word' => 'singleWord',

    ];

    public function __construct ($params, $rules) {
        
        $this->params = $params;

        $this->rules = $rules;

        $this->veredict = new Veredict(array_keys($params));
    }

    /**
     * Validates all input parameters
     *
     * @return void
     */
    public function validate () {

        foreach ($params as $key => $value) {
            
            $rules = explode('|', $this->rules[$key]);

            foreach ($rules as $rule) {
                
                $function = self::$map[$rule];
                
                if (!self::$function($value)) {

                    $this->veredict->addValidationMessage($rule, $key);
                }
            }
        }

        return $this->veredict->get();
    }

    /**
     * Validates input name
     *
     * @param string $name
     * @return boolean
     */
    public static function isName ($name) {
        
        $field = 'name';

        $veredict = new Veredict([$field]);

        $rules = explode('|', 'required|string|word');

        foreach ($rules as $rule) {
                
            $function = self::$map[$rule];
                
            if (!self::$function($name)) {

                $veredict->addValidationMessage($rule, $field);
            }
        }

        return $veredict->get();
    }

    /**
     * Validates input email
     *
     * @param string $email
     * @param string $domain
     * @return boolean
     */
    public static function isEmail ($email, $domain) {

    }
    
    /**
     * Validates input password
     *
     * @param string $pasword
     * @return boolean
     */
    public static function isPassword ($pasword) {

    }

    private static function required ($value) {
        return !empty($value);
    }

    private static function string ($value) {
        return is_string($value);
    }

    private static function number ($value) {
        return is_numeric($value);
    }

    private static function singleWord ($value) {
        return (preg_match('/( +)|(\n)/', $value) != 1 && is_string($value)) ? true : false;
    }
}

?>