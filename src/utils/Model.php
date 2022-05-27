<?php

namespace src\utils; 

abstract class Model {

    public string $id;

    //Rules for validation
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';
    public const RULE_NUMBER = 'number';

    //Container for storing errors
    public array $errors = [];
    public string $form_name;
    
     //Labels for different models
     public static array $labels = [
        'category' => [
            'cat_desc' => 'Category Description',
            'cat_name' => 'Category Name'
        ], 
        'product' => [
            'cat_id' => 'Category',
            'prod_title' => 'Product title',
            'prod_desc' => 'Product Description',
            'prod_image_main' => 'Cover Image',
            'prod_image_other' => 'Other Images',
            'prod_flavor' => 'Flavour',
            'prod_steps' => 'No of steps',
            'prod_color' => 'Product Dominant Colour',
            'date_added' => 'Date Added',
            'prod_status' => 'Product status',
            'prod_price' => 'Product Price',
            'featured' => 'Featured Product'
        ], 
        'customer' => [
            'cust_fname' => 'First name',
            'cust_other_names' => 'Other names',
            'cust_email' => 'Email address',
            'cust_phone' => 'Phone number'
        ], 
        'order' => [
            'prod_id' => 'Product name',
            'budget' => 'Your budget',
            'exp_delivery_date' => 'Expected delivery date',
            'prod_color' => 'Product dominant color'
        ],
        'customer-product' => [
            'prod_title' => 'Product name',
            'cat_name' => 'Product category',
            'color' => 'Dominant color',
            'prod_flavor' => 'Product flavor'
        ],

        'gallery' => [
            'name' => 'Image caption',
            'image' => 'Display image'
        ],
        'testimonies' => [
            'content' => 'Comment',
            'image' => 'Your Image',
            'customer_name' => 'Your name'
        ],
        'user' => [
            'user_name' => 'Username',
            'user_email' => 'Email Address',
            'user_password' => 'New password',
            'user_confirm_password' => 'Confirm password'
        ]
        
    ];

    //To be implemented by child classes
    //Defines the validation rules for this model
    abstract public function rules(): array;
    abstract public function labels(): array;

    //Gets all the fields of this model
    public function setFields() {
        $fields = [];
        foreach($this->rules() as $key => $value) {
            $fields[$key] = $this->$key;
        }
        return $fields;
    }

    //Load the data from a form to this model Object
    public function loadData($data) {
        $body = [];
        foreach($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->$key = $value;
                $body[$key] = $value;
            }
        }
        return $body;
    }

    public function addError($attribute, $errorType, $params = []) {
        $message = $this->errorMessages()[$errorType] ?? '';
        $message = str_replace('{attribute}', $this->labels()[$attribute], $message);

        foreach($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        $this->errors[$attribute][] = $message;
    }

    //Validate all input based on the rules for this model
    public function validate() {
        foreach($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach($rules as $rule) {
                $ruleName = $rule;
                if(!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                //Make real validations
                if($ruleName === self::RULE_EMAIL and !filter_var($value, FILTER_SANITIZE_EMAIL)){
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                else if($ruleName === self::RULE_EMAIL and !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }

                if($ruleName === self::RULE_MIN and strlen($value) < strlen($rule['min'])) {
                    $this->addError($attribute, self::RULE_MIN, $rule);
                }

                if($ruleName === self::RULE_MAX and strlen($value) > strlen($rule['max'])) {
                    $this->addError($attribute, self::RULE_MAX, $rule);
                }

                if($ruleName === self::RULE_MATCH and $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
                if($ruleName === self::RULE_NUMBER and preg_match('/[^0-9]/', $value)) {
                    $this->addError($attribute, self::RULE_NUMBER);
                }
                if($ruleName === self::RULE_REQUIRED and !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                } 

            }
        }
        return empty($this->errors);
    }

    public function errorMessages() {
        return [
            self::RULE_REQUIRED => '{attribute} is required',
            self::RULE_EMAIL => '{attribute} must be a valid email',
            self::RULE_MIN => 'Minimum length of {attribute} must be {min}',
            self::RULE_MAX => 'Maximum length of {attribute} must be {max}',
            self::RULE_MATCH => '{attribute} must be the same as {match}',
            self::RULE_NUMBER => '{attribute} must be a valid phone number'
        ];
    }

    public function trimModel() {
        $f = get_object_vars($this);
        unset($f['form_name']);
        unset($f['new_cat_id']);
        unset($f['new_prod_flavor']);
        unset($f['errors']);
        unset($f['prod_id']);
        
        return $f;
    }
    
}