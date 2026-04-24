<?php

namespace App\Core;

class Validator
{
    public const MAX_TITLE_LENGTH = 10;
    public const MAX_CONTENT_LENGTH = 20;

    public function validate($data)
    {
        $errors = [];

        //空白と文字数チェック(title)
        if (empty($data['title'])) {
            $errors['title'] = "Please enter the title.";
        } elseif (mb_strlen($data['title']) > self::MAX_TITLE_LENGTH) {
            $errors['title'] = "Please enter the title within " . self::MAX_TITLE_LENGTH . " letters.";
        }

        //空白と文字数チェック(content)
        if (empty($data['content'])) {
            $errors['content'] = "Please enter the content.";
        } elseif (mb_strlen($data['content']) > self::MAX_CONTENT_LENGTH) {
            $errors['content'] = "Please enter the content within " . self::MAX_CONTENT_LENGTH ." letters.";
        }

        return $errors;

    }
}
