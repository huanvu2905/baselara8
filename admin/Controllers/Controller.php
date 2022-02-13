<?php

namespace Admin\Controllers;

use App\Http\Controllers\Controller as AppController;

class Controller extends AppController
{
    /**
     * Registers middlewares
     */
    public function __construct()
    {
        //$this->middleware(['auth:admin']);
    }
}