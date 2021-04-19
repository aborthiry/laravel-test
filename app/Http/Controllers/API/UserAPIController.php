<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;


class UserAPIController extends Controller
{
    /**
     * Return all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(User::all(), 200);
    }


    /**
     * Store a newly created user.
     *
     * @param  App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {        
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    /**
     * Return the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(["message" => "User $id not found"], 404);
        }

        return response()->json($user, 200);
    }

    /**
     * Update the specified user.
     *
     * @param  App\Http\Requests\UserUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(["message" => "User $id not found"], 404);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    /**
     * Delete the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (is_null($user)) {
            return response()->json(["message" => "User $id not found, please try again"], 404);
        }
        
        $user->delete();
        return response()->json('', 204);
      

        
    }
}
