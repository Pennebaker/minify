<?php
namespace craft\plugins\minify;

use craft\plugins\minify\twigextensions\MinifyTwigExtension;

/**
 * Class MinifyPlugin
 */
class Plugin extends \craft\app\base\Plugin
{

    // Public Methods
    // =========================================================================

    public function init()
    {
        require_once __DIR__ . '/vendor/autoload.php';
    }

    public function addTwigExtension()
    {
        return new MinifyTwigExtension();
    }
}
