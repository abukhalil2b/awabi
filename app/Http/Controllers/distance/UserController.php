<?php

namespace App\Http\Controllers\distance;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Whatsapp;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function search(Request $request)
    {

        $users = [];

        if ($request->phone) {

            $phones = explode("\r\n", $request->phone);
            // return $phones;
            $users =  User::whereIn('phone', $phones)
                ->whereNotIn('phone', [1, 2, 3])
                ->get();
        }

        return view('admin.distance.user.search', compact('users'));
    }

    public function create()
    {
        return view('admin.distance.user.create');
    }


    public function show($id)
    {
        $user = User::where(['app' => 'distance', 'id' => $id])
            ->select('id', 'app', 'name', 'state_id', 'phone', 'plain_password')
            ->firstOrFail();

        return view('admin.distance.user.show', compact('user'));
    }

    public function updateduserIndex()
    {

        $updatedUsers = User::where('app', 'distance')
            ->whereNotNull('state_id')
            ->get();

        return view('admin.distance.user.updateduser_index', compact('updatedUsers'));
    }

    public function notupdateduserIndex()
    {
        $notUpdatedUsers = User::where('app', 'distance')
            ->whereNull('state_id')
            ->get();

        $whatsappText = '';

        $whatsapp = Whatsapp::first();

        if ($whatsapp) {

            $whatsappText = $whatsapp->text;

        }

        return view('admin.distance.user.notupdateduser_index', compact('notUpdatedUsers','whatsappText'));
    }
}
