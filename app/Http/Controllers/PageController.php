<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getHomePage()
    {
        $title = 'HOME';
        return view('content')
            ->with('title', $title)
            ->with('theme', "dark")
            ->with('footerText', "This is footer inside home")
            ->with('show_footer', true);
    }

    public function getOrderPage()
    {
        $title = 'ORDER';

        return view('content')
            ->with('title', '')
            ->with('theme', "light")
            ->with('footerText', "This is footer inside order")
            ->with('show_footer', true);
    }


    public function getAboutPage()
    {
        $title = 'ABOUT';

        return view('content')
            ->with('title', $title)
            ->with('theme', "dark")
            ->with('footerText', "This is footer inside about")
            ->with('show_footer', false);
    }
}
