@props(['active' => false])


<a class="{{  $active ? 'bg-gray-900 text-white px-3 py-1 rounded-md' : 
'text-gray-300 hover:bg-white/5 hover:text-white px-3 py-1 text-sm font-medium rounded-md' }}"
 aria-current="{{ $active ? 'true' : 'false' }}" {{ $attributes }}>
{{ $slot }}
</a>
