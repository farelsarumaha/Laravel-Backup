<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function ProfileIndexController(Request $request, User $user)
    {
        //Counts total users
        $totalAdmin = User::where('title', 'Admin')->count();
        $totalOwner = User::where('title', 'Owner')->count();
        $totalMember = User::where('title', 'Member')->count();

        //Users list to latest and search
        $user = User::latest();
        if ($request->has('search')) {
            $user = User::where(
                'first_name',
                'LIKE',
                '%' . $request->search . '%'
            )
                ->OrWhere('last_name', 'LIKE', '%' . $request->search . '%')
                ->OrWhere('title', 'LIKE', '%' . $request->search . '%')
                ->get();
        } else {
            $user = User::all();
        }

        //Users paginate
        $user = User::paginate(10)->fragment('user');

        return view(
            'pages.admin.pages.users.index',
            compact('user', 'totalAdmin', 'totalOwner', 'totalMember')
        );
    }

    public function ProfileUpdateController(Request $request, User $user)
    {
        //Admin edit title users
        $user = User::find($user['id']);
        $user->title = $request->input('title');
        $user->save();

        return redirect()
            ->back()
            ->with('message', 'You have successfully changed the user title!');
    }

    public function ProfileDestroyController(User $user)
    {
        //Admin delete users
        $user = User::find($user['id']);
        $user->delete();
        return redirect()->back();
    }

    public function ProfileShowController(User $user)
    {
        //Show private profile
        return view('pages.profile', compact('user'));
    }

    public function UserUpdateProfileController(Request $request, User $user)
    {
        //Users edit data
        $user = User::find($user['id']);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->position = $request->input('position');
        $user->gender = $request->input('gender');
        $user->save();

        return redirect()
            ->back()
            ->with('message', 'You have successfully changed your profile!');
    }
}
