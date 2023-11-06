<x-layouts.master>
    <div class="bg-white p-4 rounded-md mt-4">
        <h2 class="text-gray-500 text-lg font-semibold pb-4">Advertisings</h2>
        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>

        <div class="w-full border mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="GET" action="{{ url('/advertising') }}">
                @csrf

                <div class="mt-4">
                    <label for="platform" class="block font-medium text-sm text-gray-700">
                        {{ __('Platform') }}
                    </label>

                    <input id="platform" name="platform" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request()->filled('platform') ? request()->input('platform') : null }}">
                </div>

                <div class="mt-4">
                    <label for="start_date" class="block font-medium text-sm text-gray-700">
                        {{ __('Start Date') }}
                    </label>

                    <input id="start_date" name="start_date" type="date" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request()->filled('start_date') ? request()->input('start_date') : null }}">
                </div>

                <div class="mt-4">
                    <label for="end_date" class="block font-medium text-sm text-gray-700">
                        {{ __('End Date') }}
                    </label>

                    <input id="end_date" name="end_date" type="date" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ request()->filled('end_date') ? request()->input('end_date') : null }}">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Filter') }}
                    </button>
                </div>
            </form>
        </div>
        <table class="w-full table-auto text-sm">
            <thead>
            <tr class="text-sm leading-normal">
                <th class="py-2 px-4 bg-grey-lightest font-bold text-sm text-grey-light border-b border-grey-light">{{ __('Date') }}</th>
                <th class="py-2 px-4 bg-grey-lightest font-bold text-sm text-grey-light border-b border-grey-light">{{ __('Platform') }}</th>
                <th class="py-2 px-4 bg-grey-lightest font-bold text-sm text-grey-light border-b border-grey-light text-right">{{ __('Impression') }}</th>
                <th class="py-2 px-4 bg-grey-lightest font-bold text-sm text-grey-light border-b border-grey-light text-right">{{ __('Click') }}</th>
                <th class="py-2 px-4 bg-grey-lightest font-bold text-sm text-grey-light border-b border-grey-light text-right">{{ __('Spend') }}</th>
                <th class="py-2 px-4 bg-grey-lightest font-bold text-sm text-grey-light border-b border-grey-light text-right">{{ __('Revenue') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($advertisings as $item)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b border-grey-light">{{ $item->date }}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $item->platform }}</td>
                    <td class="py-2 px-4 border-b border-grey-light text-right">{{ $item->impressions }}</td>
                    <td class="py-2 px-4 border-b border-grey-light text-right">{{ $item->clicks }}</td>
                    <td class="py-2 px-4 border-b border-grey-light text-right">{{ $item->spend }}</td>
                    <td class="py-2 px-4 border-b border-grey-light text-right">{{ $item->revenue }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="w-full border mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <ul>
            @forelse ($insights as $insight)
                <li>{{ $insight }}</li>
            @empty
                <p>Henüz bir öneri yok</p>
            @endforelse
            </ul>
        </div>

    </div>
</x-layouts.master>
