<x-layout>

    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto bg-gray-100 p-6 rounded-xl'>
            <h1 class="text-center text-bold text-xl">Register!</h1>
            <form method='POST' action="/register" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase fond-bold text-xs text-gray-700" for="name">Name
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="name"  id="name" required>

                    <label class="block mb-2 uppercase fond-bold text-xs text-gray-700" for="username">UserName
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="text" name="username"  id="username" required>

                    <label class="block mb-2 uppercase fond-bold text-xs text-gray-700" for="email">Email
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="email" name="email"  id="email" required>

                    <label class="block mb-2 uppercase fond-bold text-xs text-gray-700" for="password">Password
                    </label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password"  id="password" required>

                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-600 text-white rounded py-2 px-4">Submit</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>