<?php
/**
 * Recaptcha plugin for Craft CMS 3.x
 *
 * Craft3  plugin to dispaly Google's new reCaptcha form widget and validate responses.
 *
 * @link      https://github.com/aberkie
 * @copyright Copyright (c) 2018 Aaron Berkowitz
 */

namespace aberkie\recaptcha\assetbundles\Recaptcha;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * RecaptchaAsset AssetBundle
 *
 * @author    Aaron Berkowitz
 * @package   Recaptcha
 * @since     2.0.0
 */
class RecaptchaAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // Leave this here for future reference.
        $this->sourcePath = "@aberkie/recaptcha/assetbundles/recaptcha/dist";

        $this->depends = [
            CpAsset::class,
        ];

        // Register the Google recaptcha JS URL
        $this->js = [
            'https://www.google.com/recaptcha/api.js',
        ];


        parent::init();
    }
}
