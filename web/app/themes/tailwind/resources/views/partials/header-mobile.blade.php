<div x-show="showMobileMenu" x-transition x-transition.scale.origin.top.left.opacity  class="absolute top-0 inset-x-0 z-10 p-2 transition transform origin-top-right md:hidden" style="display:none;" @click.outside="showMobileMenu = false">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
        <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">
                <div>
                    <a href="{{ home_url() }}">
                    <img class="h-8 w-auto"
                    src="@option('site_logo_dark', 'url')"
                    alt="{{ get_bloginfo('name', 'display') }}">
                    </a>
                </div>
                <div class="-mr-2">
                    <button @click="showMobileMenu = false" type="button"
                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Close menu</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

                @hasoption('navigation_menu')
                    @options('navigation_menu')
                        @issub('enable_mega_menu', 'yes')
                            <div class="mt-6">
                                <nav class="grid gap-y-8">
                                    @hassub('add_submenu')
                                        @fields('add_submenu')
                                            <a href="@sub('submenu_url')" class="@sub('submenu_icon_type') -m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                                {!! file_get_contents($svgFolderPath . get_sub_field('submenu_icon_type') . ".svg") !!}
                                                <span class="ml-3 text-base font-medium text-gray-900">@sub('submenu_heading')</span>
                                            </a>
                                        @endfields
                                    @endsub
                                </nav>
                            </div>
                        @endsub
                    @endoptions
                @endoption
           
        </div>
        <div class="py-6 px-5 space-y-6">
            @hasoption('navigation_menu')
                <div class="grid grid-cols-1 gap-y-4 gap-x-8">
                    @options('navigation_menu')
                        @issub('enable_mega_menu', 'no')
                            @php
                                $isSameURI = str_replace('/', '', $_SERVER['REQUEST_URI']) == str_replace('/', '', get_sub_field('parent_menu_url'));
                            @endphp
                            <a href="@sub('parent_menu_url')" class="text-base font-medium text-gray-900 hover:text-gray-700" :class="{ 'text-primary-600': ({{ $isSameURI ? 'true' : 'false' }}) }">@sub('parent_menu_text')</a>
                        @endsub
                    @endoptions
                </div>
            @endoption
        </div>
    </div>
</div>
