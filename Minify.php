<?php
namespace nystudio107\minify;

use Craft;
use nystudio107\minify\twigextensions\MinifyTwigExtension;

/**
 * Class Minify
 */
class Minify extends \craft\base\Plugin
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

        /**
         * Add in our Twig extensions
         */
        Craft::$app->view->twig->addExtension(new MinifyTwigExtension());
    }
}
