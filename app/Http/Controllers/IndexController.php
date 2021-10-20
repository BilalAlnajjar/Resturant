<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\App;
use App\Models\Cart;
use App\Models\Slid;
use App\Models\Step;
use App\Models\Offer;
use App\Models\Video;
use App\Models\SlidWeb;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\DisplayEditor;

class IndexController extends Controller
{
    public function index()
    {

        $slids = SlidWeb::get();
        $categories = Category::get();
        $offers = Offer::inRandomOrder()->limit(4)->get();
        $video  = Video::get()->last();
        $steps = Step::get();
        $item = DisplayEditor::first();
        $items = DisplayEditor::get();

        $sectionOne = null;
        try{
            $sectionOne = $items[1];
        }catch(Exception $e){
            $sectionOne = null;
        }

        $sectionTwo = null;
        try{
            $sectionTwo = $items[2];
        }catch(Exception $e){
            $sectionTwo = null;
        }

        return view('index', [
            'slids' => $slids,
            'categories' => $categories,
            'offers' => $offers,
            'video' => $video,
            'steps' => $steps,
            'item' => $item,
            'sectionOne' => $sectionOne,
            'sectionTwo' => $sectionTwo,

        ]);
    }

    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
