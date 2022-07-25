<section class="max-w-7xl mx-auto pt-16 pb-16 px-4 sm:pt-20 sm:pb-20 sm:px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        @hassub('heading')
            <span class="block">
                @sub('heading')
            </span>
        @endsub
        @hassub('subheading')
            <span class="block">
                @sub('subheading')
            </span>
        @endsub
    </h2>
    <div class="mt-8 flex justify-center">
        <div class="inline-flex rounded-md shadow">
            @hassub('primary_button_url')
                <a href="@sub('primary_button_url', 'url')" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-100 hover:text-gray-100 bg-primary-500 hover:bg-primary-700">
                    @sub('primary_button_text')
                </a>
            @endsub
        </div>
        <div class="ml-3 inline-flex">
            @hassub('secondary_button_url')
                <a href="@sub('secondary_button_url', 'url')" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-100 hover:text-gray-100 bg-secondary-500 hover:bg-secondary-700">
                    @sub('secondary_button_text')
                </a>
            @endsub
        </div>
    </div>
</section>