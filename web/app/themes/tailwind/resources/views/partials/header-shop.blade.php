<div x-data="{ showMenu: false, openSubMega: '' }">
    <div x-show="openSubMega" @click="openSubMega = false" class="fixed z-10 top-0 bottom-0 inset-x-0 bg-black bg-opacity-25"
        aria-hidden="true"
        x-transition:enter="transition ease-out duration-0"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-0"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        style="display:none;">
    </div>
    <header class="bg-gray-800 shadow relative z-20">
        <div @click.outside="openSubMega = ''">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 z-10">
            
                <div class="relative z-10 flex items-center lg:hidden py-2">
                    <!-- Mobile menu button -->
                    <div class="w-full flex justify-between items-center px-2">
                        <p class="text-lg font-bold leading-7 text-gray-300 sm:text-md sm:truncate m-0">
                            {{ $category->name }}
                        </p>
                        <button @click="showMenu = !showMenu" type="button" class="w-auto bg-gray-800 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white shadow-none" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <svg x-show="!showMenu" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg x-show="showMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true" style="display:none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <nav class="hidden lg:py-2 lg:flex lg:space-x-8" aria-label="Global">
                    @foreach ($fields as $field)
                        @php
                            $fieldNameSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $field['parent_menu_text']), '_'));
                        @endphp
                        @if ($field['enable_mega_menu'] == 'yes')
                            <a @click="openSubMega = openSubMega == '{{ $fieldNameSlug }}' ? '' : '{{ $fieldNameSlug }}'"
                                href="javascript: void(0);"
                                :class="{ 'bg-gray-900' : openSubMega == '{{ $fieldNameSlug }}', 'hover:bg-gray-700': openSubMega != '{{ $fieldNameSlug }}' }"
                                class="text-gray-300 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium"
                            >
                                {{ $field['parent_menu_text'] }}
                            </a>
                        @else
                            <a href="{{ $field['parent_menu_url'] }}"
                                class="text-gray-300 hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium"
                            >
                                {{ $field['parent_menu_text'] }}
                            </a>
                        @endif
                    @endforeach
                </nav>
                @foreach ($fields as $field)
                    @php
                        $fieldNameSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $field['parent_menu_text']), '_'));
                    @endphp
                    @if ($field['enable_mega_menu'] == 'yes')
                        <div x-show="openSubMega == '{{ $fieldNameSlug }}'" 
                            x-transition:enter="transition ease-out duration-0"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="absolute bg-white inset-x-0 lg:py-16 py-8 top-full shadow-lg" style="display: none;">
                            {{-- Mega menu only --}}
                            <div class="max-w-7xl mx-auto px-8 lg:grid lg:space-y-0 gap-x-8 gap-y-10 grid-cols-2 space-y-8">
                                <div class="gap-8 grid-cols-2 grid-rows-1 lg:grid text-sm">
                                    @if (isset($field['featured_banners']) && $field['featured_banners'] && count($field['featured_banners']) > 0)
                                        @foreach ($field['featured_banners'] as $banner)
                                            @if ($loop->index == 0)
                                                <div class="group relative aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden col-span-2 aspect-w-2">
                                                    <img src="{{ $banner['featured_banner_image']['url'] }}" alt="" class="object-center object-cover group-hover:opacity-75">
                                                    <div class="flex flex-col justify-end">
                                                        <div class="p-4 bg-white bg-opacity-60 text-sm">
                                                            <a href="{{ $banner['featured_banner_url'] }}" class="font-medium text-gray-900">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                {{ $banner['featured_banner_heading'] }}
                                                            </a>
                                                            <p aria-hidden="true" class="mt-0.5 text-gray-700 sm:mt-1">
                                                                {{ $banner['featured_banner_subheading'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="group relative aspect-w-1 aspect-h-1 rounded-md bg-gray-100 overflow-hidden ">
                                                    <img src="{{ $banner['featured_banner_image']['url'] }}" alt="" class="object-center object-cover group-hover:opacity-75">
                                                    <div class="flex flex-col justify-end">
                                                        <div class="p-4 bg-white bg-opacity-60 text-sm">
                                                            <a href="{{ $banner['featured_banner_url'] }}" class="font-medium text-gray-900">
                                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                                {{ $banner['featured_banner_heading'] }}
                                                            </a>
                                                            <p aria-hidden="true" class="mt-0.5 text-gray-700 sm:mt-1">
                                                                {{ $banner['featured_banner_subheading'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                @if ($field['add_submenu'])
                                    <div class="gap-x-8 gap-y-10 grid grid-cols-2 lg:grid-cols-3 row-end-auto row-start-auto text-gray-500 text-base lg:text-sm">
                                        @for ($col = 1; $col < 4; $col++)
                                            <div class="space-y-10">
                                                @php $i = 1; @endphp
                                                @foreach ($field['add_submenu'] as $submenu)
                                                    @if (($i == $col && $i < 3) || ($i - (floor(($i - 1) / 3) * 3)) == $col )
                                                        <div class="submenu">
                                                            <p class="font-medium text-gray-900">
                                                                {{ $submenu['submenu_heading'] }}
                                                            </p>
                                                            <div>
                                                                {!! $submenu['submenu_link_text_and_urls'] !!}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @php $i++; @endphp
                                                @endforeach
                                            </div>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <nav x-show="showMenu" x-transition x-transition.scale.origin.top class="lg:hidden" aria-label="Global" id="mobile-menu" style="display:none;">
                <div class="pt-2 pb-3 px-2 space-y-1">
                    @foreach ($fields as $field)
                        @php
                            $fieldNameSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $field['parent_menu_text']), '_'));
                        @endphp
                        <a @click="openSubMega = openSubMega == '{{ $fieldNameSlug }}' ? '' : '{{ $fieldNameSlug }}'"
                            href="{{ $field['enable_mega_menu'] == 'yes' ? 'javascript: void(0);' : $field['parent_menu_url'] }}"
                            :class="{ 'bg-gray-900 text-white' : openSubMega == '{{ $fieldNameSlug }}', 'hover:bg-gray-700 text-gray-300': openSubMega != '{{ $fieldNameSlug }}' }"
                            class="block rounded-md py-2 px-3 text-base font-medium hover:text-white"
                        >
                            {{ $field['parent_menu_text'] }}
                        </a>
                    @endforeach
                </div>
            </nav>
        </div>
    </header>
</div>