<x-layouts.app-layout>

    <div class="container mx-auto py-4 rounded-lg my-8 bg-white px-4 shadow">

        @if(session('status'))
            <div class="flex justify-start px-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="p-3 pt-8 grid grid-cols-6 gap-4">
            <h1 class="text-5xl font-bold text-sky-600 text-center my-4">Grados</h1>
            <div class="col-end-7 col-span-1 px-5 py-4">
                <div class=" cursor-pointer my-auto">
                    <a  href="{{ route('degree.create') }}" class="text-white my-auto text-center cursor-pointer bg-sky-800 hover:bg-sky-600 focus:ring-4 focus:ring-sky-300 font-medium rounded-md text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Agregar</a>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 rounded-xl mt-8 mb-5 sm:px-6 lg:px-8 py-8">
            <table id="example" class="table-auto w-full pt-8">
                <thead>
                <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($degrees as $degree)
                    <tr>
                        <td class="border px-4 py-2">
                            <div class="flex">
                            {{ $degree->name }} &nbsp;
                            <a href="{{  route('degree.show', $degree) }}" class="text-sm items-center text-blue-400 hover:text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 items-center hover:text-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </a>
                            </div>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex flex-row">
                                <a href="{{ route('degree.edit', $degree) }}">
                                    <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                        <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 w-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                          </svg>
                                        </span>
                                    </button>
                                </a>
                                <form method="POST" action="{{route('degree.destroy', $degree)}}" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="relative align-middle px-2 select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts-datatable')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    @endpush

    @section('js')

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
            $(document).ready(function () {
                // Mostrar u ocultar el menú desplegable al hacer clic en el botón
                $('#dropdown-btn').on('click', function () {
                    $('#dropdown-menu').toggleClass('hidden');
                });

                // Ocultar el menú desplegable si se hace clic fuera de él
                $(document).on('click', function (event) {
                    if (!$(event.target).closest('#dropdown-btn').length && !$(event.target).closest('#dropdown-menu').length) {
                        $('#dropdown-menu').addClass('hidden');
                    }
                });
            });

            $(document).ready(function() {
                $('#example').DataTable({
                    // Add any customization options here
                });
            });

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
