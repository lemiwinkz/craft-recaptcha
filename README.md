# Google reCAPTCHA for Craft CMS
Craft plugin to dispaly Google's new reCaptcha form widget and validate responses.

## Install
// TODO: 

## Usage
### Templates
To display a reCAPTCHA widget in any template, use `{{craft.recaptcha.render()}}`.

### User Registration Form
To use the Recaptcha in a front-end [User Registration](TODO:) form, simply do this:

    <form method="post" accept-charset="UTF-8" >
        {{ getCsrfInput() }}
        <input type="hidden" name="action" value="recaptcha/service/saveUser">

...and assuming it passes Recaptcha validation, the user registration will be passed along to `users/saveUser`

### Verification
To verify a user's input, call the plugin's verify service from your own plugin:

    $captcha = craft()->request->getPost('g-recaptcha-response');
    $verified = Recaptcha::$plugin->verify->verify($captcha);
    if($verified)
    {
        //User is a person, not a robot. Go on and process the form!
    } else {
        //Uh oh...its a robot. Don't process this form!
    }

## Roadmap
Currently this only supports the standard reCAPTCHA widget, but I hope to add some capabilities to adjust the styling and functionality.
