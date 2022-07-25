<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            @sub('heading')
        </h2>

        <div class="mt-5 space-y-8">
            @fields('sections')
                <div>
                    @hassub('section_heading')
                        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">
                            @sub('section_heading')
                        </h2>
                    @endsub

                    <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-2">
                        @fields('items')
                            <li class="relative col-span-1 flex shadow-sm rounded-md">
                                <a href="@sub('link')" target="_blank" class="absolute inset-0"></a>
                                <div class="flex-shrink-0 flex items-center justify-center w-16 bg-primary-500 text-white text-sm font-medium rounded-l-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                                    <div class="truncate flex-1 px-4 py-4 text-sm">
                                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">@sub('title')</a>
                                        <p class="hidden text-gray-500">12 Members</p>
                                    </div>
                                    <div class="flex-shrink-0 pr-2">
                                        <a href="@sub('link')" target="_blank" class="relative z-10 cursor-pointer hover:text-primary-500 w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none">
                                            <span class="sr-only">Open options</span>
                                            <!-- Heroicon name: solid/dots-vertical -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endfields
                    </ul>
                </div>
            @endfields
        </div>
    </div>
</div>

  