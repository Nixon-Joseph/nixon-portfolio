<?php
class HomeController extends Controller {
    function Index () {
        $this->outputCache("home_index", 3600, function () {
            return $this->getView(null, ACTION_NAME, "_layoutHome", SITE_DATA);
        });
    }
}
?>