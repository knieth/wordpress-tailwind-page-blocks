<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('min-h-screen flex flex-col justify-between bg-gray-50') @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="content">
      <main class="main">
        @yield('content')
      </main>
      @if (App\display_sidebar())
        <aside class="sidebar">
          @include('partials.sidebar')
        </aside>
      @endif
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
