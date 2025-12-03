<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    public function index()
    {
        $users = User::all();
        $nonaktifCount = User::where('status', 'nonaktif')->count();

        return view('pages.admin.usermanage', compact('users', 'nonaktifCount'));
    }
    public function bulkAction(Request $request)
    {
        foreach ($request->input('actions', []) as $userId => $action) {
            $user = User::find($userId);
            if (!$user) continue;

            if ($action === 'delete') {
                $user->delete();
            } elseif ($action === 'aktif') {
                $user->status = 'aktif';
                $user->save();
            } elseif ($action === 'nonaktif') {
                $user->status = 'nonaktif';
                $user->save();
            } elseif ($action === 'admin') {
                $user->role = 'admin';
                $user->save();
            } elseif ($action === 'user') {
                $user->role = 'user';
                $user->save();
            }
        }
        return back()->with('status', 'User Berhasil Diperbarui.');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $users = User::where('name', 'like', "%$keyword%")
            ->orWhere('email', 'like', "%$keyword%")
            ->get();

        return response()->json($users);
    }
}
