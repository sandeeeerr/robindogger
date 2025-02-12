<div>
    <x-hero title="About" />

    <x-container>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <div class="text-xl font-light text-gray-700 dark:text-gray-300">
                Hi, I'm Robin Dogger, a 23-year-old designer based in Leeuwarden. I specialize in Graphic & Motion Design. With a passion for bold and colorful visuals, dynamic motion, and thoughtful typography, I aim to create impactful and creative solutions that bring ideas to life.
                <h2 class="mb-2 mt-8 text-xl font-light text-gray-700 dark:text-gray-300">Robin Counter</h2>
                <div class="flex items-center gap-4 mb-4">
                    <button
                        wire:click="decrement"
                        class="px-3 py-1 text-xl font-light text-gray-700 border border-gray-700 rounded hover:bg-gray-100 dark:text-gray-300 dark:border-gray-300 dark:hover:bg-gray-800"
                    >
                        -
                    </button>
                    <span class="text-xl font-light text-gray-700 dark:text-gray-300">
                        {{ $count }}
                    </span>
                    <button
                        wire:click="increment"
                        class="px-3 py-1 text-xl font-light text-gray-700 border border-gray-700 rounded hover:bg-gray-100 dark:text-gray-300 dark:border-gray-300 dark:hover:bg-gray-800"
                    >
                        +
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @for ($i = 0; $i < $count; $i++)
                    <img
                        src="{{ asset('assets/ik.JPG') }}"
                        class="w-full aspect-square object-cover"
                    />
                @endfor
            </div>
            <div></div>
        </div>
    </x-container>
</div>
