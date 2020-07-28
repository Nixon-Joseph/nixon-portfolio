<?php
class ContactController extends Controller {
    function Index () {
        $result = ContactHelper::validateReCAPTCHA(REQUEST_POST['g-recaptcha-response'], RECAPTCHA_SECRET);
        if ($result->success === true) {
            // send the email
            TempData::set("ContactSuccess", "Success!");
        } else {
            TempData::set("ContactName", REQUEST_POST["Name"]);
            TempData::set("ContactEmail", REQUEST_POST["Email"]);
            TempData::set("ContactComments", REQUEST_POST["Comments"]);
            TempData::set("ContactFailure", "reCAPTCHA check failed. Please try again.");
        }
        $this->redirect($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : '/');
    }
}
?>