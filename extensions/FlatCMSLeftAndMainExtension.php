<?php

/**
 * Class FlatCMSLeftAndMainExtension
 */
class FlatCMSLeftAndMainExtension extends LeftAndMainExtension {

    /**
     * @var string
     */
    private static $cms_foreground_colour = '#ffffff';
    private static $cms_background_color = '#333333';
    private static $cms_success_color = '#1a9b51';
    private static $cms_error_color = '#c22730';

    /**
     * ─────────────────────────────▄██▄
     * ─────────────────────────────▀███
     * ────────────────────────────────█
     * ───────────────▄▄▄▄▄────────────█
     * ──────────────▀▄────▀▄──────────█
     * ──────────▄▀▀▀▄─█▄▄▄▄█▄▄─▄▀▀▀▄──█
     * ─────────█──▄──█────────█───▄─█─█
     * ─────────▀▄───▄▀────────▀▄───▄▀─█
     * ──────────█▀▀▀────────────▀▀▀─█─█
     * ──────────█───────────────────█─█
     * ▄▀▄▄▀▄────█──▄█▀█▀█▀█▀█▀█▄────█─█
     * █▒▒▒▒█────█──█████████████▄───█─█
     * █▒▒▒▒█────█──██████████████▄──█─█
     * █▒▒▒▒█────█───██████████████▄─█─█
     * █▒▒▒▒█────█────██████████████─█─█
     * █▒▒▒▒█────█───██████████████▀─█─█
     * █▒▒▒▒█───██───██████████████──█─█
     * ▀████▀──██▀█──█████████████▀──█▄█
     * ──██───██──▀█──█▄█▄█▄█▄█▄█▀──▄█▀
     * ──██──██────▀█─────────────▄▀▓█
     * ──██─██──────▀█▀▄▄▄▄▄▄▄▄▄▀▀▓▓▓█
     * ──████────────█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█
     * ──███─────────█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█
     * ──██──────────█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█
     * ──██──────────█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█
     * ──██─────────▐█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█
     * ──██────────▐█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█
     * ──██───────▐█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█▌
     * ──██──────▐█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█▌
     * ──██─────▐█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█▌
     * ──██────▐█▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓█▌
     * Override all of the things
     */

    public function init() {

        /* Radio & Check boxes */
        Requirements::customCSS(
            '.cms [type="radio"]:not(:checked) + label:after,' .
            '.cms [type="checkbox"]:checked + label .ui:after' .
            '{color:' . $this->owner->config()->cms_success_color . '!important;}' .
            '.cms [type="radio"]:checked + label:after,' .
            '.cms [type="checkbox"]:checked + label:after' .
            '{background:' . $this->owner->config()->cms_success_color . '!important;}'
        );

        /* Composite Fields */
        Requirements::customCSS(
            '.cms .togglecomposite' .
            '{color:' . $this->owner->config()->cms_success_color . ' !important;}' .
            '.cms .togglecomposite,' .
            '.cms .ui-accordion-header' .
            '{background:' . $this->owner->config()->cms_success_color . ' !important;}' .
            '.cms .togglecomposite,' .
            '.cms .ui-accordion .ui-accordion-content,' .
            '.cms .ui-accordion .ui-accordion-header' .
            '{border-color:' . $this->owner->config()->cms_success_color . ' !important;}'
        );

        /* Left Hand Menu */
        Requirements::customCSS(
            '.cms .cms-menu' .
            '{background:' . $this->owner->config()->cms_background_color . ' !important;}' .
            '.cms .cms-menu-list li a:hover,' .
            '.cms .cms-menu-list li.current a' .
            '{background:' . $this->owner->config()->cms_foreground_colour . '!important;}'

        );

        Requirements::css('./flat-cms/styles/css/flat-cms.css');


    }

    /**
     * @param string $hex
     * @param int $steps
     * @return String
     */
    public function adjustBrightness($hex, $steps) {
        $steps = max(- 255, min(255, $steps));
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
        }
        $color_parts = str_split($hex, 2);
        $return = '#';
        foreach ($color_parts as $color) {
            $color = hexdec($color);
            $color = max(0, min(255, $color + $steps));
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
        }
        return $return;
    }


}
