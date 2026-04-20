<?php

class Validator
{
    public function validate($data)
    {
        $errors = [];

        //空白チェック(title)
        if (empty($data['title'])) {
            $errors['title'] = "Please enter the title.";
        } elseif (mb_strlen($data['title']) > 20) {
            $errors['title'] = "Please enter the title within 20 letters.";
        }

        //空白チェック(content)
        if (empty($data['content'])) {
            $errors['content'] = "Please enter the content.";
        } elseif (mb_strlen($data['content']) > 50) {
            $errors['content'] = "Please enter the content within 50 letters.";
        }

        return $errors;

    }
}
