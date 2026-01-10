<x-layout>
    <x-slot:heading>Edit job</x-slot>

        <form method="POST" action="/jobs/{{ $job->id }}">
            @csrf
            @method('PATCH')

            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Job title</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">Enter position</div>
                                    <input 
                                    id="title" 
                                    type="text" 
                                    name="title" 
                                    value="{{ $job->title }}"
                                    class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required />

                                </div>
                                @error('title')
                                <p class="text-red-500 text-sm font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">Enter salary</div>
                                    <input 
                                    id="salary" 
                                    type="text" 
                                    name="salary" 
                                    value="{{ $job->salary }}"
                                    class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required />
                                </div>
                                @error('salary')
                                <p class="text-red-500 text-sm font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                    @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                        <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>


            </div>

            <div class="flex justify-between gap-x-6 items-center">
                <div>
                    <button form="delete-form" class="bg-red-500 text-white rounded-md py-2 px-3 font-semibold">Delete</button>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs/{{ $job->id }}" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
            </div>
        </form>


        <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
</x-layout>