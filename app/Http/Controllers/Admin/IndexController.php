<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Home';
    }

    public function index()
    {
        return view('admin.index', $this->data);
    }
}
