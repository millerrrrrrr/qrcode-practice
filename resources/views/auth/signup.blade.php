<!DOCTYPE html>
<html lang="en" data-theme="nord">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center">
  


    <form action=" {{ route('signupPost') }} " method="POST">

        @csrf

        <div class="card w-full max-w-3xl shadow-2xl bg-base-100 p-6">
            <div class="py-6">
                <h2 class="text-3xl font-bold text-center">Sign Up</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Side -->
                <div class="space-y-4">
                    <!-- Name -->
                    <div>
                        <label for="name" class="font-semibold">Name</label>
                        <input type="text" id="name" name="name"
                            class="input outline-none focus:outline-none w-full" 
                            value="{{ old('name') }}">
                    </div>

                    <!-- Birth Date -->
                    <div>
                        <label for="birthdate" class="font-semibold">Birth Date</label>
                        <input type="date" id="birthdate" name="birthdate"
                            class="input outline-none focus:outline-none w-full"
                            value="{{ old('birthdate', '') }}">
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age" class="font-semibold">Age</label>
                        <input type="text" id="age" name="age" readonly disabled
                            class="input outline-none focus:outline-none w-full"
                            value=" {{ old('age') }} ">
                        <input type="hidden" id="hidden-age" name="age"
                             value=" {{ old('hidden-age') }} ">

                    </div>

                    <!-- Gender -->
                    <div>
                        <label for="gender" class="font-semibold">Gender</label>
                        <select id="gender" name="gender" class="select w-full">
                            <option value="" disabled selected>Select gender</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : ''}}>Male</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : ''}}>Female</option>
                        </select>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="space-y-4">
                    <!-- Account ID -->
                    <div>
                        <label for="accid" class="font-semibold">Acc Id</label>
                        <input type="text" id="accid" name="accid" readonly disabled
                            class="input outline-none focus:outline-none w-full"
                            value=" {{ old('accid') }} ">
                        <input type="hidden" id="hidden-accid" name="accid"
                         value=" {{ old('hidden-accid') }} ">

                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="font-semibold">Username</label>
                        <input type="text" id="username" name="username"
                            class="input outline-none focus:outline-none w-full"
                            value=" {{ old('username') }} ">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="font-semibold">Password</label>
                        <input type="password" id="password" name="password"
                            class="input outline-none focus:outline-none w-full" 
                            >
                    </div>

                    <!-- Role -->
                    {{-- <div>
                        <label for="role" class="font-semibold">Role</label>
                        <select id="role" name="role" class="select w-full" disabled>
                            <option value="" disabled>Select role</option>
                            <option value="admin">Admin</option>
                            <option value="user" selected>User</option>
                        </select>
                    </div> --}}
                    <div>
                        <input type="text" class="input" name="role" value="user" hidden
                        value=" {{ old('role') }} ">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button class="btn btn-neutral w-full rounded-2xl">Sign Up</button>
            </div>
    </form>
    </div>

    <!-- Scripts -->
    <script>
        document.getElementById('birthdate').addEventListener('change', function() {
            let birthdate = new Date(this.value);
            let today = new Date();
            let age = today.getFullYear() - birthdate.getFullYear();
            let m = today.getMonth() - birthdate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
                age--;
            }
            document.getElementById('age').value = age;
            document.getElementById('hidden-age').value = age;
        });

        function generateAccid() {
            let randomNum = Math.floor(1000 + Math.random() * 9000);
            return `acc-${randomNum}`;
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('accid').value = generateAccid();
            document.getElementById('hidden-accid').value = generateAccid();
        });
    </script>

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

            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'warning',
                    title: @json($error)
                });
            @endforeach

        });
    </script>

</body>

</html>
