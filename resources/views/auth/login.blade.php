<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="auth__form">
        @csrf

        <!-- Username (name) -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Username
            </span>
            <input id="name" class="input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="username">
            @if ($errors->has('name'))
            <div class="mt-2 text-red-600">
                {{ $errors->first('name') }}
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
            <button class="button">
                {{ __('Log in') }}
            </button>
        </div>
    </form>
</x-guest-layout>
