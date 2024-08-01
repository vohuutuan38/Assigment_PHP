<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Danh sách người sử dụng';
        $data = User::withTrashed()
            ->orderBy('id')
            ->get();
        // dd($data);
        return view('admins.user.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Thêm admin cho hệ thống ';
        return view('admins.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $params['password'] = Hash::make($params['password']);
            $params['role'] = 'Admin';
            User::create($params);
            return redirect()->route('admins.user.index')->with('success', 'Thêm user thành công');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Chỉnh sửa người dùng ';

        $data = User::withTrashed()->findOrFail($id);

        return view('admins.user.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');


            $danhMuc = User::withTrashed()->findOrFail($id);

            $danhMuc->update($params);

            return redirect()->route('admins.user.index')->with('success', 'Cập nhật danh mục thành công');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $danhMuc = User::withTrashed()->find($id);
        $danhMuc->forcedelete();
        return redirect()->route('admins.user.index')->with('warning', 'Xóa danh mục thành công');
    }
}
