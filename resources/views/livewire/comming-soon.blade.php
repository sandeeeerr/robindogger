<div>
    <!-- Mobile video -->
    <div class="block md:hidden relative w-screen h-screen overflow-hidden">
        <video 
            autoplay 
            loop 
            muted 
            playsinline 
            class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('assets/soon_mobile.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Desktop video -->
    <div class="hidden md:block relative w-screen h-screen overflow-hidden">
        <video 
            autoplay 
            loop 
            muted 
            playsinline 
            class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('assets/soon2.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>
