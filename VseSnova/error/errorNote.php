<?php

function register(array $data)
{
    $values = [
        $data['namePost'],
        $data['date_create'],
        $data['text']
    ];

    return insert($values);
}

function validate(array $request)
{
    $errors = [];

    if (!isset($request['namePost']) || strlen($request['namePost']) == 0) {
        $errors[]['namePost'] = 'Название записи не указано';
    } elseif (strlen($request['namePost']) < 4) {
        $errors[]['namePost'] = 'Название записи должно быть больше 4х символов';
    } elseif (isEmailAlreadyExists($request['namePost'])) {
        $errors[]['namePost'] = 'Название записи уже используется';
    }

    if (!isset($request['date_create']) || empty($request['date_create'])) {
        $errors[]['date_create'] = 'Дата не указана';
    }

    if (!isset($request['text']) || empty($request['text'])) {
        $errors[]['text'] = 'Текст не введен';
    }

    return $errors;
}

function isEmailAlreadyExists(string $email)
{
    if (getUserByEmail($email)) {
        return true;
    }

    return false;
}

