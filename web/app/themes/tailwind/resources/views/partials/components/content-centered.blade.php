<section class="relative py-8 bg-white overflow-hidden">
    <div class="relative px-4 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            @hassub('heading')
            <h1>
            <span class="block text-base text-center text-primary-500 font-semibold tracking-wide uppercase">@sub('subheading')</span>
            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">@sub('heading')</span>
            </h1>
            @endsub
        </div>
        <div class="mt-6 prose prose-primary prose-lg text-gray-500 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @sub('content')
        </div>
    </div>
</section>