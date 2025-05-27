<?php

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Actions\VerificationMailAction;
use App\Actions\StoreSpaceInSessionAction;
use App\Models\Currency;
use App\Models\User;
use App\Repositories\LoginAttemptRepository;
use App\Repositories\SpaceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function __construct(
        private readonly SpaceRepository $spaceRepository,
        private readonly LoginAttemptRepository $loginAttemptRepository
    ) {}

    public function index()
    {
        if (config('app.disable_registration')) {
            abort(404);
        }

        return view('register', [
            'currencies' => Currency::orderBy('name')->get()
        ]);
    }

    public function store(Request $request)
    {
        if (config('app.disable_registration')) {
            abort(404);
        }

        $validated = $request->validate(User::getValidationRulesForRegistration());

        // Store registration data in session
        session([
            'pending_registration' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'currency' => $request->currency,
            ]
        ]);

        // Send the email verification code
        (new VerificationMailAction())->sendCode($request->email);

        return redirect()->route('mail_verify')->with('status', 'We have sent a verification code to your email.');
    }

    public function mail_verify(Request $request)
    {
        return view('mail-verify');
    }

    public function verification_verify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'size:6'],
        ]);

        $pending = session('pending_registration');

        if (!$pending) {
            return redirect()->route('register')->with('error', 'No pending registration found.');
        }

        // Verify the code
        if (!(new VerificationMailAction())->verify($pending['email'], $request->code)) {
            return back()->with('error', 'Invalid or expired verification code.');
        }

        // Proceed with registration
        $user = (new CreateUserAction())->execute($pending['name'], $pending['email'], $pending['password']);
        $space = $this->spaceRepository->create($pending['currency'], $user->name . "'s Space");
        $user->spaces()->attach($space->id, ['role' => 'admin']);

        Auth::loginUsingId($user->id);
        (new StoreSpaceInSessionAction())->execute($space->id);
        $this->loginAttemptRepository->create($user->id, $request->ip(), false);

        session()->forget('pending_registration'); // cleanup

        return redirect()->route('dashboard');
    }
}
