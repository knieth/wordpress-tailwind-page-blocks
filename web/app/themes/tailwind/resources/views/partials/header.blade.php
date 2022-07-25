@php
    $svgFolderPath = "app/themes/iation/resources/assets/images/svgs/";
@endphp

<div x-data="{ showMobileMenu: false, openMega: 0 }" class="relative bg-gray-50">
    <div class="relative bg-white shadow">
        @include('partials/header-mobile')

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6 md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{ home_url() }}">
                        <span class="sr-only">{{ get_bloginfo('name', 'display') }}</span>
                        <img class="h-8 w-auto sm:h-10"
                        src="@option('site_logo_dark', 'url')"
                        alt="{{ get_bloginfo('name', 'display') }}">
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <button @click="showMobileMenu = !showMobileMenu" type="button"
                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                        aria-expanded="false">
                        <span class="sr-only">Open menu</span>
                        <!-- Heroicon name: outline/menu -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                @hasoption('navigation_menu')
                    <nav class="hidden md:flex space-x-10">
                        @options('navigation_menu')
                            @issub('enable_mega_menu', 'yes')
                                @php
                                    $menuText = get_sub_field('parent_menu_text');
                                @endphp
                                <div class="relative">
                                    <button @click="openMega = openMega == '{{ $menuText }}' ? '' : '{{ $menuText }}'" type="button"
                                        :class="{ 'text-primary-600': openMega == '{{ $menuText }}', 'text-gray-500': !(openMega == '{{ $menuText }}') }"
                                        class="no-apply-button group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                                        aria-expanded="false">
                                        <span>@sub('parent_menu_text')</span>
                                        <svg class="ml-2 h-5 w-5 group-hover:text-gray-900"
                                            :class="{ 'text-primary-600': openMega == '{{ $menuText }}', 'text-gray-400': !(openMega == '{{ $menuText }}') }"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <div x-show="openMega == '{{ $menuText }}'" @click.outside="openMega = 0"
                                        x-transition:enter="transition ease-out duration-0"
                                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-0"
                                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                        class="absolute -ml-4 mt-3 transform z-10 px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
                                                @hassub('add_submenu')
                                                    @fields('add_submenu')
                                                        <a href="@sub('submenu_url')" class="@sub('submenu_icon_type') -m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                            {!! file_get_contents($svgFolderPath . get_sub_field('submenu_icon_type') . ".svg") !!}
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">@sub('submenu_heading')</p>
                                                                <p class="mt-1 text-sm text-gray-500">@sub('submenu_subheading')</p>
                                                            </div>
                                                        </a>
                                                    @endfields
                                                @endsub
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else

                            @php
                                $isSameURI = str_replace('/', '', $_SERVER['REQUEST_URI']) == str_replace('/', '', get_sub_field('parent_menu_url'));
                            @endphp

                                <a href="@sub('parent_menu_url')" class="text-base font-medium text-gray-500 hover:text-gray-900 inline-flex items-center" :class="{ 'text-primary-600': ({{ $isSameURI ? 'true' : 'false' }}) }">
                                    @sub('parent_menu_text')
                                </a>
                            @endsub
                        @endoptions
                    </nav>
                @endoption
            </div>
        </div>
    </div>
</div>
