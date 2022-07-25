<section aria-labelledby="category-heading" class="pt-24 sm:pt-32 xl:max-w-7xl xl:mx-auto xl:px-8">
    <div class="px-4 sm:px-6 sm:flex sm:items-center sm:justify-between lg:px-8 xl:px-0">
        <h2 id="category-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">
            @sub('heading')
        </h2>
        <a href="@sub('browse_all_categories_url', 'url')" class="hidden text-sm font-semibold text-primary-500 hover:text-primary-700 sm:block">
            Browse all games
            <span aria-hidden="true"> &rarr;</span>
        </a>
    </div>

    @if(get_sub_field('select_categories'))
        @php
            $categories_columns = count(get_sub_field('select_categories')) > 4 ? 5 : 4;
        @endphp
        <div class="py-2 px-4 sm:px-6 lg:px-8 xl:px-0">
            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-{{ $categories_columns }}">
                @foreach (get_sub_field('select_categories') as $category)
                    @if ($loop->index  < 5)
                        <a href="{{ get_term_link($category) }}"
                            class="relative w-auto h-80 rounded-lg p-6 flex flex-col overflow-hidden hover:opacity-75">
                            <span aria-hidden="true" class="absolute inset-0">
                                <img src="{{ wp_get_attachment_url(get_term_meta( $category->term_id, 'thumbnail_id', true )) }}"
                                    alt="" class="w-full h-full object-center object-cover">
                            </span>
                            <span aria-hidden="true"
                                class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-gray-800 opacity-50"></span>
                            <span class="relative mt-auto text-center text-xl font-bold text-white">
                                {{ $category->name }}
                            </span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    <div class="mt-6 px-4 sm:hidden">
        <a href="@sub('browse_all_categories_url')" class="block text-sm font-semibold text-primary-500 hover:text-primary-700">
            Browse all games
            <span aria-hidden="true"> &rarr;</span>
        </a>
    </div>
</section>
