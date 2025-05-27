<div class="space-y-8 w-full mx-auto p-6">

    {{-- QUESTION 1 --}}
    @include('livewire.partials.slider', [
        'question' => 'Seberapa penting kinerja keseluruhan dalam menentukan kualitas laptop gaming?',
        'sliderId' => 'slider1',
        'circlePrefix' => 'circle1-',
        'value' => $value1,
        'model' => 'value1'
    ])

    {{-- QUESTION 2 --}}
    @include('livewire.partials.slider', [
        'question' => 'Apakah spesifikasi prosesor mempengaruhi rekomendasi Anda?',
        'sliderId' => 'slider2',
        'circlePrefix' => 'circle2-',
        'value' => $value2,
        'model' => 'value2'
    ])

    {{-- QUESTION 3 --}}
    @include('livewire.partials.slider', [
        'question' => 'Apakah pelanggan mempertimbangkan berat laptop dalam pembelian gaming laptop?',
        'sliderId' => 'slider3',
        'circlePrefix' => 'circle3-',
        'value' => $value3,
        'model' => 'value3'
    ])

    {{-- QUESTION 4 --}}
    @include('livewire.partials.slider', [
        'question' => 'Apakah kualitas dan ukuran layar penting bagi pembeli laptop gaming?',
        'sliderId' => 'slider4',
        'circlePrefix' => 'circle4-',
        'value' => $value4,
        'model' => 'value4'
    ])

    {{-- QUESTION 5 --}}
    @include('livewire.partials.slider', [
        'question' => 'Apakah baterai menjadi faktor penting saat pelanggan memilih laptop gaming?',
        'sliderId' => 'slider5',
        'circlePrefix' => 'circle5-',
        'value' => $value5,
        'model' => 'value5'
    ])

    {{-- QUESTION 6 --}}
    @include('livewire.partials.slider', [
        'question' => 'Seberapa penting harga dalam keputusan pelanggan membeli laptop gaming?',
        'sliderId' => 'slider6',
        'circlePrefix' => 'circle6-',
        'value' => $value6,
        'model' => 'value6'
    ])
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
                if (i == val) {
                    circle.style.backgroundColor = '#4ade80';
                    circle.style.color = '#000';
                } else {
                    circle.style.backgroundColor = 'transparent';
                    circle.style.color = '#4ade80';
                }
            }
        }
    }
</script>