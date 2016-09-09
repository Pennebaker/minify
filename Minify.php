<?php
namespace craft\plugins\minify;

use craft\plugins\minify\twigextensions\MinifyTwigExtension;

/**
 * Class MinifyPlugin
 */
class Minify extends \craft\app\base\Plugin
{

    public static $plugin;

    // Public Methods
    // =========================================================================

    public function __construct($config = [])
    {
        Minify::$plugin = $this;
        parent::__construct($config);
    }

    public function init()
    {
        require_once __DIR__ . '/vendor/autoload.php';
    }

    public function addTwigExtension()
    {
        return new MinifyTwigExtension();
    }
}
