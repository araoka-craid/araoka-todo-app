<?php

//XSS対策
class Sanitization
{
    public function sanitize($before)
    {
        foreach ($before as $key => $value) {
            //文字の変換
            $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $after;
    }
}
