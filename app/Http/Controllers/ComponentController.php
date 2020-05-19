<?php

namespace App\Http\Controllers;

use App\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComponentController extends Controller
{
    public function __construct() {
        return $this->middleware('auth')->Except(['show', 'index']);    
    }

    public function show(Component $component) {
        return view('components.show', compact('component'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'body' => 'required'
        ]);
        $request['slug'] = Str::slug($request->name, '-');
        $component = auth()->user()->components()->create($request->all());

        return $component;
    }

    public function create() {
        return view('components.create');
    }

    public function edit(Component $component) {
        return view('components.edit', compact('component'));
    }

    public function update(Component $component, Request $request) {
        $this->authorize('update', $component);

        $component->update(request()->validate([
            'name' => 'required',
            'body' => 'required',
            'description' => 'nullable'
        ]));

        return $component;
    }
}
