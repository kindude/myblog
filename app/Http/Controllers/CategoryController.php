<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function store()
    {
        Str::lower(request()['slug']);

        $attributes = request() ->validate([
           'name' => ['required', Rule::unique('categories', 'name')],
           'slug' => ['required', Rule::unique('categories', 'slug')],
        ]);

        Category::create($attributes);

        return back();
    }
}
