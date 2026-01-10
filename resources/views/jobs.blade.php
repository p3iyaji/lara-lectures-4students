<x-layout>

    <x-slot:heading>Job Listings</x-slot>
        <div>
            <div class="grid grid-cols grid-cols-1 gap-2 space-x-2 lg:grid-cols-5 md:grid-cols-4">

                @foreach ($jobs as $job)
                <a class="block py-6 px-4 shadow-md rounded-md hover:bg-green-300"
                    href="/jobs/{{ $job['id'] }}">
                    <span class="font-semibold text-md text-gray-900">{{ $job['title'] }}: </span>
                        <span class="text-green-600 font-semibold text-md">{{ $job->employer->name }}</span>
                        <span class="text-sm">Pays {{ $job['salary'] }}</span> per year
                </a>
                @endforeach
            </div>
            <div class="mt-2">
                {{ $jobs->links() }}
            </div>
        </div>

</x-layout>