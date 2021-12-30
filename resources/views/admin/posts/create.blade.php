<x-layout>

   <x-setting heading="Public New Post">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.textarea name="excerpt"/>
                <x-form.textarea name="body"/>

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

                <x-form.button>Public</x-form.button>

            </form>
   </x-setting>
</x-layout>