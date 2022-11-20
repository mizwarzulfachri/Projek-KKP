<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @can('user_access')
              <div class="block mb-8">
                  <a href="{{ route('program.create') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Tambah Program</a>
              </div>
            @endcan
          <br/>

          @foreach ($program as $program)
            <div class="group block max-w-xs mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
              <a href="" class="">{{ $program->tahun }}</a>
                </br>
                @can('user_access')
                  <td style="display: block; clear: both; height: 1px;">
                    <a href="{{ route('program.show', $program->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Show</a>
                    <a href="{{ route('program.edit', $program->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Edit</a> 
                    <form class="inline-block" action="{{ route('program.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Apakah tentu mau dihapus?');">
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                    </form>
                  </td>
                @endcan
              </a>
            </div>
          <br/>
          @endforeach

          @empty($program)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <td colspan="2" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                {{ __('Tidak ada program') }}
              </td>
            </tr>
          @endempty      
        </div>
    </div>
</x-app-layout>