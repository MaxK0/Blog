<?php

namespace App\Kernel\Validator;

class Validator {

    private array $errors = [];
    private array $data;

    public function validate(array $data, array $rules): bool {
        $this->errors = [];
        $this->data = $data;

        foreach ($rules as $key => $rule) {
            $rules = $rule;

            foreach ($rules as $rule) {
                $rule = explode(':', $rule);

                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $error = $this->validateRule($key, $ruleName, $ruleValue);
                
                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }

        return empty($this->errors);
    }

    public function errors(): array {
        return $this->errors;
    }

    private function validateRule(string $key, string $ruleName, string $ruleValue = null): string|bool {
        $value = $this->data[$key];
        
        switch ($ruleName) {
            case 'required':
                if (empty($value)) return "Поле обязательно";
                break;
            case 'min':
                if (mb_strlen($value) < $ruleValue) return "Поле минимум должно состоять из $ruleValue символов";
                break;
            case 'max':
                if (mb_strlen($value) > $ruleValue) return "Поле максимум должно состоять из $ruleValue символов";
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) return "Поле должно содержать правильный email адрес";
                break;
            case 'unique':
                $model = new $ruleValue();                
                if ($model->where($key, $value)->first()) return "Уже существует";
                break;
        }

        return false;
    }

}