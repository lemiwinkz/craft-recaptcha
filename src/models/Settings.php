<?php
/**
 * Recaptcha plugin for Craft CMS 3.x
 *
 * Craft3  plugin to dispaly Google's new reCaptcha form widget and validate responses.
 *
 * @link      https://github.com/aberkie
 * @copyright Copyright (c) 2018 Aaron Berkowitz
 */

namespace aberkie\recaptcha\models;

use aberkie\recaptcha\Recaptcha;

use Craft;
use craft\base\Model;


class Settings extends Model
{

    public $secretKey = 'Secret Key';
    public $siteKey = 'Site Key';


    public function rules()
    {
        return [
            ['secretKey', 'default'],
            ['siteKey', 'default'],
        ];
    }
}
