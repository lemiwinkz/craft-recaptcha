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
use craft\helpers\UrlHelper;
use craft\web\Controller;
use craft\elements\User;
use yii\helpers\Url;


class ServiceController extends Controller
{


    protected $allowAnonymous = true;
    // Public Methods
    // =========================================================================


    public function actionSaveUser(){
        $this->requirePostRequest();
        $captcha = Craft::$app->request->post('g-recaptcha-response');
        $verified = Recaptcha::$plugin->verify->verify($captcha);

        if($verified){
            Craft::$app->runAction('users/save-user');
        }
        else{
            $user = new User();
            $user->addError('recaptcha', Craft::t('recaptcha', 'Failed recaptcha validation. '));

            $user->username = Craft::$app->request->post('username');
            $user->email = Craft::$app->request->post('email');

            Craft::$app->urlManager->setRouteParams([
                'account' => $user,
            ]);

        }

    }
}
