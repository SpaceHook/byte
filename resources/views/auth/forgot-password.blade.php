<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="auth__form">
        @csrf

        <!-- Email Address -->
        <div class="auth__form-field">
            <span class="auth__form-field-name">
                Email
            </span>
            <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
            <div class="mt-2 text-red-600">
                {{ $errors->first('email') }}
            </div>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="button">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>
