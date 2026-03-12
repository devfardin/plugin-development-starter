<?php
namespace Fardin\EleAddons\App\Widgets;

if (!defined("ABSPATH")) {
    exit;
}

class Base
{
    use \Fardin\EleAddons\App\Traits\Singletion;

    public function init()
    {
        add_action('elementor/widgets/register', [$this, "register_new_widgets"]);
    }
    public function register_new_widgets($widgets_manager) {
        $widgets_manager->register(BasicWidget::instance());
    }

}