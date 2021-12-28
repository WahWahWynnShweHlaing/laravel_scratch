<x-dropdown>
        <x-slot name="trigger">
            <button @click="show = true" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 inline-flex">
                    {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}
                    <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
            </button>
        </x-slot>

        <div x-show="show" class="py-2 absolute z-50" style="display : none">
            <x-dropdown-item href="/" :active="request()->routeIs('home')">
                ALL
            </x-dropdown-item>
                    @foreach($categories as $category)
                        <x-dropdown-item href="/?category={{ $category->slug }}"
                            :active='request()->is("/categories/{$category->slug}")'>
                            {{ ucwords($category->name)}}
                        </x-dropdown-item>
                    @endforeach
        </div>
</x-dropdown>