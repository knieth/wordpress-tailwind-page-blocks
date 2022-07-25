@extends('layouts.app')

@section('content')
  <div class="min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
  <div class="max-w-max mx-auto">
    <main class="sm:flex">
      <p class="text-4xl font-extrabold text-primary-600 sm:text-5xl">404</p>
      <div class="sm:ml-6">
        <div class="sm:border-l sm:border-gray-200 sm:pl-6">
          <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Page not found</h1>
          <p class="mt-1 text-base text-gray-500">Please check the URL in the address bar and try again.</p>
        </div>
        <div class="mt-10 flex items-center space-x-3 sm:border-l sm:border-transparent sm:pl-6">
          <div>
            <a href="/" type="button"> Go back home </a>
          </div>
          <div>
            <a href="/contact-us" class="bg-gray-200 border border-transparent rounded-md py-4 px-8 h-full items-center justify-center text-sm font-medium text-gray-900 hover:bg-gray-300"> Contact support </a>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection
