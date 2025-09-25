@if (session('success') || session('error'))
<div
    x-data="{ 
        show: true,
        type: '{{ session('success') ? 'success' : 'error' }}'
    }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition:enter="ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 flex items-center justify-center z-50 p-4"
    style="background: rgba(0,0,0,0.4); backdrop-filter: blur(8px);">
    <div
        class="relative bg-white rounded-2xl shadow-xl p-8 max-w-md w-full border border-gray-100 transform transition-all duration-300 hover:shadow-2xl">
        <!-- Close Button -->
        <button
            @click="show = false"
            class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-500 hover:text-gray-800 transition-all duration-200"
            aria-label="Close">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Content -->
        <div class="flex flex-col items-center text-center space-y-5">
            <!-- Enhanced Animated Icon -->
            <div class="relative w-20 h-20 flex items-center justify-center">
                @if (session('success'))
                <!-- Success Icon - Checkmark in Circle -->
                <svg class="absolute inset-0 w-full h-full text-gray-800" viewBox="0 0 80 80" fill="none">
                    <circle cx="40" cy="40" r="38" stroke="currentColor" stroke-width="3" class="opacity-20" />
                    <circle cx="40" cy="40" r="38" stroke="currentColor" stroke-width="1" stroke-dasharray="240" stroke-dashoffset="240"
                        x-init="$el.animate([
                            {strokeDashoffset: 240}, 
                            {strokeDashoffset: 0}
                        ], {duration: 800, fill: 'forwards', easing: 'ease-out'})" />
                </svg>
                <svg class="w-10 h-10 text-gray-800" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M20 6L9 17l-5-5"
                        stroke="currentColor"
                        stroke-width="2.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        style="stroke-dasharray: 24; stroke-dashoffset: 24;"
                        x-init="setTimeout(() => {
                            $el.animate([
                                {strokeDashoffset: 24}, 
                                {strokeDashoffset: 0}
                            ], {duration: 600, fill: 'forwards', easing: 'ease-out'});
                        }, 200)" />
                </svg>
                @elseif (session('error'))
                <!-- Error Icon - X in Circle -->
                <svg class="absolute inset-0 w-full h-full text-gray-800" viewBox="0 0 80 80" fill="none">
                    <circle cx="40" cy="40" r="38" stroke="currentColor" stroke-width="3" class="opacity-20" />
                    <circle cx="40" cy="40" r="38" stroke="currentColor" stroke-width="1" stroke-dasharray="240" stroke-dashoffset="240"
                        x-init="$el.animate([
                            {strokeDashoffset: 240}, 
                            {strokeDashoffset: 0}
                        ], {duration: 800, fill: 'forwards', easing: 'ease-out'})" />
                </svg>
                <svg class="w-10 h-10 text-gray-800" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M18 6L6 18"
                        stroke="currentColor"
                        stroke-width="2.5"
                        stroke-linecap="round"
                        style="stroke-dasharray: 18; stroke-dashoffset: 18;"
                        x-init="setTimeout(() => {
                            $el.animate([
                                {strokeDashoffset: 18}, 
                                {strokeDashoffset: 0}
                            ], {duration: 400, fill: 'forwards', easing: 'ease-out'});
                        }, 200)" />
                    <path
                        d="M6 6L18 18"
                        stroke="currentColor"
                        stroke-width="2.5"
                        stroke-linecap="round"
                        style="stroke-dasharray: 18; stroke-dashoffset: 18;"
                        x-init="setTimeout(() => {
                            $el.animate([
                                {strokeDashoffset: 18}, 
                                {strokeDashoffset: 0}
                            ], {duration: 400, fill: 'forwards', easing: 'ease-out', delay: 200});
                        }, 200)" />
                </svg>
                @endif
            </div>

            <!-- Message -->
            <div class="space-y-3">
                <h3 class="text-2xl font-bold text-gray-900">
                    {{ session('success') ? 'Success' : 'Notice' }}
                </h3>
                <p class="text-gray-700 leading-relaxed text-lg">
                    {{ session('success') ?? session('error') }}
                </p>
            </div>

            <!-- Action Button -->
            <button
                @click="show = false"
                class="w-full py-3.5 px-6 bg-gray-900 text-white rounded-xl font-semibold transition-all duration-250 transform hover:scale-[1.02] active:scale-[0.98] hover:bg-gray-800 hover:shadow-lg border border-gray-900">
                Continue
            </button>
        </div>
    </div>

    <!-- Progress Bar -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 w-32 h-1 bg-white bg-opacity-30 rounded-full overflow-hidden">
        <div
            class="h-full bg-white bg-opacity-60 rounded-full"
            x-init="$el.animate([
                { transform: 'translateX(-100%)' },
                { transform: 'translateX(0%)' }
            ], { duration: 4000, fill: 'forwards' })"></div>
    </div>

</div>
@endif