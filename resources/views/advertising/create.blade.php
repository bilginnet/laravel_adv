<x-layouts.master>
    <div class="mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">


        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-full border mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('advertising.store') }}">
                @csrf

                <div class="mt-4">
                    <label for="date" class="block font-medium text-sm text-gray-700">
                        {{ __('Date') }}
                    </label>

                    <input id="date" name="date" type="date" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('date') }}" required autofocus>
                </div>

                <div>
                    <label for="platform" class="block font-medium text-sm text-gray-700">
                        {{ __('Platform') }}
                    </label>

                    <input id="platform" name="platform" type="text" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email') }}" required>
                </div>

                <div class="mt-4">
                    <label for="impressions" class="block font-medium text-sm text-gray-700">
                        {{ __('Impressions') }}
                    </label>

                    <input id="impressions" name="impressions" type="number" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('impressions') }}" required>
                </div>

                <div class="mt-4">
                    <label for="clicks" class="block font-medium text-sm text-gray-700">
                        {{ __('Clicks') }}
                    </label>

                    <input id="clicks" name="clicks" type="number" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('clicks') }}" required>
                </div>

                <div class="mt-4">
                    <label for="spend" class="block font-medium text-sm text-gray-700">
                        {{ __('Spend') }}
                    </label>

                    <input id="spend" name="spend" type="number" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('spend') }}" required>
                </div>

                <div class="mt-4">
                    <label for="revenue" class="block font-medium text-sm text-gray-700">
                        {{ __('Revenue') }}
                    </label>

                    <input id="revenue" name="revenue" type="number" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('revenue') }}" required>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        {{ __('Save') }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layouts.master>
