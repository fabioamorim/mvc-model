<?php

namespace App\Libs;

use Exception;

class Error 
{
    private $code;
    private $message;

    function __construct($e)
    {
        $this->code     = $e->getCode();
        $this->message  = $e->getMessage();
    }

    public function render()
    {
        $varMessage = $this->message;

        // Error code ..
    }
}