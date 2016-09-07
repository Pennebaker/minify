<?php
namespace craft\plugins\minify\services;

use Craft;
use craft\app\base\Component;

class MinifyService extends Component
{

    private $shouldMinify = true;

    public function init()
    {
        $disableTemplateMinifying = Craft::$app->config->get('disableTemplateMinifying');
        $disableDevmodeMinifying = Craft::$app->config->get('disableDevmodeMinifying');

        if ($disableTemplateMinifying)
        {
            $this->shouldMinify = false;
        }

        if (Craft::$app->config->get('devMode') && $disableDevmodeMinifying)
        {
            $this->shouldMinify = false;
        }
    }

/* --------------------------------------------------------------------------------
    Minify all the things
-------------------------------------------------------------------------------- */

    public function minify($htmlText="")
    {
        if ($this->shouldMinify)
        {
            $options = array(
                'cssMinifier' => '\Minify_CSSmin::minify',
                'jsMinifier' => '\JSMin\JSMin::minify',
                );
            $htmlText = \Minify_HTML::minify($htmlText, $options);
        }
        return $htmlText;
    } /* -- minify */

/* --------------------------------------------------------------------------------
    Minify the passed in HTML
-------------------------------------------------------------------------------- */

    public function htmlMin($htmlText="")
    {
        if ($this->shouldMinify)
        {
            $htmlText = \Minify_HTML::minify($htmlText);
        }
        return $htmlText;
    } /* -- htmlMin */

/* --------------------------------------------------------------------------------
    Minify the passed in CSS
-------------------------------------------------------------------------------- */

    public function cssMin($cssText="")
    {
        if ($this->shouldMinify)
        {
            $cssText = \Minify_CSSmin::minify($cssText);
        }
        return $cssText;
    } /* -- cssMin */

/* --------------------------------------------------------------------------------
    Minify the passed in JS
-------------------------------------------------------------------------------- */

    public function jsMin($jsText="")
    {
        if ($this->shouldMinify)
        {
            $jsText = \JSMin\JSMin::minify($jsText);
        }
        return $jsText;
    } /* -- jsMin */

} /* -- MinifyService */
