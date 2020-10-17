<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getGomePage()
    {
        $title = 'HOME';
        return view('content-page')
            ->with('test_title', $title)
            ->with('color', "green")
            ->with('text', "This is home page from content-page component")
            ->with('show_button', true);
    }

    public function getContactPage()
    {
        $title = 'CONTACT';

        return view('content-page')
            ->with('test_title', $title)
            ->with('color', "red")
            ->with('text', "This is contact page from content-page component")
            ->with('show_button', true);
    }

    public function getAboutPage()
    {
        $title = 'ABOUT';

        return view('content-page')
            ->with('test_title', $title)
            ->with('color', "blue")
            ->with('text', "This is about page from content-page component")
            ->with('show_button', false);
    }
}
