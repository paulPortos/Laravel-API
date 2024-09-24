<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
       return Admin::all();
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
            'public' => 'required|boolean'
        ]);

        $admin = Admin::create($fields);
        return response()->json($admin, 201);
    }
    public function show(Admin $admin)
    {
       return $admin;
    }
    public function update(Request $request, Admin $admin)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
            'public' => 'required|boolean'
        ]);

        $updated = $admin -> update($fields);
        return response()->json($admin, 201);
    }
    public function destroy(Admin $admin)
    {
        $del = $admin -> delete();
        return response()->json([
            'message' => 'successfully deleted'
        ],201);
    }
}