<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class DeviceController extends Controller
{
    // all devices
    public function index()
    {
        $devices = Device::all()->toArray();
        return array_reverse($devices);
    }

    // add device
    public function add(Request $request)
    {
        $device = new Device([
            'name' => $request->input('name'),
            'model' => $request->input('model'),
            'producer' => $request->input('producer'),
            'functions' => $request->input('functions'),
        ]);
        $device->save();

        return response()->json('Device successfully added');
    }

    // edit device
    public function edit($id)
    {
        $device = Device::find($id);
        return response()->json($device);
    }

    // update device
    public function update($id, Request $request)
    {
        $device = Device::find($id);
        $device->update($request->all());

        return response()->json('Device successfully updated');
    }

    // delete device
    public function delete($id)
    {
        $device = Device::find($id);
        $device->delete();

        return response()->json('Device successfully deleted');
    }
}
