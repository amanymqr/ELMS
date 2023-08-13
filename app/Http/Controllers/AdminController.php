<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index()  {
    $totalEmployees = User::count();
    return view('LEMS.admin.index' , compact('totalEmployees'));
}
}
