<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = DB::table('blog_test.home_pages')
            ->where('title_en', 'LIKE', "%{$search}%")
            ->get();
        return view('admin.search.search',compact('results'));
    }
}
