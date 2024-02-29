<?php

/**
 * Pico number_format "short" plugin.
 *
 * PicoNumberFormatShort add a filter for the Twig Template Engine. This plugin
 * format a value in an easy human readable number. Just use this filter with
 * your value or var {{ varnumber|format_short }} inside your tpl.
 *
 * @author  Giovanni Forte <giovanni@teamvodka.eu>
 * @link    https://teamvodka.eu
 * @license https://opensource.org/licenses/MIT The MIT License
 * @version 0.1
 */
class PicoNumberFormatShort extends AbstractPicoPlugin
{
    const API_VERSION = 3;
    protected $enabled = true;
    protected $dependsOn = array();
     
    public function onTwigRegistered(Twig_Environment &$twig)
    {
        $twig->addFilter(new Twig_SimpleFilter('format_short', function($number) {
            return $this->numberFormat($number);
        }));
    }
      
    private function numberFormat($number)
    {
        if (!is_numeric($number)) {
            return $number;
        }
        $magnitudes = array('', 'K', 'M', 'B', 'T');
        $magnitude = floor(log10($number) / 3);
        $suffix = $magnitudes[$magnitude % count($magnitudes)];
        // Conditional decimal places based on magnitude
        $decimals = $number < 99999 && $number > 999 ? 1 : 0;
        if ($number > 10000) {           
            $formattedNumber = number_format (floor ($number / pow(10, $magnitude * 3)), $decimals) + 0;
            $cNumber = floor(($number / 1000)) * 1000;
        } elseif ($number > 1000) {
            $formattedNumber = floor($number / pow(10, $magnitude * 2))/10 + 0;
            $cNumber = $formattedNumber * 1000;
        } else {
            $cNumber = $formattedNumber = $number;
        }
        $plus_sign = $cNumber < $number ? '+' : '';
        return $formattedNumber . $suffix . $plus_sign;
    }
}
