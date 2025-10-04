<!-- Validator.php -->
<?php

class Validator
{
    private $data;
    public $errors;
    function __construct($data)
    {
        $this->data = $data;
    }
    public function validate($value, $field, $rules)
    {
        // echo("data: $data <br> From:$field <br> Rules: $rules <br> <hr>");
        $rules_array = explode("|", $rules);
        foreach ($rules_array as $rules) {
            $rule = explode(":", $rules);

            $rule_name = $rule[0];
            $rule_value = $rule[1] ?? NULL;
            $this->applyRule($value, $field, $rule_name, $rule_value);
        }
    }


    function applyRule($value, $field, $rule_name, $rule_value = NULL): void
    {
        switch ($rule_name) {
            case 'required':
                if (empty($value)) {
                    $this->addError($field, "The $field is require! ");
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, "Invalid Email ");
                }
                break;
            case 'min':
                if (strlen($value) < $rule_value) {
                    $this->addError($field, "The $field must contain more than $rule_value Chars ");
                }
                break;
            case 'max':
                if ((strlen($value) > $rule_value)) {
                    $this->addError($field, "The $field must contain less than $rule_value Chars ");
                }
                break;
            case 'url':
                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                    $this->addError($field, "Invalid Link ");
                }
                break;
            case 'number':
                if (!is_numeric($value)) {
                    $this->addError($field, "the $field must have numbers ");
                }
                break;
            case 'string':
                if (!is_string($value)) {
                    $this->addError($field, "the $field must have characters ");
                }
                break;
            case 'confirmed':
                $confirm_field = "confirm-" . $field;
                if (!isset($this->data[$confirm_field]) || $value != $this->data[$confirm_field]) {
                    $this->addError($field, "The confirm $field doesn't match with the $field");
                }
                break;
            case 'regex':
                if (!preg_match("/$rule_value/", $value)) {
                    $this->addError($field, "The $field format is invalid");
                }
                break;
        }
    }
    private function addError($field, $message): void
    {
        if (!isset($this->errors[$field])) {
            $this->errors[$field] = [];
        }
        $this->errors[$field][] = $message;
    }

    public function getError(): array
    {
        return $this->errors;
    }
    public function hasErrors()
    {
        return !empty($this->errors);
    }
}