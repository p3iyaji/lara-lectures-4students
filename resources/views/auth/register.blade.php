<x-layout>
    <x-slot:heading>Register new user</x-slot>

        <form method="post" action="/register">
            @csrf
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base/7 font-semibold text-gray-900">Profile</h2>
                    <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <x-form-field>
                            <x-form-label for="name">First name</x-form-label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">Enter name</div>
                                    <x-form-input id="name" type="text" name="name" placeholder="CEO"></x-form-input>
                                </div>
                                <x-form-error name="name" />
                            </div>
                        </x-form-field>
                      
                        <x-form-field>
                            <x-form-label for="email">Email</x-form-label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">Email</div>
                                    <x-form-input id="email" name="email" placeholder="email" />
                                </div>
                                <x-form-error name="email" />
                            </div>
                        </x-form-field>
                         <x-form-field>
                            <x-form-label for="password">Password</x-form-label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">Enter password</div>
                                    <x-form-input id="password" name="password" placeholder="password" type="password" />
                                </div>
                                <x-form-error name="password" />
                            </div>
                        </x-form-field>
                        <x-form-field>
                            <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                            <div class="mt-2">
                                <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                    <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">Confirm password</div>
                                    <x-form-input id="password_confirmation" name="password_confirmation" type="password" placeholder="password_confirmation" />
                                </div>
                                <x-form-error name="password_confirmation" />
                            </div>
                        </x-form-field>
                    </div>
                    
                </div>


            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <x-form-button type="submit">Register</x-form-button>
                </div>
        </form>

</x-layout>