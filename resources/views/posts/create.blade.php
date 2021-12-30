<x-layout>

    <section class="px-6 py-8">
        <x-panel class="mx-auto max-w-sm">
            <form method="POST" action="/admin/posts">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block uppercase font-bold text-xs text-gray-700">
                        TITLE
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ old('title')}}" required>
                </div>

                <div class="mb-6">
                    <label for="slug" class="block uppercase font-bold text-xs text-gray-700">
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{ old('slug')}}" required>
                </div>

                <div class="mb-6">
                    <label for="excerpt" class="block uppercase font-bold text-xs text-gray-700">
                        Excerpt
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required>{{ old('excerpt')}}</textarea>
                </div>

                <div class="mb-6">
                    <label for="body" class="block uppercase font-bold text-xs text-gray-700">
                        Body
                    </label>
                    <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" required>{{ old('body')}}</textarea>
                </div>

                <div class="mb-6">
                    <label for="category_id" class="block uppercase font-bold text-xs text-gray-700">
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @php
                        $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ( $categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>

                        @endforeach
                    </select>
                </div>

                <x-primary-button>Public</x-primary-button>

            </form>
        </x-panel>
    </section>
</x-layout>