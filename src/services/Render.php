<?php
/**
 * Recaptcha plugin for Craft CMS 3.x
 *
 * Craft3  plugin to dispaly Google's new reCaptcha form widget and validate responses.
 *
 * @link      https://github.com/aberkie
 * @copyright Copyright (c) 2018 Aaron Berkowitz
 */

namespace aberkie\recaptcha\services;

use aberkie\recaptcha\assetbundles\Recaptcha\RecaptchaAsset;
use aberkie\recaptcha\Recaptcha;

use Craft;
use craft\base\Component;
use craft\web\View;

class Render extends Component
{

    /**
     * @return mixed
     */
    public function render($theme = 'light', $size = 'normal'){

        $settings = Recaptcha::$plugin->getSettings();

        // Setup the variables
        $templateVariables = [
            'id' => 'gRecaptchaContainer',
            'siteKey' => $settings->siteKey,
            'theme' => $theme,
            'size' => $size
        ];

        // Register the JS File
        Craft::$app->view->registerAssetBundle(RecaptchaAsset::class);

        // Render the template.
        $standardMode = Craft::$app->view->getTemplateMode();
        Craft::$app->view->setTemplateMode(view::TEMPLATE_MODE_CP);
        $html = Craft::$app->view->renderTemplate('recaptcha/frontend/recaptcha', $templateVariables);
        Craft::$app->view->setTemplateMode($standardMode);

        // Send it out
        echo $html;
    }
}
