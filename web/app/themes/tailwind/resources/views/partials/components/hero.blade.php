<div class="relative bg-gray-900">
    <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
        @hassub('background_image')
            <img src="@sub('background_image', 'url')" alt="" class="w-full h-full object-center object-cover">
        @endsub
    </div>
    <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>

    <div class="relative max-w-4xl mx-auto py-32 px-6 flex flex-col items-center text-center sm:py-64 lg:px-0">
        <h1 class="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">@sub('heading')</h1>
        <p class="mt-4 text-xl text-white">@sub('content')</p>
        <div class="sm:space-x-4">
            <a href="@sub('primary_button_url', 'url')" class="mt-8 inline-block bg-primary-500 border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-100 hover:bg-primary-500">
                @hassub('primary_button_text')
                    @sub('primary_button_text')
                @endsub
            </a>
            <a href="@sub('secondary_button_url', 'url')" class="mt-8 inline-block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100">
                @hassub('secondary_button_text')
                    @sub('secondary_button_text')
                @endsub
            </a>
        </div>
    </div>
</div>
