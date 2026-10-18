
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Clinic Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">

    <main class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg">
        <h1 class="text-2xl font-bold text-slate-800 text-center">
            Create Your Account
        </h1>

        <p class="mt-2 mb-6 text-center text-sm text-slate-500">
            Register for Clinic Management
        </p>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 p-3 text-sm text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="mb-1 block text-sm font-medium text-slate-700">
                    Full Name
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="email" class="mb-1 block text-sm font-medium text-slate-700">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="username"
                    class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500"
                >
            </div>

            <div class="mb-4">
                <label for="password" class="mb-1 block text-sm font-medium text-slate-700">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500"
                >
            </div>

            <div class="mb-5">
                <label for="password_confirmation" class="mb-1 block text-sm font-medium text-slate-700">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500"
                >
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700"
            >
                Create Account
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:underline">
                Sign In
            </a>
        </p>
    </main>

</body>
</html>
