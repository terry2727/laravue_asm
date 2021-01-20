<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;
use Validator;

class AppUserController extends Controller
{
    // all app user
    public function index()
    {
        $posts = AppUser::all()->toArray();
        return array_reverse($posts);
    }

    // add app user
    public function add(Request $request)
    {
        $appuser = new AppUser([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phonenumber' => $request->input('phonenumber'),
        ]);
        $appuser->save();

        return response()->json('App user successfully added');
    }

    // edit app user
    public function edit($id)
    {
        $appuser = AppUser::find($id);
        return response()->json($appuser);
    }

    // update app user
    public function update($id, Request $request)
    {
        $appuser = AppUser::find($id);
        $appuser->update($request->all());

        return response()->json('App user successfully updated');
    }

    // delete app user
    public function delete($id)
    {
        $appuser = AppUser::find($id);
        $appuser->delete();

        return response()->json('App user successfully deleted');
    }
}
