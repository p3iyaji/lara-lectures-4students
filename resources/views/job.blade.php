<x-layout>

    <x-slot:heading>Selected Job</x-slot>
        <div>
            <ul>
               
              <h1>Job Position: <span class="font-semibold text-md">{{ $job->title }} </span>
              <h2>Employer: <span class="font-semibold text-md">{{ $job->employer->name }}</span></h2>
                    <h3>This job pays: <span class="text-green-600 font-semibold">{{ $job->salary }}</span></h3>
            </ul>
        </div>

</x-layout>