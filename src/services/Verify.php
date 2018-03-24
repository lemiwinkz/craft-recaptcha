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

use aberkie\recaptcha\Recaptcha;

use Craft;
use craft\base\Component;
use GuzzleHttp\Client;
class Verify extends Component
{
    // Public Methods
    // =========================================================================

    // TODO : VERIFY SERVICE

    public function verify($data) : bool
    {
        // Cache some stuff
        $base = "https://www.google.com/recaptcha/api/siteverify";
        $settings = Recaptcha::$plugin->getSettings();

        // Setup guzzle
        $client = new Client();
        $response = $client->post($base, [
                'secret' =>  $settings->secretKey,
                'response' => $data
        ]);

        // Error handling and return'ing
        if($response->getStatusCode() == 200) {
            $jsonReturn = json_decode($response->getBody(), true);
            if ($jsonReturn['success']) {
                die('hey');
                return true;
            }
            die(print_r($jsonReturn));
        }

        die('24');
        return false;

    }

}
