@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    
    <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
      @include('partials.content-page')
    </div>
  @endwhile
@endsection
