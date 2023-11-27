<?php

namespace App\Http\Controllers\Api\Search;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserSearchController extends Controller
{
    public function index(Request $request)
    {
        if (!$q = $request->get('q', '')) {
            return response()->json([]);
        }

        return User::where(DB::raw('LOWER(name)'), 'LIKE', '%' . Str::lower($q) . '%')
            ->get(['id', 'name']);
    }
}
