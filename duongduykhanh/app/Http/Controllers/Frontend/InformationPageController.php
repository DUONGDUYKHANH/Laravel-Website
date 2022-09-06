<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class InformationPageController extends Controller
{
    public function show($id)
    {
        $data = Page::findOrFail($id);

        return view('frontend.pages.show', ['data' => $data]);
    }
}
