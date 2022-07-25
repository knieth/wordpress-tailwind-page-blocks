{{--
    Template Name: Contact
--}}

@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php the_post() @endphp
        @include('partials.page-header')

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="relative bg-white shadow-xl rounded-lg overflow-hidden">
                <h2 id="contact-heading" class="sr-only">Contact us</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Contact form -->
                    <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
                        <h3 class="text-lg font-medium text-warm-gray-900 mb-6">Send us a message</h3>

                        @shortcode(get_field('contact_form_shortcode', 'option'))
                    </div>

                    <!-- Contact information -->
                    <div class="relative overflow-hidden py-10 px-6 bg-gradient-to-b from-primary-500 to-primary-600 sm:px-10 xl:p-12 text-white">
                        <!-- Decorative angle backgrounds -->
                        <div class="absolute inset-0 pointer-events-none sm:hidden" aria-hidden="true">
                            <svg class="absolute inset-0 w-full h-full" width="343" height="388"
                                viewBox="0 0 343 388" fill="none" preserveAspectRatio="xMidYMid slice"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z"
                                    fill="url(#linear1)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="hidden absolute top-0 right-0 bottom-0 w-1/2 pointer-events-none sm:block lg:hidden"
                            aria-hidden="true">
                            <svg class="absolute inset-0 w-full h-full" width="359" height="339"
                                viewBox="0 0 359 339" fill="none" preserveAspectRatio="xMidYMid slice"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z"
                                    fill="url(#linear2)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="hidden absolute top-0 right-0 bottom-0 w-1/2 pointer-events-none lg:block"
                            aria-hidden="true">
                            <svg class="absolute inset-0 w-full h-full" width="160" height="678"
                                viewBox="0 0 160 678" fill="none" preserveAspectRatio="xMidYMid slice"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z"
                                    fill="url(#linear3)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>

                        <div class="space-y-4 text-base">
                            @option('contact_short_description')
                        </div>

                        <dl class="mt-8 space-y-6">
                            <dt><span class="sr-only">Phone number</span></dt>
                            <dd class="flex text-base text-white">
                                <!-- Heroicon name: outline/phone -->
                                <svg class="flex-shrink-0 w-6 h-6 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="ml-3">@option('contact_phone_number')</span>
                            </dd>
                            <dt><span class="sr-only">Email</span></dt>
                            <dd class="flex text-base text-white">
                                <!-- Heroicon name: outline/mail -->
                                <svg class="flex-shrink-0 w-6 h-6 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-3">@option('contact_email_address')</span>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    @endwhile
@endsection
