<x-layouts.app-layout>

    <div class="container mx-auto py-4 rounded-lg my-8 bg-white px-4 shadow">
        <h1 class="text-5xl font-bold text-black text-center my-4">Grados</h1>
        @if(session('status'))
            <div class="flex justify-start px-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('status') }}
            </div>
        @elseif(session('delete'))
            <div class="flex justify-start px-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        <div class="p-3 pt-8 grid grid-cols-6 gap-4">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1 col-start-1 col-end-3">
                <form action="{{ route('degree.index') }}" method="get" class="flex justify-between">
                    @csrf
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search" name="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" value="{{ $search }}" placeholder="Search for items"/>
                    <button type="submit" class="text-white text-center cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Buscar</button>
                </form>
            </div>

            <div class="col-end-7 col-span-1 px-5 py-1">
                <div class=" mt-1 cursor-pointer">
                    <a  href="{{ route('degree.create') }}" class="text-white text-center cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Crear</a>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto border sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Costo
                    </th>
                    <th scope="col" class="px-10 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($degrees as $degree)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="p-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $degree->name }}
                        </th>
                        <td class="p-4">
                            <b>Q.</b> {{ number_format($degree->cost_monthly, 2) }}
                        </td>
                        <td class="p-4">
                            <div class="flex flex-row">
                                <a  href="{{ route('degree.edit', $degree->id) }}" class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Editar</a>

                                <form method="POST" action="{{ route('degree.destroy', $degree) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-white cursor-pointer bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="my-10">
            {{$degrees->links()}}
        </div>
    </div>
</x-layouts.app-layout>
