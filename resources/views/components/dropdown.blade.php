@props(['trigger'])
<div x-data="{ show : false}" @click.away="show = false" class="relative">
        {{-- Trigger --}}
            <div @click="show = ! show">
                {{ $trigger }}
            </div>
        {{-- Links --}}
        <div x-show="show" class="py-2 absolute z-50 max-h-52" style="display : none">
            {{$slot}}
        </div>
</div>