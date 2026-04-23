<?php

use App\Http\Controllers\TodoController;

return [
    'GET /'                 =>    ['TodoController', 'list', 'list'],
    'GET /add'              =>    ['TodoController', 'create', 'add'],
    'POST /add'             =>    ['TodoController', 'add', null],
    'POST /edit'            =>    ['TodoController', 'update', null],
    'GET /edit'             =>    ['TodoController', 'get', 'edit'],
    'POST /delete'          =>    ['TodoController', 'delete', null],
    'GET /delete'           =>    ['TodoController', 'get', 'delete']
];
