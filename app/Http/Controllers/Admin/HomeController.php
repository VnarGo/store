<?php

namespace Store\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('admin_panel'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.home');
    }
}
