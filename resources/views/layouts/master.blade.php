<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        @media all {
            .page-break { display: none; }
        }

        @media print {
            .page-break { display: block; page-break-before: always; }
        }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-200">
@livewireScripts
<div class="h-screen flex overflow-hidden bg-gray-100" x-data="{sidebar:false}" x-cloak>
    @include('include.sidebar')
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="lg:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
            <button
                @click="sidebar=true"
                class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                <span class="sr-only">Open sidebar</span>
                <!-- Heroicon name: menu -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
