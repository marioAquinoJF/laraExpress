<?php

namespace lara\Http\Controllers;

use lara\Http\Controllers\Controller;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Illuminate\Support\Facades\Auth::check()) {
            return redirect('/dashboard/posts');
        }

        return redirect('/');
    }

}
