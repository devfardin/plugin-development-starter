<?php 

namespace Fardin\EleAddons\App\Traits;

trait Singletion {
    private static $instance;

    public static function instance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }
}