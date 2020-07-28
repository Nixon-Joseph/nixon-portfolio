<?php
class ContactHelper extends Helper {
    /**
     * Validates reCAPTCHA token
     *
     * @param string $token
     * @param string $secret
     * @return reCAPTCHAResponse|null
     */
    public static function validateReCAPTCHA(string $token, string $secret) : ?object {
        try {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = ['secret'  => $secret,
                    'response' => $token,
                    'remoteip' => $_SERVER['REMOTE_ADDR']];

            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data) 
                ]
            ];
        
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $mapper = new JsonMapper();
            return $mapper->map(json_decode($result), new reCAPTCHAResponse());
        } catch (Exception $ex) {

        }
    }
}
?>