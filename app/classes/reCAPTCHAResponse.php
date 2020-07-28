<?php
class reCAPTCHAResponse {
    /**
     * true|false
     *
     * @var boolean
     */
    public $success;
    /**
     * timestamp of the challenge load (ISO format yyyy-MM-dd'T'HH:mm:sszz)
     *
     * @var string
     */
    public $challengeTs;
    /**
     * the hostname of the site where the reCAPTCHA was solved
     *
     * @var string
     */
    public $hostname;
    /**
     * optional
     *
     * @var array
     */
    public $errorCodes;
}
?>