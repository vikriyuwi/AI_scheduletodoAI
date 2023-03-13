<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use Carbon\Carbon;

class UserPagesController extends Controller
{
    public function index()
    {
        return view('UserPages.index');
    }
}
