<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:09 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\AccountDecorators\ChangePassword\ChangePasswordDecorator;
use App\Decorators\AccountDecorators\CreateAccount\CreateUserProxy;
use App\Decorators\AccountDecorators\Login\LoginDecorator;
use App\Http\Controllers\Requests\API\User\UserChangePasswordRequest;
use App\Http\Controllers\Requests\API\User\UserDeleteRequest;
use App\Http\Controllers\Requests\API\User\UserGetRequest;
use App\Http\Controllers\Requests\API\User\UserLoginRequest;
use App\Http\Controllers\Requests\API\User\UserLogoutRequest;
use App\Http\Controllers\Requests\API\User\UserPatchRequest;
use App\Http\Controllers\Requests\API\User\UserPostRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends APIController
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }

    public function get(UserGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(UserPostRequest $request)
    {
        //a hiep
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $userProxy = new CreateUserProxy($userService);


        $newUser = $userProxy->createNewModel($request->all());

        if ($newUser == null) {
            /**
             * @var Message $userProxy
             */
            return response(['Message' => $this->message($userProxy)], 403);
        }
        $request->session()->put('user_id', $newUser['id']);
        return response([
            'Message' => 'Register successfully',
            'User' => $newUser
        ], 200);

    }

    public function patch(UserPatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(UserDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function changePassword(UserChangePasswordRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $id = $request->get('id');
        $enhancedService = new ChangePasswordDecorator($userService);
        $changePasswordChecker = $enhancedService->updateModel($request->all(), $id);
        if ($changePasswordChecker == true) {
            return response(
                ['Message' => 'Change password successfully'],
                202
            );
        }
        return response(
            ['Message' => 'Invalid input old password'],
            403
        );
    }

    public function login(UserLoginRequest $request)
    {
        /**
         * @var UserService $userService
         */
        $userService = $this->getService();
        $enhancedService = new LoginDecorator($userService);

        $user = $enhancedService->getModel($request->all(), null);
        if ($user == null) {
            return response(['Invalid password'], 403);
        }
        $request->session()->put('user_id', $user['id']);
        $request->session()->put('name', $user['name']);
        $request->session()->put('role_id', $user['role_id']);
        return response([
            'Message' => 'Login successfully',
            'User' => $user,
            'Role' => $user['role']
        ], 200);

    }

    public function logout(UserLogoutRequest $request)
    {
        $userId = $request->get('user_id');
        $sessionUserId = $request->session()->get('user_id');

        if ($sessionUserId == null || strcasecmp($sessionUserId, $userId) != 0) {
            return response(['Invalid request'], 403);
        }

        $request->session()->flush();
        return response([
            'Message' => 'Logout successfully',
        ], 200);
    }

    public function getSessionData(Request $request) {
        $userId = $request->session()->get('user_id');
        if ($userId != null) {
            return response([
                'Message' => 'Success',
                'user_id' => $userId
            ], 200);
        }
        return response(['Message' => 'Invalid'], 403);;
    }

    public function all(UserGetRequest $request)
    {
        return parent::_all($request);
    }
}