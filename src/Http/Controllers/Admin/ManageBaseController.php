<?php

namespace bachphuc\LaravelArticle\Http\Controllers\Admin;

use HtmlElements\ManageBaseController as BaseController;
use LaravelTheme;

class ManageBaseController extends BaseController{
    protected $colorTheme = 'white';

    public function getMenus(){
        $this->menus = LaravelTheme::getAdminMenus();

        return $this->menus;
    }
}