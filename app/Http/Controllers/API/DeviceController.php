<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    // all devices
    public function index()
    {
        $user               =           Auth::user();
        if (!is_null($user)) {
            $devices          =           Device::all()->toArray();
            if (count($devices) > 0) {
                return response()->json(["status" => "success", "data" => $devices], 200);
            } else {
                return response()->json([
                    "status" => "failed", "count" => count($devices),
                    "message" => "Failed! no device found"
                ], 200);
            }
        }
    }

    // add device
    public function add(Request $request)
    {
        // $device = new Device([
        //     'name' => $request->input('name'),
        //     'model' => $request->input('model'),
        //     'producer' => $request->input('producer'),
        //     'functions' => $request->input('functions'),
        // ]);
        // $device->save();

        // return response()->json('Device successfully added');
        $user               =           Auth::user();

        if (!is_null($user)) {

            // create device
            $validator      =   Validator::make($request->all(), [
                "name"         =>      "required",
                "model"   =>      "required",
                "producer" => "required",
                "functions" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
            }

            $deviceInput              =       $request->all();

            $device           =       Device::create($deviceInput);
            if (!is_null($device)) {
                return response()->json(["status" => "success", "message" => "Success! Device created", "data" => $device]);
            } else {
                return response()->json(["status" => "failed", "message" => "Whoops! Device not created"]);
            }
        }
    }

    // edit device
    public function edit($id)
    {
        // $device = Device::find($id);
        // return response()->json($device);

        // $device = AppUser::find($id);
        // return response()->json($device);

        $user           =       Auth::user();
        if (!is_null($user)) {
            $device       =       Device::find($id);
            if (!is_null($device)) {
                return response()->json(["status" => "success", "data" => $device], 200);
            } else {
                return response()->json(["status" => "failed", "message" => "Failed! No device found"], 200);
            }
        } else {
            return response()->json(["status" => "failed", "message" => "Un-authorized user"], 403);
        }
    }

    // update device
    public function update($id, Request $request)
    {
        // $device = Device::find($id);
        // $device->update($request->all());

        // return response()->json('Device successfully updated');
        $input          =           $request->all();
        $user           =           Auth::user();

        if (!is_null($user)) {

            // validation
            $validator      =       Validator::make($request->all(), [
                "name"         =>      "required",
                "model"   =>      "required",
                "producer" => "required",
                "functions" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => "failed", "validation_errors" => $validator->errors()]);
            }
            $device = Device::find($id);
            // update post
            $update       =           $device->update($request->all());

            return response()->json(["status" => "success", "message" => "Success! Device updated", "data" => $device], 200);
        } else {
            return response()->json(["status" => "failed", "message" => "Un-authorized user"], 403);
        }
    }

    // delete device
    public function delete($id)
    {
        // $device = Device::find($id);
        // $device->delete();

        // return response()->json('Device successfully deleted');
        $user           =       Auth::user();

        if (!is_null($user)) {
            $device       =       Device::find($id)->delete();
            return response()->json(["status" => "success", "message" => "Success! Device deleted"], 200);
        } else {
            return response()->json(["status" => "failed", "message" => "Un-authorized user"], 403);
        }
    }
}
