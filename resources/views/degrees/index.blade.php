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
        <div class="mb-6 mt-2 cursor-pointer">
            <a  href="{{ route('degree.create') }}" class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Crear</a>
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
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($degrees as $degree)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $degree->name }}
                        </th>
                        <td class="px-6 py-4">
                            <b>Q.</b> {{ number_format($degree->cost_monthly, 2) }}
                        </td>
                        <td class="px-6 py-4 flex">
                            <a  href="{{ route('degree.edit', $degree->id) }}" class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Editar</a>

                            <form method="POST" action="{{ route('degree.destroy', $degree) }}" >
                                @csrf
                                @method('DELETE')
                                <button class="text-white cursor-pointer bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app-layout>
