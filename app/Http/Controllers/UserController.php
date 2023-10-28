<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Database\Query\Expression;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return response()->json(
            [
                'status' => 'success',
                'records' => $user
            ],
            200
        );
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return response()->json([
            'status' => 'success',
            'record' => $user,
        ], 200);
    }


    public function show($id)
    {
        $use = User::find($id);
        try {
            if (!empty($use)) {
                return response()->json([
                    'status' => 'success',
                    'record' => $use,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            if (User::where('id', $id)->exists()) {
                $user = User::find($id);
                $user->name = is_null($request->name) ? $user->name : $request->name;
                $user->email = is_link($request->email) ? $user->email : $request->email;
                $user->password = is_null($request->password) ? $user->password : $request->password;

                $user->save();

                return response()->json([
                    'status' => 'success',
                    'record' => $user,
                ], 200);
            } else {

                return response()->json([
                    'message' => 'Update user not found.',

                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            if (User::where('id', $id)->exists()) {
                $user = User::find($id);
                $user->delete();
                return response()->json([
                    'status' => 'success',
                    'record' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Delete not found.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
