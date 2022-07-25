<section aria-labelledby="social-impact-heading" class="max-w-7xl mx-auto pt-24 pb-24 px-4 sm:pt-32 sm:pb-32 sm:px-6 lg:px-8">
    <div class="relative rounded-lg overflow-hidden">
        <div class="absolute inset-0">
            @hassub('background_image')
                <img src="@sub('background_image', 'url')" alt="" class="w-full h-full object-center object-cover">
            @endsub
        </div>
        <div class="relative bg-gray-900 bg-opacity-25 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
            <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                <h2 id="social-impact-heading" class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    @hassub('heading')
                        <span class="block sm:inline">@sub('heading')</span>
                    @endsub
                </h2>
                <p class="mt-3 text-xl text-white">
                    @hassub('content')
                        @sub('content')
                    @endsub
                </p>
                @hassub('button_url')
                    <a href="@sub('button_url', 'url')" class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">
                        @hassub('button_text')
                            @sub('button_text')
                        @endsub
                    </a>
                @endsub
            </div>
        </div>
    </div>
</section>
