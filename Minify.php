<?php
namespace craft\plugins\minify;

use craft\plugins\minify\twigextensions\MinifyTwigExtension;

/**
 * Class MinifyPlugin
 */
class Minify extends \craft\app\base\Plugin
{

    /**
     * Initialize our plugin class; autoload any Composer-based vendor modules
     * @return [type] [description]
     */
    public function init()
    {
        parent::init();
        require_once __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Add in our Twig extensions
     */
    public function addTwigExtension()
    {
        return new MinifyTwigExtension();
    }
}
