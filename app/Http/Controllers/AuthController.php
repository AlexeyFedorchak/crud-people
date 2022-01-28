<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * If user is authorized already, then it will be redirected to people dashboard index.
 */
class AuthController extends Controller
{
    /**
     * @return View|RedirectResponse
     */
    public function login()
    {
        if (auth()->check())
            return redirect()->to(route('people.index'));

        return view('login');
    }

    /**
     * @return View|RedirectResponse
     */
    public function register()
    {
        if (auth()->check())
            return redirect()->to(route('people.index'));

        return view('register');
    }

    /**
     * @param LoginPostRequest $request
     * @return View|RedirectResponse
     */
    public function loginPost(LoginPostRequest $request)
    {
        if (auth()->check())
            return redirect()->to(route('people.index'));

        $user = User::whereEmail($request->email)
            ->wherePassword(md5($request->password))
            ->first();

        if (!$user)
            return view('login')
                ->withErrors(['password' => ['The password is incorrect!']]);;

        auth()->login($user);

        return redirect()->to(route('people.index'));
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->to(route('login'));
    }

    /**
     * @param RegisterPostRequest $request
     * @return RedirectResponse
     */
    public function registerPost(RegisterPostRequest $request)
    {
        if (auth()->check())
            return redirect()->to(route('people.index'));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password),
        ]);

        auth()->login($user);

        return redirect()->to(route('people.index'));
    }
}
