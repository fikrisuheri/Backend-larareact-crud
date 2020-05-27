<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
    public function getAllPeople()
    {
        $data = People::all();

        return response()->json([
            'message' => 'Data Found',
            'results' => $data
        ]);
    }

    public function savePeople(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->toArray()
            ], 500);
        }

        $data = [
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'address' => $request->address,
            'avatar' => 'avatar.png',
        ];

        $save = People::create($data);

        if ($save) {
            return response()->json([
                'success' => true,
                'message' => 'Insert data success'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Insert data failed'
            ]);
        }
    }

    public function delete($id)
    {
        $people = People::find($id);

        $people->delete();

        if ($people) {
            return response()->json([
                'success' => true,
                'message' => 'Delete people success'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Delete people failed'
            ]);
        }
    }

    public function edit($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->toArray()
            ], 500);
        }

        $people = People::find($id);
        
        $people->name = $request->name;
        $people->gender = $request->gender;
        $people->age = $request->age;
        $people->address = $request->address;

        $update = $people->save();

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'Update people success'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Update people failed'
            ]);
        }
    }
}
