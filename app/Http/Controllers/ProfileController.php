<?php

namespace App\Http\Controllers;

use App\Models\N49;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function N ($departmentNumber)
    {
        $nomClasse = "App\Models\N".$departmentNumber; 
        // Récupérer toutes les lignes de la table
        $donnees = $nomClasse::all();
                
        $total_2022 = 0;

        foreach ($donnees as $element) {
            for ($i = 8; $i >= 1; $i--) {
                $index = "_2022_" . sprintf("%02d", $i);
                if (isset($element[$index]) && is_numeric($element[$index])) {
                    $total_2022 += $element[$index];
                }
            }
        }

        // Passer les données à la vue
        return view('dashboard', ['donnees' => $donnees, 'total_2022' => $total_2022]);
    }
}
