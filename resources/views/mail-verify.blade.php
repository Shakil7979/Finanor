@extends('layout')

@section('tailwind', true)

@section('title', 'Mail Verification')

@section('body')
    <div class="max-w-sm mx-auto my-12">
        <img class="h-[150px] mx-auto mb-0 sk_logo" src="/logo.png" alt="App Logo" />

        <div class="p-5 bg-white border rounded-md">

            {{-- Flash Success or Error Message --}}
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 text-sm text-red-600 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.verify') }}">
                @csrf
                <h2 class="text-xl font-semibold text-center mb-3 text-gray-800">Verify Your Email</h2>  
                 <p class="mb-3 text-sm text-gray-600">
                    We've sent a verification code to your email. Please enter the code below to verify your account.
                </p>

                <div class="mb-5">
                    <input type="hidden" name="email" value="{{ old('email') }}">
                    <label class="block mb-1 text-sm text-gray-700">Type the code</label>
                    <input
                        type="text"
                        name="code"
                        autocomplete="one-time-code"
                        aria-label="Verification Code"
                        class="w-full px-3 py-2 text-sm border rounded-md"
                    />
                    @include('partials.validation_error', ['payload' => 'code'])
                </div> 

                <button
                    type="submit"
                    class="w-full py-2.5 bg-primary-regular hover:bg-primary-dark transition text-sm text-white rounded-md"
                >
                    Verify
                </button>
            </form>
 
        </div>

        <div class="mt-4 text-center">
            <a class="text-sm transition text-primary-regular hover:text-primary-dark" href="{{ route('login') }}">
                Already using Budget? Log in.
            </a>
        </div>
    </div>
@endsection
