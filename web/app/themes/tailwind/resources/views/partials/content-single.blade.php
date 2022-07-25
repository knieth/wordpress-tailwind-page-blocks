<div class="relative py-16 bg-white overflow-hidden">
    <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
        <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
            <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
            </svg>
            <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
            </svg>
            <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
            </svg>
        </div>
    </div>
    <div class="relative px-4 sm:px-6 lg:px-8 space-y-6">
        <div class="text-lg max-w-prose mx-auto">
            <p class="text-sm font-medium m-0 text-center">
                @foreach (wp_get_post_terms(get_the_ID(), 'category') as $category)
                    <a href="{{ get_category_link( $category->term_id ) }}">{!! $category->name !!}</a><span>@if (!$loop->last),@endif</span>
                @endforeach
            </p>
            <h1>
                <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{!! get_the_title() !!}</span>
            </h1>
        </div>

        {{-- Date & Author --}}
        <div class="flex justify-center items-center space-x-1">
            <div class="flex space-x-1 text-sm text-gray-500">
                <span> {{ __('Posted on', 'sage') }} </span>
                <time datetime="{{ get_post_time('c', true) }}"> {{ get_the_date() }} </time>
            </div>
            <p class="text-sm font-medium text-gray-900 m-0">
                {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="hover:underline"> {{ get_the_author() }} </a>
            </p>
        </div>

        <div class="prose prose-primary prose-lg text-gray-500 mx-auto">
            {!! the_content() !!}
        </div>

        <div class="mx-auto">
            <div class="mt-12 mb-4 w-12 border-2 border-gray-300 mx-auto"></div>
            <div class="flex space-x-6 items-center justify-center">
                @include('partials.components.share-links')
            </div>
        </div>

        {{-- Author --}}
        <div class="flex justify-center">
            <p class="text-sm font-medium text-gray-900 m-0">
                {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="hover:underline"> {{ get_the_author() }} </a>
            </p>
        </div>

        {{-- Previous & Next Post --}}
        <div class="prose prose-primary prose-lg mx-auto">
            @php
                $nextPost = get_previous_post();
                $previousPost = get_next_post();

            @endphp

            <nav class="border-t border-gray-200 px-4 grid grid-cols-2 gap-2 sm:px-0">
                @if (isset($previousPost->ID))
                    <a href="{{ get_permalink($previousPost) }}" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 col-start-1 place-self-start">
                        <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        {{ get_the_title($previousPost) }}
                    </a>
                @endif

                @if (isset($nextPost->ID))
                    <a href="{{ get_permalink($nextPost) }}" class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 col-start-2 place-self-end">
                        {{ get_the_title($nextPost) }}
                        <svg class="ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </nav>
        </div>
    </div>
</div>

