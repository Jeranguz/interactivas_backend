<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-200">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <a href="{{ route('admin.index') }}" class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TasKing Admin</a>

            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            @auth
            <h1 class="text-white">Welcome, {{ Auth::user()->name }}!</h1>
            <a class="text-white" href="{{ route('admin.logout') }}">Log out</a>
            @endauth

        </div>
    </nav>
    @yield('content')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            let image = document.getElementById('image');

            if (image != null) {
                image.addEventListener("change", function() {
                    console.log("change");
                    let fileName = this.value.toLowerCase();
                    if (!fileName.endsWith('.jpg') && !fileName.endsWith('.png')) {
                        alert('Please upload JPG or PNG file only.');
                        this.value = '';
                        return false;
                    } else {
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            let preview = document.getElementById('preview');
                            preview.setAttribute("src", e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }

                });
            }

        });
    </script>
</body>

</html>