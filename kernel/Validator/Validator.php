<?php

namespace App\Kernel\Validator;

use App\Kernel\Auth\IAuth;
use App\Kernel\Database\IDatabase;
use App\Kernel\Upload\IUploadedFile;

class Validator implements IValidator {

    private array $errors = [];
    private array $data;

    public function __construct(
        private IDatabase $database,
        private IAuth $auth
    ) {}

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
                if (mb_strlen($value) < $ruleValue && mb_strlen($value) > 0) return "Поле минимум должно состоять из $ruleValue символов";
                break;
            case 'max':
                if (mb_strlen($value) > $ruleValue) return "Поле максимум должно состоять из $ruleValue символов";
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) return "Поле должно содержать правильный email адрес";
                break;
            case 'unique':
                $existingRow = $this->database->first($ruleValue, [$key => $value]);
                if (!empty($existingRow) && $existingRow[$key] != $this->auth->user()->$key()) return "Уже существует";
                break;
            case 'passwordRepeat':
                if ($value !== $this->data['password']) return "Пароли не совпадают";
                break;
            case 'fileSize':                                      
                if (isset($value)) $sizeMb = $value->size / 1024 / 1024;    
                else $sizeMb = -1;
                if ($sizeMb > $ruleValue) return "Размер файла должен быть меньше $ruleValue мб";
                break;
        }

        return false;
    }

}