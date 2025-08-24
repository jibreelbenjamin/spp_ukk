<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
    @vite('resources/js/app.js')
    <title>Masuk - SPP Online</title>
</head>
<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-md mt-7 bg-white border border-gray-200 rounded-xl shadow-xs">
        <div class="p-4 sm:p-7">
            <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800">Masuk</h1>
            <p class="mt-2 text-sm text-gray-600">
                Selamat datang di Aplikasi SPP Online.
            </p>
            </div>
    
            <div class="mt-10">
                <!-- Form -->
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="grid gap-y-4">
                    <!-- Form Group -->
                    <div>
                        <label class="block text-sm mb-2">Username</label>
                        <div class="relative">
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan username" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" autocomplete="off">
                        <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                            <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </div>
                        </div>
                    </div>
                    <!-- End Form Group -->
        
                    <!-- Form Group -->
                    <div class="max-w-sm">
                    <label class="block text-sm mb-2">Password</label>
                    <div class="relative">
                        <input id="hs-toggle-password" type="password" name="password" class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Masukan password">
                        <button type="button" data-hs-toggle-password='{
                            "target": "#hs-toggle-password"
                        }' class="absolute inset-y-0 end-0 flex items-center z-20 px-5 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                            <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                            <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                            <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
                            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                        </svg>
                        </button>
                    </div>
                    </div>
                    <!-- End Form Group -->
        
                    <button type="submit" class="mt-3 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Masuk</button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        </div>
    </div>
</body>
</html>

<x-toast type='errors-has'></x-toast>