<x-layouts.app-layout>

    {{--BANER--}}

    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden pt-8">
        <div class="md:flex">
            <div class="p-8">
                <div class="uppercase tracking-wide px-5 text-lg text-blue-500 font-semibold">HORARIOS DE CLASE</div>

                <div class="p-5 pt-5 grid grid-cols-6 gap-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1 col-start-1 col-end-3">
                        <form action="{{ route('scheduleDetails.index') }}" method="get" class="flex justify-between">
                            @csrf
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="search" name="search" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Search for items"/>
                        </form>
                    </div>

                    <div class="col-end-7 col-span-1 px-5 py-1">
                        <a href="{{ route('scheduleDetails.create') }}">
                            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                Agregar </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    TABLA DE DATOS--}}
    <div class="px-6 py-5">
        <table class="min-w-full divide-y divide-gray-200 overflow-x-auto p-5">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Hora
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Curso
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Día
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Docente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Grado o Docente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">

            @foreach( $schedulesDetails as $schedulesDetail )
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $schedulesDetail->hour }}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $schedulesDetail->course }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $schedulesDetail->day }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $schedulesDetail->teacher }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $schedulesDetail->schedule->degree}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                        <a href="{{ route('scheduleDetails.edit', $schedulesDetail->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form method="POST" action="{{route('scheduleDetails.destroy', $schedulesDetail)}}" class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach


            <!-- More rows... -->

            </tbody>
        </table>
    </div>

    <div class="mx-5 mr-3 grid grid-cols-6 gap-10">
        <div class="mx-8 col-start-1 col-end-4">
            {{$schedulesDetails->links()}}
        </div>
        <div class="col-end-7 col-span-2 pl-8">
        <a href="{{ route('schedules.index') }}" class="inline-flex items-end px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            Regresar
        </a>
        </div>
    </div>

{{--    BLOQUES--}}
    <section id="features" class="container mx-auto px-4 space-y-6 bg-slate-50  md:py-8 lg:py-8">

        <div class="mx-auto grid justify-center gap-4 sm:grid-cols-2 md:max-w-[64rem] md:grid-cols-3">

            <div
                class="relative overflow-hidden rounded-lg border-2 border-blue-700 bg-white select-none hover:shadow hover:shadow-blue-400 p-2">
                <div class="flex h-[180px] flex-col items-center rounded-md p-6">
                    <img src="{{ asset('img/lunes.png') }}" class="h-24 w-24">
                    <div class="space-y-2">
                        <h3 class="font-bold px-2">Lunes</h3>
                    </div>
                </div>

            </div>
            <div
                class="relative overflow-hidden rounded-lg border-2 border-blue-700 bg-white select-none hover:shadow hover:shadow-blue-400 p-2">
                <div class="flex h-[180px] flex-col items-center rounded-md p-6">
                    <img src="{{ asset('img/martes.png') }}" class="h-24 w-24">
                    <div class="space-y-2">
                        <h3 class="font-bold px-2">Martes</h3>
                    </div>
                </div>

            </div>
            <div
                class="relative overflow-hidden rounded-lg border-2 border-blue-700 bg-white select-none hover:shadow hover:shadow-blue-400 p-2">
                <div class="flex h-[180px] flex-col items-center rounded-md p-6">
                    <img src="{{ asset('img/miercoles.png') }}" class="h-24 w-24">
                    <div class="space-y-2">
                        <h3 class="font-bold px-2">Miércoles</h3>
                    </div>
                </div>

            </div>
            <div
                class="relative overflow-hidden rounded-lg border-2 border-blue-700 bg-white select-none hover:shadow hover:shadow-blue-400 p-2">
                <div class="flex h-[180px] flex-col items-center rounded-md p-6">
                    <img src="{{ asset('img/jueves.png') }}" class="h-24 w-24">
                    <div class="space-y-2">
                        <h3 class="font-bold px-2">Jueves</h3>
                    </div>
                </div>

            </div>
            <div
                class="relative overflow-hidden rounded-lg border-2 border-blue-700 bg-white select-none hover:shadow hover:shadow-blue-400 p-2">
                <div class="flex h-[180px] flex-col items-center rounded-md p-6">
                    <img src="{{ asset('img/viernes.png') }}" class="h-24 w-24">
                    <div class="space-y-2">
                        <h3 class="font-bold px-2">Viernes</h3>
                    </div>
                </div>

            </div>

        </div>
    </section>

    @section('js')
    {{--            Alerta confirmación para eliminar un registro--}}
    @if(session('eliminar') == 'ok')
        <script>
            Swal.fire({
                title: "¡Eliminado!",
                text: "El usuario se eliminó con éxito.",
                icon: "success"
            });
        </script>
    @endif
    <script>

        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: "¿Está seguro?",
                text: "El usuario se eliminará de manera permanente!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            });
        });

    </script>
    @endsection

</x-layouts.app-layout>
