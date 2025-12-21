<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'nim' => 'required|digits_between:1,50',
            'phone' => 'required|digits_between:1,20',
            'alamat' => 'required|string|max:255',
            'ktm' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB
        ]);

        $user = $request->user();

        $profile = $user->profile ?: new \App\Models\UserProfile(['user_id' => $user->id]);
        $profile->nim = $request->nim;
        $profile->phone = $request->phone;
        $profile->alamat = $request->alamat;

        // Handle upload KTM
        if ($request->hasFile('ktm')) {
            $ktmPath = $request->file('ktm')->store('ktm', 'public');
            $profile->ktm = $ktmPath;
        }

        // Handle upload Avatar
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatar', 'public');
            $profile->avatar = $avatarPath;
        }

        $profile->save();

        return back()->with('status', 'Akun Berhasil Diperbarui.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $user->delete();

        Auth::logout();

        return redirect('/')->with('status', 'Akun Berhasil Dihapus.');
    }
}
