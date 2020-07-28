<?php
class HomeController extends Controller {
    function Index () {
        $model = new HomeVM();
        $model->ContactComments = TempData::get("ContactComments");
        $model->ContactEmail = TempData::get("ContactEmail");
        $model->ContactName = TempData::get("ContactName");
        $model->ContactError = TempData::get("ContactFailure");
        $model->ContactSuccess = TempData::get("ContactSuccess");
        $this->scripts[] = '/public/scripts/home/home.js';
        $this->view($model, "index", "_layoutHome", SITE_DATA);
    }
}
?>