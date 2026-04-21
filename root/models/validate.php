<?php

class Validator
{
    public const MAX_TITLE_LENGTH = 20;
    public const MAX_CONTENT_LENGTH = 50;

    public function validate($data)
    {
        $errors = [];

        //空白チェック(title)
        if (empty($data['title'])) {
            $errors['title'] = "Please enter the title.";
        } elseif (mb_strlen($data['title']) > self::MAX_TITLE_LENGTH) {
            $errors['title'] = "Please enter the title within 20 letters.";
        }

        //空白チェック(content)
        if (empty($data['content'])) {
            $errors['content'] = "Please enter the content.";
        } elseif (mb_strlen($data['content']) > self::MAX_CONTENT_LENGTH) {
            $errors['content'] = "Please enter the content within 50 letters.";
        }

        return $errors;

    }
}
