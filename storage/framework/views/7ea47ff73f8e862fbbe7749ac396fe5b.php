<div class="text-justify p-6 bg-[#1f1f1f] rounded-xl shadow-md w-full max-w-3xl mx-auto text-white">
    <p class="mb-4 font-semibold"><?php echo e($question); ?></p>

    
    <div class="relative w-full">
        
        <div class="absolute top-1/2 -translate-y-1/2 w-full flex justify-between z-10 pointer-events-none" id="circle-container-<?php echo e($sliderId); ?>">
            <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?>
                <div 
                    class="w-8 h-8 flex items-center justify-center rounded-full border-2 text-sm font-bold transition-all duration-200 bg-[#1f1f1f]"
                    id="<?php echo e($circlePrefix . $i); ?>"
                    style="border-color: #1D976C; color: #1D976C;"
                >
                    <?php echo e($i); ?>

                </div>
            <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        
        <input 
            type="range" 
            min="1" 
            max="5" 
            step="1" 
            wire:model="<?php echo e($model); ?>" 
            id="<?php echo e($sliderId); ?>"
            class="w-full h-2 bg-gray-700 rounded-full appearance-none
                [&::-webkit-slider-thumb]:appearance-none
                [&::-webkit-slider-thumb]:w-5
                [&::-webkit-slider-thumb]:h-5
                [&::-webkit-slider-thumb]:bg-transparent
                [&::-webkit-slider-thumb]:border-none
                [&::-webkit-slider-thumb]:shadow-none
                [&::-webkit-slider-thumb]:rounded-full
                focus:outline-none"
            oninput="updateSliderTrack('<?php echo e($sliderId); ?>', this.value); updateCircles('<?php echo e($sliderId); ?>', '<?php echo e($circlePrefix); ?>', this.value)"
        >
    </div>

    
    <p class="text-center mt-4 text-green-400 font-medium">
        Nilai terpilih: <span id="selected-value-<?php echo e($sliderId); ?>"><?php echo e($value); ?></span>
    </p>
</div>


<script>
function updateSliderTrack(sliderId, value) {
    const slider = document.getElementById(sliderId);
    const steps = 5;
    const green = "rgba(74, 222, 128, 1)";
    const transparent = "rgba(74, 222, 128, 0)";
    const dark = "#111827";

    const segments = [];
    const segmentWidth = 100 / (steps - 1);

    for (let i = 0; i < steps - 1; i++) {
        const start = i * segmentWidth;
        const end = (i + 1) * segmentWidth;

        if (i + 1 < value) {
            segments.push(`${green} ${start}%`);
            segments.push(`${transparent} ${end}%`);
        } else {
            segments.push(`${dark} ${start}%`);
            segments.push(`${dark} ${end}%`);
        }
    }

    slider.style.background = `linear-gradient(to right, ${segments.join(", ")})`;
}
</script>
<?php /**PATH C:\Users\Klein\Workspace\replecs\resources\views/livewire/partials/slider.blade.php ENDPATH**/ ?>