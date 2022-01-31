<?php
namespace App\Validators;
use GuzzleHttp\Client;
class ValidateMailgun
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $client = new Client;
        $response = $client->post('https://api.mailgun.net/v3/address/validate',
            [
                'auth' => [
                    'api',
                    config('services.mailgun.pvkey')
                ],
                'form_params' =>
                    [
                        'address' => $value,
                    ]
            ]
        );
        $status_code = $response->getStatusCode();
        $response = json_decode((string)$response->getBody());

        if (($response->is_valid && !$response->is_disposable_address) || $status_code != 200) {
            return true;
        }
        
        return false;
    }
}