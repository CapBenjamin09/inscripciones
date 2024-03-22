<x-layouts.app-layout>
    <div class="container px-10 pt-8 pb-16 my-14 mx-auto bg-white shadow-xl">
        <div class="flex justify-center py-10">
            <img class="shadow-md w-20 h-20 p-2 rounded-2xl ring-2 ring-gray-300 bg-sky-200" src="{{ asset('img/graduacion.png') }}" alt="Bordered avatar">
            <h1 class="text-5xl font-bold text-black text-center my-4">&nbsp; Información del estudiante</h1>
        </div>
        <div class="flex">
            <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow mr-6">
                <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                    <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Información Personal</h1>
                </div>
                <div>
                    <div class="p-4 bg-white rounded-lg md:p-8">
                        <!-- List -->
                        <ul role="list" class="space-y-3 text-gray-500">
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">CUI:</span><p class="font-semibold text-gray-400">{{ $student->cui }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Código:</span><p class="font-semibold text-gray-400">{{ $student->student_personal_code }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Nombre completo:</span><p class="font-semibold text-gray-400">{{ $student->name . ' ' . $student->lastname }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Fecha de nacimiento:</span><p class="font-semibold text-gray-400">{{ $student->birthdate }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Dirección:</span><p class="font-semibold text-gray-400">{{ $student->address }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow mr-6">
                <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                    <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Información Adicional</h1>
                </div>
                <div>
                    <div class="p-4 bg-white rounded-lg md:p-8">
                        <!-- List -->
                        <ul role="list" class="space-y-3 text-gray-500">
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Estado del Estudiante:</span><p class="font-semibold text-gray-400 uppercase">{{ $student->status_student }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Grado actual del estudiante:</span><p class="font-semibold text-gray-400">{{ $student->degree->name }}</p>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Información de Encargado</h1>
            </div>
            <div>
                <div class="p-4 bg-white rounded-lg md:p-8">
                    <!-- List -->
                    <ul role="list" class="space-y-3 text-gray-500">
                        <li class="flex space-x-2 rtl:space-x-reverse items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                            <span class="leading-tight font-semibold text-gray-500">Encargado:</span><p class="font-semibold text-gray-400">{{ $student->incharge }}</p>
                        </li>
                        <li class="flex space-x-2 rtl:space-x-reverse items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                            <span class="leading-tight font-semibold text-gray-500">Teléfono de Encargado:</span><p class="font-semibold text-gray-400">{{ $student->phone_incharge }}</p>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        </div>
{{--   EXPEDIENTE     --}}
        <div>
            <div class="my-6">
                <h1 class="text-5xl font-bold text-black text-center my-4">Expediente</h1>
            </div>

            <div class="p-1 flex flex-wrap items-center justify-center">
                @if($records->first() != null)
                    @foreach($records as $record)
                    <div class="flex-shrink-0 m-6 relative overflow-hidden bg-gray-500 border h-84 w-1/3 rounded-lg shadow-lg">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                             style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
                        </svg>
                        <div class="relative pt-10 px-10 flex items-center justify-center">
                            <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                                 style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                            </div>
                            @if(pathinfo($record->file, PATHINFO_EXTENSION) == 'pdf')
                                <img class="relative w-40 " src="{{ asset('img/pdf.png') }}" alt="">
                            @else
                                <img class="relative w-40 h-44 rounded-lg" src="{{ asset($record->file) }}" alt="">
                            @endif
                        </div>
                        <div class="relative text-white px-6 pb-6 mt-6">
                            <span class="block opacity-75 -mb-1">{{ \Carbon\Carbon::parse($record->created_at)->format('Y') }}</span>
                            <div class="flex justify-between">
                                <span class="block font-semibold text-xl">{{ $record->name }}</span>

                            </div>
                            <div class="flex justify-center">
                                <a href="{{ route('students.show-file', ['student' => $student, 'record' => $record]) }}" class="block mt-4 w-32 justify-center bg-gray-900 rounded-xl text-white hover:bg-gray-700 text-xs font-bold px-3 py-2 leading-none flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    &nbsp; Ver más
                                </a>
                                <form class="ml-4 formulario-eliminar" action="{{ route('records.destroy', $record) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="block mt-4 w-32 justify-center bg-red-600 rounded-xl text-white text-xs font-bold px-3 hover:bg-red-500 py-2 leading-none flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        &nbsp; Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p class="mt-16">No hay archivos para mostrar</p>
                @endif
            </div>

        </div>

        <div class="mt-8 flex flex-row-reverse">
            <a href="{{ route('students.index')  }}">
            <div class="bg-blue-500 w-30 h-12 flex rounded-lg align-middle text-center text-white items-center p-2.5 my-auto hover:bg-blue-600 border-red-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                    <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg>
                <p class="mb-0.5">Regresar</p>
            </div>
            </a>
        </div>
    </div>

    @section('js')

        @if(session('eliminar') == 'ok')
            <script>
                Swal.fire({
                    title: "¡Eliminado!",
                    text: "El archivo se eliminó con éxito.",
                    icon: "success"
                });
            </script>
        @endif
        <script>

            $('.formulario-eliminar').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "¿Está seguro?",
                    text: "El archivo se eliminará de manera permanente!",
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
