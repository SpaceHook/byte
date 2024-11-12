<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth__form">
        @csrf
        <!-- Email Address -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Email
            </span>
            <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <div class="mt-2 text-red-600">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Password
            </span>

            <input id="password" class="input" type="password" name="password" required autocomplete="current-password">

            @if ($errors->has('password'))
                <div class="mt-2 text-red-600">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <label class="auth__form-field-check">
            <input id="remember_me" type="checkbox" class="input-check" name="remember">
            <span class="ms-2 text-sm text-gray-600">Remember me</span>
        </label>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button class="button">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
