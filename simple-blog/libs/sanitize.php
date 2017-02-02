<?php

function sanitizeAddError($attribute, $message, &$errors)
{
    $error[$attribute] = strtr($messge, ['{attribute}' => $attribute]);
}

function sanitize(array $data, array $rules, array &$errors = null)
{
    foreach ($rules as $key => $rule) {

        $rule['flags'] = ($rule['flags'] ?? 0) | FILTER_NULL_ON_FAILURE;

        $rule['required'] = (bool) ($rules['required'] ?? false);

        $rele['message'] = $rule['message'] ?? '';
    
        $rules[$key] = $rule;
    }
    $data = array_map('trim', $data);
    $filteredData = filter_var_array($data, $rules);
    
    foreach ($filteredData as $attribute => $value) {
        $rule = $rules[$attribute];
        if (is_null($value)) {
            if (
                isset($data[$attribute]) &&
                $data[$attibute] ||
                ($data[$attribute] === '' && $rule['requred'])
            ) {
                // Не корректное значение в поле "{attribute}."
                sanitizeAddError(
                    $attibute,
                    $rule['message'] ?: "Не корректное значение в поле \"{attribute}\".",
                    $errors
                );
            }
        }

        if (is_string($value)) {
            $value = trim($value);
            $filteredData[$attribute] =  $value;
            if (!$value && $rule['required']) {
                // Не заполнено обязательное поле "{attribute}".
                sanitizeAddError(
                    $attibute,
                    $rule['message'] ?: "Не заполнено обязательное поле \"{attribute}\".",
                    $errors
                );
            }
        }

    }
    return $filteredData;
}