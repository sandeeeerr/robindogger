<div>
    <x-hero title="About" />

    <x-container>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 mb-14">
            <div class="text-xl font-light text-gray-700 dark:text-gray-300">
                Hi, I'm Robin Dogger, a 23-year-old designer based in Leeuwarden. I specialize in Graphic & Motion Design. With a passion for bold and colorful visuals, dynamic motion, and thoughtful typography, I aim to create impactful and creative solutions that bring ideas to life.
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @for ($i = 0; $i < $count; $i++)
                <img
                    src="{{ asset('assets/ik.JPG') }}"
                    class="w-full aspect-square object-cover cursor-pointer"
                    wire:click="increment"
                />
            @endfor
        </div>
    </x-container>
</div>
