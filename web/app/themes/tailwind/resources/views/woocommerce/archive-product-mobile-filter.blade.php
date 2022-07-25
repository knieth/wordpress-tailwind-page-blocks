<div x-show="showMobileFilters" x-transition x-transition.origin.right.opacity class="fixed inset-0 flex z-50 lg:hidden" role="dialog" aria-modal="true" style="display: none;">
    <div @click="showMobileFilters = false" class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>
    <div class="ml-auto relative max-w-xs w-full h-full bg-white shadow-xl py-4 pb-6 flex flex-col overflow-y-auto">
        <div class="px-4 flex items-center justify-between">
            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
            <button @click="showMobileFilters = false" type="button" class="no-apply-button -mr-2 w-10 h-10 p-2 flex items-center justify-center text-gray-400 hover:text-gray-500">
                <span class="sr-only">Close menu</span>
                <!-- Heroicon name: outline/x -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Filters -->
        <form class="mt-4">
            <div class="hidden">
                <fieldset>
                    <div class="pt-4 pb-2 px-4" id="filter-section-0">
                        {!! $filter !!}
                    </div>
                </fieldset>
            </div>

            <div class="border-t border-gray-200 px-4 pt-2" :class="showCategories ? 'pb-8' : 'pb-2'">
                <div class="w-full">
                    <button @click="showCategories = !showCategories" type="button" class="no-apply-button w-full flex items-center justify-between text-gray-400 hover:text-gray-500 px-0" aria-controls="filter-section-1" aria-expanded="false">
                        <span class="text-sm font-medium text-gray-900"> Product Categories </span>
                        <span class="ml-6 h-7 flex items-center">
                            <template x-if="showCategories">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                  </svg>
                            </template>

                            <template x-if="!showCategories">
                                <svg class="rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg"z viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                    </button>
                </div>
                <div x-show="showCategories" x-transition x-transition.origin.top.opacity>
                    @shortcode('[woocommerce_product_filter_category heading="Games" heading_no_results="No games found with your search." show_clear="no" multiple="yes" expandable_from_depth="3" exclude="uncategorized"]')
                </div>
            </div>

            <div class="border-t border-gray-200 px-4 pt-2 space-y-6" :class="showPrice ? 'pb-12' : 'pb-2'">
                <div class="w-full">
                    <button @click="showPrice = !showPrice" type="button" class="no-apply-button w-full flex items-center justify-between text-gray-400 hover:text-gray-500 px-0" aria-controls="filter-section-2" aria-expanded="false">
                        <span class="text-sm font-medium text-gray-900"> Price </span>
                        <span class="ml-6 h-7 flex items-center">
                            <template x-if="showPrice">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                  </svg>
                            </template>

                            <template x-if="!showPrice">
                                <svg class="rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg"z viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                        </span>
                    </button>
                </div>
                <div x-show="showPrice" x-transition x-transition.origin.top.opacity>
                    @shortcode('[woocommerce_product_filter_price show_heading="no"]')
                </div>
            </div>

            {{-- <div class="border-t border-gray-200 px-4 pt-2 space-y-6" :class="showSale ? 'pb-8' : 'pb-2'">
                <div class="w-full">
                    <button @click="showSale = !showSale" type="button" class="no-apply-button w-full flex items-center justify-between text-gray-400 hover:text-gray-500 px-0" aria-controls="filter-section-2" aria-expanded="false">
                        <span class="text-sm font-medium text-gray-900"> Sale </span>
                        <span class="ml-6 h-7 flex items-center">
                            <template x-if="showSale">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                  </svg>
                            </template>

                            <template x-if="!showSale">
                                <svg class="rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg"z viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </template>
                        </span>
                    </button>
                </div>
                <div x-show="showSale" x-transition x-transition.origin.top.opacity>
                        @shortcode('[woocommerce_product_filter_sale show_heading="no"]')
                </div>
            </div>--}}
        </form>
    </div>
</div>
