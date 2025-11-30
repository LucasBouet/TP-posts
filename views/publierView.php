<main class="max-w-3xl mx-auto mt-16 p-6">
    <div class="bg-white/80 backdrop-blur-lg shadow-xl rounded-2xl p-8 border border-blue-100">

        <h2 class="text-2xl font-bold text-blue-700 mb-6">Publier un post</h2>

        <form method="POST" action="/publier" enctype="multipart/form-data" class="flex flex-col gap-6">
            <input type="hidden" name="csrf" value="<?= $csrfToken ?>">

            <div class="flex flex-col gap-2">
                <label for="image" class="text-sm font-medium text-slate-700">Image</label>
                <input type="file" id="image" name="image" required
                       class="block w-full border border-blue-200 bg-blue-50/50 rounded-xl p-3 text-sm file:bg-blue-500 file:text-white file:border-none file:px-4 file:py-2 file:rounded-lg">
            </div>

            <div class="flex flex-col gap-2">
                <label for="title" class="text-sm font-medium text-slate-700">Titre</label>
                <input type="text" id="title" name="title" required
                       class="border border-blue-200 bg-blue-50/50 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div class="flex flex-col gap-2">
                <label for="description" class="text-sm font-medium text-slate-700">Description</label>
                <textarea id="description" name="description" rows="6"
                          class="border border-blue-200 bg-blue-50/50 rounded-xl p-3 focus:ring-2 focus:ring-blue-400 outline-none"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="cursor-pointer bg-linear-to-r from-blue-500 to-blue-400 text-white px-6 py-3 rounded-xl shadow-md hover:scale-[1.02] transition">
                    Publier
                </button>
            </div>

        </form>
    </div>
</main>
