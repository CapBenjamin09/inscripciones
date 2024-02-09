<x-layouts.app-layout>

    {{--BANER--}}

    <div class="max-w-8xl mx-auto bg-white rounded-xl shadow-md overflow-hidden pt-8">
        <div class="md:flex">
            <div class="p-8">

                <div class="p-5 pt-5 grid grid-cols-6 gap-4">
                    <div class="relative mt-1 col-start-1 col-end-3">
                        <div class="uppercase tracking-wide px-5 text-lg text-blue-500 font-semibold">HORARIOS DE CLASE</div>
                    </div>

                    <div class="col-end-8 col-span-1 px-5 py-1">
                        <a href="{{ route('scheduleDetails.create') }}">
                            <button type="submit" class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                Agregar </button>
                        </a>
                    </div>
                    <div class="pl-8">
                        <a href="{{ route('schedules.index') }}" class="inline-flex items-end px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            Regresar
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

{{--    DATA TABLE--}}
    <div class="container mx-auto px-6 rounded-xl shadow-md mt-8 mb-5 sm:px-6 lg:px-8 py-8 bg-white">

            @if(session('status'))
                <div class="flex justify-center px-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    {{ session('status') }}
                </div>
            @endif

        <table id="example" class="table-auto w-full pt-8">
            <thead>
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hora</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Curso</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Día</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Docente</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asignación de horario</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $schedulesDetails as $schedulesDetail )
                <tr>
                <td class="border px-4 py-2">
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
                <td class="border px-4 py-2">{{ $schedulesDetail->course }}</td>
                <td class="border px-4 py-2">{{ $schedulesDetail->day }}</td>
                <td class="border px-4 py-2">{{ $schedulesDetail->teacher }}</td>
                <td class="border px-4 py-2">{{ $schedulesDetail->degree }}</td>
                <td class="border px-4 py-2">{{ $schedulesDetail->schedule->assignment}}</td>
                    <td class="border px-4 py-2 text-md">
                        <a href="{{ route('scheduleDetails.edit', $schedulesDetail->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form method="POST" action="{{route('scheduleDetails.destroy', $schedulesDetail)}}" class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    {{--            Librerías--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                // Add any customization options here
            });
        });
    </script>

    @section('js')
    {{--            Alerta confirmación para eliminar un registro--}}
    @if(session('eliminar') == 'ok')
        <script>
            Swal.fire({
                title: "¡Eliminado!",
                text: "El registro se eliminó con éxito.",
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
