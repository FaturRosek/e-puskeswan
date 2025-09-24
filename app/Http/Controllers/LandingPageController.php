<?php

namespace App\Http\Controllers;

use App\Models\Cms\News;
use App\Models\Setting\Announcement;
use App\Models\Setting\Beranda;
use App\Models\Setting\Contact;
use App\Models\Setting\Statistik;
use App\Models\Setting\VeterinaryProfile;
use Illuminate\Http\Request;
use App\Models\master\Puskeswan;

class LandingPageController extends Controller
{

    public function index()
    {
        $news = News::all();
        $beranda = Beranda::all();
        $profile = VeterinaryProfile::all();
        $puskeswans = Puskeswan::all();
        $pengumuman = Announcement::all();
        $contact = Contact::all();
        $statistik = Statistik::all();
        return view('pages.landing.index', compact('news', 'beranda', 'profile', 'puskeswans', 'pengumuman', 'contact', 'statistik'));
    }
}
