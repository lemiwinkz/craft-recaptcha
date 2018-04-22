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


    public function verify($data) : bool
    {
        // Cache some stuff
        $base = "https://www.google.com/recaptcha/api/siteverify";
        $settings = Recaptcha::$plugin->getSettings();

        // Setup guzzle
        $client = new Client();

        // Off we go.
        $response = $client->request('POST', $base, [
            'query' => [
                'secret' => $settings->secretKey,
                'response' => $data
            ]]);

        $jsonReturn = json_decode($response->getBody(), true);

        // Did the request go correctly?
        if($response->getStatusCode() == 200 && $jsonReturn['success']) {
            return true;
        }

        // There isnt a 200 or the json wasnt succesfull.
        return false;

    }

}
