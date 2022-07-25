<footer class="bg-secondary-900">
    <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
        @hasoption('footer_navigation_menu')
            <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
                @options('footer_navigation_menu')
                <div class="px-5 py-2">
                    <a href="@sub('menu_url')" class="text-base text-gray-100 hover:text-gray-200"> @sub('menu_text') </a>
                </div>
                @endoptions
            </nav>
        @endoption
        <p class=" @hasoption('footer_navigation_menu') mt-8 @endoption mb-0 text-center text-base text-gray-100">&copy; 
            {{ date('Y') }} 
            {{ get_bloginfo('name', 'display') }},
            @option('footer_copyright')
        </p>
    </div>
</footer>