<?php
/**
 * Recaptcha plugin for Craft CMS 3.x
 *
 * Craft3  plugin to dispaly Google's new reCaptcha form widget and validate responses.
 *
 * @link      https://github.com/aberkie
 * @copyright Copyright (c) 2018 Aaron Berkowitz
 */

namespace aberkie\recaptcha\controllers;

use aberkie\recaptcha\Recaptcha;

use Craft;
use craft\web\Controller;
use craft\elements\User;

class ServiceController extends Controller
{


    protected $allowAnonymous = true;
    // Public Methods
    // =========================================================================

    // TODO : PORT C2 Controller to here

    public function actionSaveUser(){
        $this->requirePostRequest();
        $captcha = Craft::$app->request->post('g-recaptcha-response');
        $verified = Recaptcha::$plugin->verify->verify($captcha);
die('22');
        if($verified){
        }
            new User();
    }
}
