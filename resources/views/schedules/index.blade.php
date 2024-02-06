<x-layouts.app-layout>

    {{--BANER--}}

    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden pt-8">
        <div class="md:flex">
            <div class="p-8">

{{--                PRIMER BLOQUE--}}
                <div class="px-5">
                    <div class="relative mb-5">
                        <div class="uppercase tracking-wide text-lg text-blue-500 font-semibold">HORARIOS DE CLASE</div>
                    </div>
                </div>

{{--                SEGUNDO BLOQUE--}}
                <div class="px-5 grid grid-cols-6 gap-10">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative mt-1 col-start-1 col-end-3">
                        <form action="{{ route('schedules.index') }}" method="get" class="flex justify-between">
                            @csrf
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" name="search" value="{{ $search }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Búsqueda por grado o docente"/>
                        </form>
                    </div>

                    <div class="col-end-7 col-span-2 px-5">

                        <div class="relative inline-block text-left mx-4">
                            <button id="dropdown-btn" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 relative z-10">
                                Selecciona una opción
                                <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 5.293a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 7.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div id="dropdown-menu" class="hidden origin-top-right absolute right-30 mt-2 w-62 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-btn">
                                <a href="{{ route('schedules.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Agregar horario por grado o docente</a>
                                <a href="{{ route('scheduleDetails.create') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Agregar curso a horario</a>
                                <a href="{{ route('scheduleDetails.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Ver todos los cursos agregados</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="flex flex-col justify-center antialiased  text-gray-600 p-4 py-8">

        @foreach($schedules as $schedule)

    <div class="h-full pt-4">
        <!-- Card -->
        <div class="max-w-5xl mx-auto bg-blue-700 shadow-lg rounded-lg">
            <div class="px-6 py-5">
                <div class="flex items-start">
                    <!-- Icon -->
                    <img width="35" height="35" src="https://img.icons8.com/fluency/48/timetable.png" alt="timetable"/>
                    <!-- Card content -->
                    <div class="flex-grow truncate">
                        <!-- Card header -->
                        <div class="w-full sm:flex justify-between items-center mb-3">
                            <!-- Title -->
                            <h2 class="text-2xl leading-snug font-extrabold text-gray-50 truncate mx-5 mb-1 sm:mb-0">
                                {{$schedule->title}}</h2>
                            <!-- Like and comment buttons -->
                            <div class="flex-shrink-0 flex items-center space-x-3 sm:ml-2">
                                <a href="{{ route('schedules.edit', $schedule) }}">
                                <button type="submit" class="flex items-center text-left text-sm font-medium text-indigo-100 hover:text-white group focus:outline-none focus-visible:border-b focus-visible:border-indigo-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 flex-shrink-0 text-gray-300 group-hover:text-gray-200">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </button>
                                </a>
                                <form method="POST" action="{{route('schedules.destroy', $schedule)}}" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="flex items-center text-left text-sm font-medium text-indigo-100 hover:text-white group focus:outline-none focus-visible:border-b focus-visible:border-indigo-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                                <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                </form>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="flex items-center justify-between whitespace-normal">
                            <!-- Paragraph -->
                            <div class="max-w-md text-indigo-100">
                                <p class="mb-1 mx-5">{{$schedule->assignment}}</p>
                            </div>
                            <!-- More link -->
                            <a href="{{ route('schedules.show', $schedule->id) }}" class="flex-shrink-0 flex items-center justify-center text-indigo-600 w-10 h-10 rounded-full bg-gradient-to-b from-indigo-50 to-indigo-100 hover:from-white hover:to-indigo-50 focus:outline-none focus-visible:from-white focus-visible:to-white transition duration-150 ml-2" >
                                <span class="block font-bold"><span class="sr-only">Ver</span> -></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @endforeach

            <div class="my-8 flex justify-center">
                {{$schedules->links()}}
            </div>
</section>

{{--    Funciones js--}}
    @section('js')

{{--        Dropdown (para lista de opciones)--}}

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
        </script>

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
