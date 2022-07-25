<div class="relative bg-gray-900">
    <div class="h-80 w-full absolute bottom-0 xl:inset-0 xl:h-full">
        <div class="h-full w-full xl:grid xl:grid-cols-2">
            <div class="h-full xl:relative xl:col-start-2">
                <img class="h-full w-full object-cover opacity-50 xl:absolute xl:inset-0"
                    @hassub('background_image')
                    src="@sub('background_image', 'url')"
                    @endsub
                    alt="People working on laptops">
                <div aria-hidden="true"
                    class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r">
                </div>
            </div>
        </div>
    </div>
    <div
        class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
        <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
            <h2 class="text-sm font-semibold text-primary-300 tracking-wide uppercase">Valuable Metrics</h2>
            <p class="mt-3 text-3xl font-extrabold text-white">
                @hassub('heading')
                @sub('heading')
                @endsub
            </p>
            <p class="mt-5 text-lg text-gray-300">
                @hassub('content')
                @sub('content')
                @endsub
            </p>
            <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
                @hasfields('stats')
                @fields('stats')
                    <p>
                        <span class="block text-2xl font-bold text-white">@sub('number')</span>
                        <span class="mt-1 block text-base text-gray-300">
                            @sub('short_description')
                        </span>
                    </p>
                @endfields
                @endhasfields
            </div>
        </div>
    </div>
</div>
