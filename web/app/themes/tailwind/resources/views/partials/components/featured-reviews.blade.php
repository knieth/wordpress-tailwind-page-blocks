<!-- Testimonials -->
<section aria-labelledby="testimonial-heading" class="bg-gray-100 relative">
    <div class="py-24 max-w-7xl mx-auto px-4 sm:px-6 lg:py-32 lg:px-8">
        <div class="max-w-2xl mx-auto lg:max-w-none">
            <h2 id="testimonial-heading" class="text-2xl font-extrabold tracking-tight text-gray-900">
                @hassub('heading')
                @sub('heading')
                @endsub
            </h2>

            <div class="mt-16 space-y-16 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
                @hasfields('reviews')
                @fields('reviews')
                    <blockquote class="sm:flex lg:block">
                        <img src="" alt="" class="w-24 h-18" />
                        <svg width="24" height="18" viewBox="0 0 24 18" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                            class="flex-shrink-0 text-gray-300">
                            <path d="M0 18h8.7v-5.555c-.024-3.906 1.113-6.841 2.892-9.68L6.452 0C3.188 2.644-.026 7.86 0 12.469V18zm12.408 0h8.7v-5.555C21.083 8.539 22.22 5.604 24 2.765L18.859 0c-3.263 2.644-6.476 7.86-6.451 12.469V18z"
                                fill="currentColor" />
                        </svg>
                        <div class="mt-8 sm:mt-0 sm:ml-6 lg:mt-10 lg:ml-0">
                            <p class="text-lg text-gray-600">@sub('content')</p>
                            <cite class="mt-4 block font-semibold not-italic text-gray-900">
                                @sub('name'), @sub('occupation')
                            </cite>
                        </div>
                    </blockquote>
                @endfields
                @endhasfields
            </div>
        </div>
    </div>
</section>
