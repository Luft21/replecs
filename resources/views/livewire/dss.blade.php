<div class="ml-48 flex-1 h-screen overflow-hidden pt-16 pb-10 px-4">
    <div class="h-full overflow-y-auto pr-3 scrollbar-thin scrollbar-thumb-green-500 scrollbar-track-transparent">
                <div class="mx-auto max-w-3xl">
                    {{-- Slider Box --}}
                    <div class="text-center flex justify-center w-full">
                        @livewire('dss-slider')
                    </div>
                    <div class="pr-6 text-right">
                        <!-- Optional Button -->
                        <a href="{{ url('/dss') }}"
                            class="text-right mt-6 inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow">
                            Hitung
                        </a>
                    </div>
                </div>
    </div>
</div>