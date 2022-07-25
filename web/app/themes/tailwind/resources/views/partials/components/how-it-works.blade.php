<section aria-labelledby="perks-heading" class="bg-gray-100 border-t border-gray-200">
    <h2 id="perks-heading" class="sr-only">Our perks</h2>

    <div class="max-w-7xl mx-auto py-24 px-4 sm:px-6 sm:py-32 lg:px-8">
        <div class="grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-5 lg:gap-x-8 lg:gap-y-0">
            @fields('add_process')
                <div class="text-center md:flex md:items-start md:text-left lg:block lg:text-center">
                    <div class="md:flex-shrink-0">
                        <div class="flow-root">
                            <img class="-my-1 h-24 w-auto mx-auto" src="@sub('icon', 'url')" alt="">
                        </div>
                    </div>
                    <div class="mt-6 md:mt-0 md:ml-4 lg:mt-6 lg:ml-0">
                        <h3 class="text-sm font-semibold tracking-wide uppercase text-gray-900">@sub('heading')</h3>
                        <p class="mt-3 text-sm text-gray-500">@sub('content')</p>
                    </div>
                </div>
            @endfields
        </div>
    </div>
</section>
