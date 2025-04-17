<?php

namespace App\Http\Controllers\ViewController\Home;

use App\Http\Controllers\ViewController\MasterPanelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends MasterPanelController
{
    public function __construct(Request $request){
        parent::__construct($request);
        $this->set_css_data(["assets/custom/css/home/home.css"],"");
    }

    public function home(Request $request){
        return view("welcome",$this->get_data_send());
    }

    public function visi_misi(Request $request){
        $this->set_css_data(["assets/custom/css/home/home.css","assets/custom/css/home/visimisi.css"],"");
        return view ("page/visi_misi",$this->get_data_send());
    }

    public function renstra_fuad(Request $request){
        return view ("page/renstra",$this->get_data_send());
    }

    public function renop_fuad(Request $request){
        return view ("page/renop",$this->get_data_send());
    }

    public function struktur_organisasi(Request $request){
        return view ("page/struktur_organisasi",$this->get_data_send());
    }

    public function sarpras(Request $request){
        return view ("page/sarpras",$this->get_data_send());
    }

    public function jurnal_ebi(Request $request){
        return view ("page/jurnal_ebi",$this->get_data_send());
    }

    public function jurnal_kps(Request $request){
        return view ("page/jurnal_kps",$this->get_data_send());
    }

    public function vimi_esy(Request $request){
        return view ("page/vimi_esy",$this->get_data_send());
    }

    public function vimi_psy(Request $request){
        return view ("page/vimi_psy",$this->get_data_send());
    }

    public function vimi_asy(Request $request){
        return view ("page/vimi_asy",$this->get_data_send());
    }

    public function prolus_esy(Request $request){
        return view ("page/prolus_esy",$this->get_data_send());
    }

    public function prolus_psy(Request $request){
        return view ("page/prolus_psy",$this->get_data_send());
    }

    public function prolus_asy(Request $request){
        return view ("page/prolus_asy",$this->get_data_send());
    }

    public function kurlum_esy(Request $request){
        return view ("page/kurlum_esy",$this->get_data_send());
    }

    public function kurlum_psy(Request $request){
        return view ("page/kurlum_psy",$this->get_data_send());
    }

    public function kurlum_asy(Request $request){
        return view ("page/kurlum_asy",$this->get_data_send());
    }

    public function audit(Request $request){
        return view ("page/audit",$this->get_data_send());
    }

    public function profile(Request $request){
        return view ("page/profile",$this->get_data_send());
    }

    public function about(Request $request){
        return view ("page/about",$this->get_data_send());
    }

    public function akreditas(Request $request){
        return view ("page/akreditas",$this->get_data_send());
    }

    public function non_akademik(Request $request){
        return view ("page/non_akademik",$this->get_data_send());
    }

    public function doped(Request $request){
        return view ("page/doped",$this->get_data_send());
    }

    public function cek_plagiasi(Request $request){
        return view ("page/plagiasi",$this->get_data_send());
    }

    public function blog(Request $request){
        return view ("page/blog",$this->get_data_send());
    }
}
