<div class="relative h-screen overflow-y-auto snap-y snap-mandatory scroll-smooth">
    {{-- Gradient Top --}}
    <div class="sticky top-0 left-0 w-full h-[30vh] bg-gradient-to-b from-[#121212] to-transparent z-10 pointer-events-none"></div>
    {{-- Gradient Bottom --}}

    <div class="flex flex-col items-center py-[30vh] space-y-12 relative z-0">
        {{-- Question 1 --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            @include('livewire.partials.slider', [
                'question' => 'Seberapa penting kinerja keseluruhan dalam menentukan kualitas laptop gaming?',
                'sliderId' => 'slider1',
                'circlePrefix' => 'circle1-',
                'value' => $value1,
                'model' => 'value1'
            ])
        </div>

        {{-- Question 2 --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            @include('livewire.partials.slider', [
                'question' => 'Apakah spesifikasi prosesor mempengaruhi rekomendasi Anda?',
                'sliderId' => 'slider2',
                'circlePrefix' => 'circle2-',
                'value' => $value2,
                'model' => 'value2'
            ])
        </div>

        {{-- Question 3 --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            @include('livewire.partials.slider', [
                'question' => 'Apakah pelanggan mempertimbangkan berat laptop dalam pembelian gaming laptop?',
                'sliderId' => 'slider3',
                'circlePrefix' => 'circle3-',
                'value' => $value3,
                'model' => 'value3'
            ])
        </div>

        {{-- Question 4 --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            @include('livewire.partials.slider', [
                'question' => 'Apakah kualitas dan ukuran layar penting bagi pembeli laptop gaming?',
                'sliderId' => 'slider4',
                'circlePrefix' => 'circle4-',
                'value' => $value4,
                'model' => 'value4'
            ])
        </div>

        {{-- Question 5 --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            @include('livewire.partials.slider', [
                'question' => 'Apakah baterai menjadi faktor penting saat pelanggan memilih laptop gaming?',
                'sliderId' => 'slider5',
                'circlePrefix' => 'circle5-',
                'value' => $value5,
                'model' => 'value5'
            ])
        </div>

        {{-- Question 6 --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            @include('livewire.partials.slider', [
                'question' => 'Seberapa penting harga dalam keputusan pelanggan membeli laptop gaming?',
                'sliderId' => 'slider6',
                'circlePrefix' => 'circle6-',
                'value' => $value6,
                'model' => 'value6'
            ])
        </div>

        {{-- Submit Button --}}
        <div class="snap-center h-[40vh] w-full flex justify-center items-center">
            <button
                type="button"
                class="w-full max-w-md py-3 rounded-md bg-gradient-to-r from-[#1D976C] to-[#093123] hover:from-[#157a54] hover:to-[#093123] text-white font-semibold shadow transition duration-300 text-lg"
                wire:click="submit"
            >
                Submit
            </button>
        </div>
    </div>
    <div class="sticky bottom-0 left-0 w-full h-[30vh] bg-gradient-to-t from-[#121212] to-[transparent] z-10 pointer-events-none"></div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sliders = document.querySelectorAll('input[type=range]');
        sliders.forEach(slider => {
            const prefix = slider.id.replace('slider', 'circle');
            updateCircles(slider.id, prefix + '-', slider.value);
            updateSliderTrack(slider.id, slider.value);
        });
    });

    function updateCircles(sliderId, circlePrefix, val) {
        document.getElementById('selected-value-' + sliderId).innerText = val;
        for (let i = 1; i <= 5; i++) {
            const circle = document.getElementById(circlePrefix + i);
            if (circle) {
                if (i <= val) {
                    circle.style.backgroundColor = '#1D976C';
                    circle.style.color = '#000';
                } else {
                    circle.style.backgroundColor = '#111827';
                    circle.style.color = '#1D976C';
                }
            }
        }
    }
</script>