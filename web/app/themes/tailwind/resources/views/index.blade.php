@extends('layouts.app')

@section('content')
    @if (!have_posts())
        <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
    @endif

    <div class="relative py-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
            @while (have_posts())
                @php the_post() @endphp
                @include('partials.content-'.get_post_type(), ['post' => get_post()])
            @endwhile
        </div>
    </div>

    {!! get_the_posts_navigation() !!}
@endsection
