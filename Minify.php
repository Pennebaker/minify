<?php
namespace craft\plugins\minify;

use craft\plugins\minify\twigextensions\MinifyTwigExtension;

/**
 * Class Minify
 */
class Minify extends \craft\app\base\Plugin
{

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via Minify::$plugin
     * @var craft\plugins\minify\Minify
     */
    public static $plugin;

    /**
     * Set our $plugin static property to this class so that it can be accessed via Minify::$plugin
     * @param array $config [description]
     */
    public function __construct($id, $parent = null, $config = [])
    {
        static::$plugin = $this;
        static::setInstance($this);

        parent::__construct($id, $parent, $config);
    }

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
