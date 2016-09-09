<?php
namespace craft\plugins\minify\twigextensions;

use craft\plugins\minify\Minify;

/**
 * Class Minify_Node
 */
class Minify_Node extends \Twig_Node
{
    // Properties
    // =========================================================================


    // Public Methods
    // =========================================================================

    /**
     * @param \Twig_Compiler $compiler
     *
     * @return null
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $html = $this->getAttribute('html');
        $css = $this->getAttribute('css');
        $js = $this->getAttribute('js');

        $compiler
            ->addDebugInfo($this);

        $compiler
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$_compiledBody = ob_get_clean();\n");

        if ($html)
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->htmlMin(\$_compiledBody);\n");
        }
        elseif ($css)
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->cssMin(\$_compiledBody);\n");
        }
        elseif ($js)
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->jsMin(\$_compiledBody);\n");
        }
        else
        {
            $compiler
                ->write("echo " . Minify::className() . "::\$plugin->minify->minify(\$_compiledBody);\n");
        }

    }
}
