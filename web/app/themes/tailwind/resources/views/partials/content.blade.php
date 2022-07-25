<div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
    <div class="flex-shrink-0">
        <a href="{{ get_permalink() }}" class="block">
            @if(has_post_thumbnail($post->ID))
            <img class="h-48 w-full object-cover"
                src="{{ get_the_post_thumbnail_url($post->ID) }}"
                alt="">
            @else
                <img class="h-48 w-full object-contain p-8"
                    src="@option('site_logo_dark', 'url')"
                    alt="">
            @endif
        </a>
    </div>
    <div class="flex-1 bg-white p-6 flex flex-col space-y-6">
        <div class="flex-1 space-y-4">
            <p class="text-sm font-medium m-0">
                @foreach (wp_get_post_terms(get_the_ID(), 'category') as $category)
                    <a href="{{ get_category_link( $category->term_id ) }}">{!! $category->name !!}</a><span>@if (!$loop->last),@endif</span>
                @endforeach
            </p>
            <p class="text-xl font-semibold text-gray-900 m-0">{!! get_the_title() !!}</p>
            <p class="text-base text-gray-500 m-0">
                {{ wp_trim_words(get_the_excerpt(), 30, '...') }}
            </p>
        </div>

        <div class="flex flex-col items-start space-y-1">
            <div class="flex space-x-1 text-sm text-gray-500">
                <span> {{ __('Posted on', 'sage') }} </span>
                <time datetime="{{ get_post_time('c', true) }}"> {{ get_the_date() }} </time>
            </div>
            <p class="text-sm font-medium text-gray-900">
                {{ __('By', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="hover:underline"> {{ get_the_author() }} </a>
            </p>
        </div>

        <div class="flex flex-row-reverse">
            <a href="{{ get_permalink() }}">
                <button class="w-auto flex items-center">
                    Continue reading
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </a>
        </div>
    </div>
</div>