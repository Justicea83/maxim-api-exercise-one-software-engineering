<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use ApiResponser;


    public function index()
    {
        return $this->showOne(User::all());
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(),JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user['password'] = bcrypt($request['password']);
        if ($request->has('has_fiancee'))
            $user['has_fiancee'] = $request['has_fiancee'];
        if ($request->has('nickname'))
            $user['nickname'] = $request['nickname'];
        if ($request->has('age'))
            $user['age'] = $request['age'];

        $createdUser = null;
        try{
           $createdUser= User::query()->create($user);
        }catch (Exception $e){
            return $this->errorResponse($e->getMessage(),JsonResponse::HTTP_BAD_REQUEST);
        }

        return $this->showOne(User::query()->find($createdUser->id));
    }

    public function show($id)
    {
        return $this->showOne(User::query()->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'unique:users,email,' . $id
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors()->first(),JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::query()->find($id);
        $user->update($request->all());

        return $this->showOne($user->refresh());
    }


    public function destroy($id)
    {
        try {
            $user = User::query()->find($id);
            if (isset($user)) {
                $user->delete();
            } else {
                return $this->errorResponse('User Not Found', JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
            }
        } catch (Exception $e) {
            return $this->errorResponse('User Not Found', JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->showOne([
            'message' => "user deleted successfully"
        ]);
    }
}
