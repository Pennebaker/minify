<?php
namespace craft\plugins\minify\services;

use Craft;
use craft\app\base\Component;

class MinifyService extends Component
{

    private static $shouldMinify = true;

    public function init()
    {
        $disableTemplateMinifying = craft()->config->get('disableTemplateMinifying');
        $disableDevmodeMinifying = craft()->config->get('disableDevmodeMinifying');

        if ($disableTemplateMinifying)
        {
            self::$shouldMinify = false;
        }

        if (craft()->config->get('devMode') && $disableDevmodeMinifying)
        {
            self::$shouldMinify = false;
        }
    }

/* --------------------------------------------------------------------------------
    Minify all the things
-------------------------------------------------------------------------------- */

    public static function minify($htmlText="")
    {
        if (self::$shouldMinify)
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

    public static function htmlMin($htmlText="")
    {
        if (self::$shouldMinify)
        {
            $htmlText = \Minify_HTML::minify($htmlText);
        }
        return $htmlText;
    } /* -- htmlMin */

/* --------------------------------------------------------------------------------
    Minify the passed in CSS
-------------------------------------------------------------------------------- */

    public static function cssMin($cssText="")
    {
        if (self::$shouldMinify)
        {
            $cssText = \Minify_CSSmin::minify($cssText);
        }
        return $cssText;
    } /* -- cssMin */

/* --------------------------------------------------------------------------------
    Minify the passed in JS
-------------------------------------------------------------------------------- */

    public static function jsMin($jsText="")
    {
        if (self::$shouldMinify)
        {
            $jsText = \JSMin\JSMin::minify($jsText);
        }
        return $jsText;
    } /* -- jsMin */

} /* -- MinifyService */
