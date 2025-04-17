<?php

namespace App\Http\Controllers\ViewController;

use TechnoCelebes\BasicController\MasterCont\ViewController;
use Illuminate\Http\Request;

class MasterPanelController extends ViewController
{
    public function __construct(Request $request){
    	parent::__construct($request);

		$data_css_st = array(
			'bootstrap/css/bootstrap.min.css','fontawesome/css/fontawesome.min.css',
			'fontawesome/css/solid.css','fontawesome/css/brands.css',
		);

		$data_css_nd=array(
			'assets/theme/panel/staradmin/vendors/feather/feather.css','assets/theme/panel/staradmin/vendors/mdi/css/materialdesignicons.min.css',
			'assets/theme/panel/staradmin/vendors/ti-icons/css/themify-icons.css','assets/theme/panel/staradmin/vendors/typicons/typicons.css',
			'assets/theme/panel/staradmin/vendors/simple-line-icons/css/simple-line-icons.css','assets/theme/panel/staradmin/vendors/css/vendor.bundle.base.css',
			'assets/theme/panel/staradmin/vendors/datatables.net-bs4/dataTables.bootstrap4.css','assets/theme/panel/staradmin/css/vertical-layout-light/style.css',
		);

		$this->set_css_data($data_css_st,"assets/vendor/");

		$this->combine_css($data_css_nd);

		$data_css_nd=array(
			'assets/custom/css/panel/master.css',
		);

		$this->combine_css($data_css_nd);

		$data_js_nd = array(
			'js/app.js',
			'assets/vendor/bootstrap5/js/bootstrap.bundle.min.js'
		);

		$data_js_rd = array(
			'assets/vendor/staradmin/js/jquery.cookie.js',
			'assets/vendor/staradmin/vendors/progressbar.js/progressbar.min.js','assets/vendor/staradmin/js/off-canvas.js',
			'assets/vendor/staradmin/js/hoverable-collapse.js',
			'assets/vendor/staradmin/js/settings.js','assets/vendor/staradmin/js/todolist.js',
			'assets/vendor/staradmin/js/dashboard.js'
		);

		$this->set_js_data($data_js_nd);
		$this->combine_js($data_js_rd);

        $this->set_data_send("body_class",array());

        $this->set_data_send("title","Skripsi FUAD");
    }
}
