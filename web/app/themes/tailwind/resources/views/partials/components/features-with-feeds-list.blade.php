<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white py-16 sm:py-24 lg:py-32">
    <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-4xl lg:px-8">
        <div class="text-left max-w-2xl mx-auto">
            @php
                $count = 0;
                $processes = get_sub_field('process_flow');

                if (is_array($processes)) {
                    $count = count($processes);
                }
            @endphp
            @fields('process_flow')
                <div>
                    <div class="text-center bg-white px-4 py-5 sm:px-6">
                        <h3 class="mb-0 text-lg leading-6 font-medium text-gray-900">
                             @sub('heading')
                        </h3>
                        <p class="text-center mx-auto mt-1 mb-0 max-w-2xl text-sm text-gray-500">@sub('subheading')</p>
                    </div>

                    <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-1 lg:grid-cols-1">
                        @fields('event')
                            <li class="relative col-span-1 flex shadow-sm rounded-md">
                                <div class="flex-shrink-0 flex items-center justify-center w-16 bg-@sub('event_icon_color')-500 text-white text-sm font-medium rounded-l-md">
                                    @sub('event_icon_text')
                                </div>
                                <div class="flex-1 border-t border-r border-b border-gray-200 bg-white rounded-r-md">
                                    <div class="px-4 py-4 text-sm">
                                        <div class="text-gray-900 font-medium hover:text-gray-600">@sub('event_heading')</div>
                                    </div>
                                </div>
                            </li>
                        @endfields
                    </ul>

                    @if ($count > get_row_index())
                        <div class="mt-6 flex items-center justify-center text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </div>
                    @endif
                </div>
            @endfields
        </div>

        <div class="max-w-4xl mx-auto text-left mt-24 space-y-4">
            @php
                $process_count = 0;
                $processes = get_sub_field('process_flow_checklist');

                if (is_array($processes)) {
                    $process_count = count($processes);
                }
            @endphp
            @fields('process_flow_checklist')
                <div>
                    <div class="bg-white overflow-hidden rounded-lg shadow">
                        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                            <h3 class="mb-0 text-lg leading-6 font-medium text-gray-900">
                                @sub('heading')
                            </h3>
                            <p class="mt-1 mb-0 max-w-2xl text-sm text-gray-500">@sub('subheading')</p>
                        </div>

                        <div class="relative px-4 py-4 sm:px-6">
                            <div class="flow-root">
                                <ul role="list" class="-mb-8">
                                    @php
                                        $event_count = 0;
                                        $events = get_sub_field('event');

                                        if (is_array($events)) {
                                            $event_count = count($events);
                                        }
                                    @endphp
                                    @fields('event')
                                        <li>
                                            <div class="relative pb-8">
                                                <!-- Vertical line -->
                                                @if ($event_count > get_row_index())
                                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                @endif

                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span class="h-8 w-8 rounded-full bg-{{ get_sub_field('is_event_completed') ? 'asparagus' : 'botticelli' }}-500 flex items-center justify-center ring-8 ring-white">
                                                            <!-- Heroicon name: solid/check -->
                                                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                        <div>
                                                            <p class="text-sm text-gray-800">
                                                                @sub('event_heading')
                                                            </p>
                                                        </div>
                                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                            <time>@sub('event_date')</time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endfields
                                </ul>
                            </div>
                        </div>
                    </div>

                    @if ($process_count > get_row_index())
                        <div class="mt-4 flex items-center justify-center">
                            <span class="block h-6 w-0.5 bg-gray-200" aria-hidden="true"></span>
                        </div>
                    @endif
                </div>
            @endfields
        </div>

    </div>
</div>
