<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.register') }}" class="auth__form">
        @csrf

        <!-- Name -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Name
            </span>
            <input id="name" class="input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @if ($errors->has('name'))
            <div class="mt-2 text-red-600">
                {{ $errors->first('name') }}
            </div>
            @endif
        </div>

        <!-- Email Address -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Email
            </span>
            <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
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
            <input id="password" class="input" type="password" name="password" required autocomplete="new-password">
            @if ($errors->has('password'))
            <div class="mt-2 text-red-600">
                {{ $errors->first('password') }}
            </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Confirm Password
            </span>
            <input id="password_confirmation" class="input" type="password" name="password_confirmation" required autocomplete="new-password">
            @if ($errors->has('password_confirmation'))
            <div class="mt-2 text-red-600">
                {{ $errors->first('password_confirmation') }}
            </div>
            @endif
        </div>

        <!-- Remember Me -->
        <label class="auth__form-field-check">
            <input id="remember_me" type="checkbox" class="input-check" name="remember">
            <span class="ms-2 text-sm text-gray-600">Remember me</span>
        </label>

        <div class="flex items-center justify-end mt-4">
            <button class="button ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>