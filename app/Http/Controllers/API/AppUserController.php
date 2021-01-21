<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AppUserController extends Controller
{
    // all app user
    public function index()
    {
        // $appusers = AppUser::all()->toArray();
        // return array_reverse($appusers);

        $user               =           Auth::user();
        if (!is_null($user)) {
            $appusers          =           AppUser::all()->toArray();
            if (count($appusers) > 0) {
                return response()->json(["status" => "success", "data" => $appusers], 200);
            } else {
                return response()->json(["status" => "failed", "count" => count($appusers), 
                "message" => "Failed! no app user found"], 200);
            }
        }
    }

    // add app user
    public function add(Request $request)
    {
        // $appuser = new AppUser([
        //     'name' => $request->input('name'),
        //     'address' => $request->input('address'),
        //     'phonenumber' => $request->input('phonenumber'),
        // ]);
        // $appuser->save();

        // return response()->json('App user successfully added');

        // check logged user
        $user               =           Auth::user();

        if (!is_null($user)) {

            // create task
            $validator      =   Validator::make($request->all(), [
                "name"         =>      "required",
                "address"   =>      "required",
                "phonenumber" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
            }

            $appuserInput              =       $request->all();

            $appuser           =       AppUser::create($appuserInput);
            if (!is_null($appuser)) {
                return response()->json(["status" => "success", "message" => "Success! App user created", "data" => $appuser]);
            } else {
                return response()->json(["status" => "failed", "message" => "Whoops! app user not created"]);
            }
        }
    }

    // edit app user
    public function edit($id)
    {
        // $appuser = AppUser::find($id);
        // return response()->json($appuser);

        $user           =       Auth::user();
        if (!is_null($user)) {
            $appuser       =       AppUser::find($id);
            if (!is_null($appuser)) {
                return response()->json(["status" => "success", "data" => $appuser], 200);
            } else {
                return response()->json(["status" => "failed", "message" => "Failed! no app user found"], 200);
            }
        } else {
            return response()->json(["status" => "failed", "message" => "Un-authorized user"], 403);
        }
    }

    // update app user
    public function update($id, Request $request)
    {
        // $appuser = AppUser::find($id);
        // $appuser->update($request->all());

        // return response()->json('App user successfully updated');

        $input          =           $request->all();
        $user           =           Auth::user();

        if (!is_null($user)) {

            // validation
            $validator      =       Validator::make($request->all(), [
                "name"         =>      "required",
                // "address"   =>      "required",
                // "phonenumber" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
            }
            $appuser = AppUser::find($id);
            // update post
            $update       =           $appuser->update($request->all());

            return response()->json(["status" => "success", "message" => "Success! app user updated", "data" => $appuser], 200);
        } else {
            return response()->json(["status" => "failed", "message" => "Un-authorized user"], 403);
        }
    }

    // delete app user
    public function delete($id)
    {
        // $appuser = AppUser::find($id);
        // $appuser->delete();

        // return response()->json('App user successfully deleted');

        $user           =       Auth::user();

        if (!is_null($user)) {
            $appuser       =       AppUser::find($id)->delete();
            return response()->json(["status" => "success", "message" => "Success! App user deleted"], 200);
        } else {
            return response()->json(["status" => "failed", "message" => "Un-authorized user"], 403);
        }
    }
}
