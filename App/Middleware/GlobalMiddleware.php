<?php

namespace App\Middleware;
use hisorange\BrowserDetect\Parser as Browser;

use App\Middleware\Contract\MiddlewareInterface;

class GlobalMiddleware implements MiddlewareInterface{
    public function handle(){
        $this->blockUSA();
        $this->blockChina();
        $this->sanitizeGetParams();
    }

    public function blockUSA(){

    }

    public function blockChina(){
        
    }

    public function sanitizeGetParams(){
        // foreach ($_GET as $key => $value) {
        //     $_GET[$key] = xss_clean($value);
        // }
    }
}
?>