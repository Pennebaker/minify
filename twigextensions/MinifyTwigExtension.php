<?php
namespace craft\plugins\minify\twigextensions;

use craft\plugins\minify\twigextensions\Minify_TokenParser;

/**
 * Class MinifyTwigExtension
 */
class MinifyTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'minify';
    }

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
     */
    public function getTokenParsers()
    {
        return array(
            new Minify_TokenParser(),
        );
    }
}
