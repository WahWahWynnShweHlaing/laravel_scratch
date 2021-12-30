@props(['heading'])
<section class="mx-auto max-w-3xl py-8">
        <h1 class="mb-6 pb-2 border-b">Public New Post</h1>
        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="mb-6 font-semibold">Links</h4>
                <ul>
                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : ''}}">All Post</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">New Post</a>
                    </li>
                </ul>
            </aside>
            <main class="flex1">
                <x-panel>
                {{ $slot }}
                </x-panel>
            </main>
        </div>
    </section>