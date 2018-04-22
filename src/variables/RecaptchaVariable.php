<?php
/**
 * Recaptcha plugin for Craft CMS 3.x
 *
 * Craft3  plugin to dispaly Google's new reCaptcha form widget and validate responses.
 *
 * @link      https://github.com/aberkie
 * @copyright Copyright (c) 2018 Aaron Berkowitz
 */

namespace aberkie\recaptcha\variables;

use aberkie\recaptcha\Recaptcha;

use Craft;

class RecaptchaVariable
{

    public function render($theme = null, $size = null)
    {
        return Recaptcha::$plugin->render->render($theme, $size);
    }
}
