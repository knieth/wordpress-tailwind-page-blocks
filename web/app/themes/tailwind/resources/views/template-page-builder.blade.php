{{--
    Template Name: Page Builder
--}}

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        @include('partials.page-header')

        @layouts('page_builder')
            @layout('hero_with_fullwidth_background_image')

                @include('partials.components.hero-full-bg-image')

            @endlayout

            @layout('features_with_feeds_list')

                @include('partials.components.features-with-feeds-list')

            @endlayout

            @layout('hero_with_right_background_image')

                @include('partials.components.hero-right-bg-image')

            @endlayout

            @layout('three_column_cards')

                @include('partials.components.three-column-cards')

            @endlayout

            @layout('browse_categories')

                @include('partials.components.categories')

            @endlayout

            @layout('how_it_works')

                @include('partials.components.how-it-works')

            @endlayout

            @layout('featured_reviews')

                @include('partials.components.featured-reviews')

            @endlayout

            @layout('statistics')

                @include('partials.components.statistics')

            @endlayout

            @layout('contact_centered')

                @include('partials.components.contact-centered')

            @endlayout

            @layout('grid_list_simple_cards')

                @include('partials.components.grid-list-simple-cards')

            @endlayout

            @layout('content_centered')

                @include('partials.components.content-centered')

            @endlayout

            @layout('cta_simple_centered')

                @include('partials.components.cta-simple-centered')

            @endlayout

        @endlayouts
    @endwhile
@endsection
