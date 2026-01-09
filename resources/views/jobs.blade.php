<x-layout>

    <x-slot:heading>Jobs</x-slot>
        <div>
            <ul>
                @foreach ($jobs as $job)
                <a href="/jobs/{{ $job['id'] }}"><li> <span class="font-semibold text-md text-blue-300">{{ $job['title'] }}: </span>
                    <span class="text-sm">Pays {{ $job['salary'] }}</span> per year
                </li></a>
                @endforeach
            </ul>
        </div>

</x-layout>