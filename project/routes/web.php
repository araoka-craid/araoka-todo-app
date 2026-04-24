<?php

return [
    'GET /'                 =>    ['TodoController', 'list', 'list'],
    'GET /add'              =>    ['TodoController', 'create', 'add'],
    'POST /add'             =>    ['TodoController', 'add', 'list'],
    'POST /edit'            =>    ['TodoController', 'update', 'list'],
    'GET /edit'             =>    ['TodoController', 'get', 'edit'],
    'POST /delete'          =>    ['TodoController', 'delete', 'list'],
    'GET /delete'           =>    ['TodoController', 'get', 'delete']
];
