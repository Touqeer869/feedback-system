@php
    $a_default = "text-gray-600 hover:bg-gray-50 hover:text-gray-900";
    $a_current = "bg-gray-100 text-gray-900";
    $svg_default = "text-gray-400 group-hover:text-gray-500";
    $svg_current = "text-gray-500";
@endphp

<nav class="mt-10 flex-1 px-2 bg-white space-y-1">

    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
    <a href="{{ route('dashboard') }}"
       class="{{ Request::segment(1)=='dashboard'? $a_current : $a_default }} group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-gray-100">
        <!-- Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500" -->
        <!-- Heroicon name: home -->
        <svg class="{{ Request::segment(1)=='dashboard'? $svg_current : $svg_default }} mr-3 h-6 w-6"
             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
    </a>

    <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
    <a href="{{ route('feedback.index') }}"
       class="{{ Request::segment(1)=='feedbacks'? $a_current : $a_default }} group flex items-center px-2 py-2 text-sm font-medium rounded-md hover:text-gray-900 hover:bg-gray-100">
        <!-- Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500" -->
        <!-- Heroicon name: home -->

        <svg class="{{ Request::segment(1)=='feedbacks'? $svg_current : $svg_default }} text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
            xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
        </svg>
        Feedbacks
    </a>



</nav>
