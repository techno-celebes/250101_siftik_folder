<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferenceController extends ViewController
{
    public function visi_misi(Request $request)
    {
        return view('page.visi_misi');
    }
    public function renstra()
    {
        return view('page.renstra');
    }
    public function renop()
    {
        return view('page.ranop');
    }
    public function struktur()
    {
        return view('page.struktur');
    }
    public function sarana_prasarana()
    {
        return view('page.sarana_prasarana');
    }
    public function jurnal()
    {
        return view('page.jurnal');
    }
    
}
