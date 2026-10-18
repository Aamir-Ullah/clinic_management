
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Clinic Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 flex items-center justify-center p-4">

    <main class="w-full max-w-md rounded-2xl bg-white p-8 shadow-lg">
        <h1 class="text-2xl font-bold text-slate-800 text-center">
            Clinic Management
        </h1>

        <p class="mt-2 mb-6 text-center text-sm text-slate-500">
            Sign in to your account
        </p>

        @if (session('status'))
            <div class="mb-4 rounded-lg bg-green-100 p-3 text-sm text-green-700">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-100 p-3 text-sm text-red-700">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

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
                    autofocus
                    autocomplete="username"
                    placeholder="Please Enter Your Email Address"
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
                    autocomplete="current-password"
                    placeholder="Please Enter You Password"
                    class="w-full rounded-lg border border-slate-300 px-4 py-3 outline-none focus:border-blue-500"
                >
            </div>

            <label class="mb-5 flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1" class="rounded">
                Remember me
            </label>

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700"
            >
                Sign In
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-semibold text-blue-600 hover:underline">
                Register
            </a>
        </p>

        <p class="mt-3 text-center text-sm">
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                Forgot password?
            </a>
        </p>
    </main>

</body>
</html>
