<!DOCTYPE >
<html lang="en" data-theme="nord">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="min-h-screen flex items-center justify-center">
   

    <div class="card w-fullmax-w-md shadow-2xl bg-base-100 p-6">
        <div class=" py-6 ">
            <h2 class="text-3xl font-bold text-center">
                Sign In
            </h2>
        </div>
        <div>
            <div>
                <label for="username" class="font-semibold">Username</label>
                <input type="text" class="px-4 py-2 bg-[#f2f2f2] outline-none border-b-1  w-full" name="username">
            </div>
        </div>
        <div class="mt-4">
            <div>
                <label for="password" class="font-semibold">Password</label>
                <input type="text" class="px-4 py-2 bg-[#f2f2f2] outline-none border-b-1  w-full" name="password">
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-neutral w-full rounded-2xl">Sign in</button>
        </div>
        <div class="mt-4 flex justify-between">
            <a href="#" class="text-blue-600">Sign in using QrCode?</a>
            <a href=" {{ route('showSignup') }} " class="text-blue-600">Register?</a>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: @json(session('success'))
                })
            @endif

            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: @json(session('error'))
                })
            @endif

            @if (session('warning'))
                Toast.fire({
                    icon: 'warning',
                    title: @json(session('warning'))
                })
            @endif

            @if (session('info'))
                Toast.fire({
                    icon: 'info',
                    title: @json(session('info'))
                })
            @endif

            @if (session('question'))
                Toast.fire({
                    icon: 'question',
                    title: @json(session('question'))
                })
            @endif
        });
    </script>

</body>
</html>