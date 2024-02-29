<!-- Static sidebar for desktop -->
<div class="hidden lg:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-white">

            <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                <div class="flex text-center px-20">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
                </div>
                <div x-data="{ open: false }" x-cloak @keydown.escape="open = false" @click.away="open = false"
                     class="px-2 mt-6 relative inline-block text-left">
                    <div x-description="Dropdown menu toggle, controlling the show/hide state of dropdown menu.">
                        <button @click="open = !open" type="button"
                                class="group w-full rounded-md  px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:outline-none "
                                id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                <span class="flex w-full justify-between items-center">
                  <span class="flex min-w-0 items-center justify-between space-x-2 ">
                   <span class="inline-block h-10 w-10 rounded-full overflow-hidden bg-gray-100">
                      <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                      </svg>
                   </span>
                    <span class="flex-1 min-w-0 pr-1 text-left">
                      <span
                          class="text-gray-900 text-sm font-medium truncate">{{ strtok(Auth::user()->name, " ")}}</span>
                      <span class="text-gray-500 text-xs truncate">{{ Auth::user()->email }}</span>
                    </span>
                  </span>
                  <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                       x-description="Heroicon name: selector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                       fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                  </svg>
                </span>
                        </button>
                    </div>
                    <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state."
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200"
                         role="menu" aria-orientation="vertical" aria-labelledby="options-menu" style="display: none;">


                            <a href="{{route('logout')}}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                               role="menuitem" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <span class="button">Logout</span>
                                <form id="logout-form" action="{{ route('logout') }}"
                                      method="POST" class="d-none">
                                    @csrf
                                </form>

                            </a>

                    </div>
                </div>
                @include('include.sidebar-links')
            </div>
        </div>
    </div>
</div>
