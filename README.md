# Google reCAPTCHA for Craft CMS
Craft plugin to dispaly Google's new reCaptcha form widget and validate responses.

## Install
// TODO: Craft plugin store and packagist
// TODO: Determine license


## Usage
### Templates
To display a reCAPTCHA widget in any template, use `{{craft.recaptcha.render()}}`.

IMPORTANT: The JS file is loaded through crafts asset bundle. At the end of your template you will need to put `{{ endBody() }}`

### Theming

When rendering the reCAPTCHA using the above twig function you can enter two twig params that determine the size of the reCAPTCHA and the color. If you dont enter anything it will default to normal size with a white background. If you want a small reCAPTCHA with a black background do this: 

    {{craft.recaptcha.render('dark', 'compact')}}

Read https://developers.google.com/recaptcha/docs/display#render_param for all the styling options. 

### User Registration Form
To use the Recaptcha in a front-end [User Registration](TODO:) form, simply do this:

    <form method="post" accept-charset="UTF-8" >
        {{ csrfInput() }}
        <input type="hidden" name="action" value="recaptcha/service/save-user">

...and assuming it passes Recaptcha validation, the user registration will be passed along to `users/save-user`

### Verification
To verify a user's input, call the plugin's verify service from your own plugin:

    $captcha = Craft::$app->request->post('g-recaptcha-response');
    $verified = Recaptcha::$plugin->verify->verify($captcha);
    if($verified)
    {
        //User is a person, not a robot. Go on and process the form!
    } else {
        //Uh oh...its a robot. Don't process this form!
    }

## Roadmap
Currently this only supports the standard reCAPTCHA widget, but I hope to add some capabilities to adjust the functionality.
