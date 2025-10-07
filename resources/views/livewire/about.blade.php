<div>
    <x-hero title="About" />

    <x-container>
        @php($settings = App\Models\SiteSetting::query()->first())
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 mb-14">
            <div class="text-xl font-light text-gray-700 dark:text-gray-300">
                @php($about = $settings->about_text ?? "Hi, I'm Robin Dogger, a 24-year-old designer based in Leeuwarden. I specialize in Graphic & Motion Design. With a passion for bold and colorful visuals, dynamic motion, and thoughtful typography, I aim to create impactful and creative solutions that bring ideas to life.")
                {!! nl2br(e($about)) !!}
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($rotations as $index => $rotation)
                <img
                    src="{{ asset('assets/ik.JPG') }}"
                    class="w-full aspect-square object-cover cursor-pointer"
                    wire:click="increment"
                    style="transform: rotate({{ $rotation }}deg) scale(1);
                           transition: transform 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
                           transform-origin: center center;
                           will-change: transform;"
                    onmouseover="this.style.transform = 'rotate({{ $rotation }}deg) scale(1.02)'"
                    onmouseout="this.style.transform = 'rotate({{ $rotation }}deg) scale(1)'"
                />
            @endforeach
        </div>
    </x-container>
</div>
