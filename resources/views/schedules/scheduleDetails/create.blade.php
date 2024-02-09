<x-layouts.app-layout>

    <div class="container mx-1 p-2 px-8 py-10 rounded-lg bg-white shadow-xl">

        <div class="uppercase tracking-wide px-6 text-lg text-blue-500 font-semibold">Agregar curso por día y grado</div>

        <form class="max-w-3xl mx-auto" method="POST" action="{{ route('scheduleDetails.store') }}">
            @csrf

            <div class="max-w-xl mx-auto mt-16 mb-16 flex w-full flex-col border rounded-lg bg-white p-8">
                <h2 class="title-font mb-1 text-lg font-medium text-gray-900">Crear formulario</h2>
                <p class="mb-5 leading-relaxed text-gray-600">Agrega los datos solicitados para crearlo
                </p>


                <div class="mb-4">

                    <label for="day" class="text-sm leading-7 text-gray-600">
                        Día</label>
                    <select id="day" name="day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Seleccione una opción</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="degree" class="text-sm leading-7 text-gray-600">Grado o Docente</label>
                    <select id="degree" name="schedule_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($schedules as $schedule)
                        <option selected value="{{ $schedule->id }}">{{ $schedule->assignment }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="hour" class="text-sm leading-7 text-gray-600">Horario</label>
                    <input type="text" id="hour" name="hour" placeholder="Ej. 00:00 - 00:00" class="w-full resize-none rounded border border-gray-300 bg-white py-2 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    @error('hour')
                    <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="course" class="text-sm leading-7 text-gray-600">Curso</label>
                    <input type="text" id="course" name="course" class="w-full resize-none rounded border border-gray-300 bg-white py-2 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    @error('course')
                    <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                    @enderror
                </div>
                {{--                Inicia--}}
                <div class="m-4">
                    <input type="checkbox" id="mostrarCampo">
                    Agregar grado (seleccionar este campo si es un horario para docente)
                </div>

                <div class="m-4 hidden" id="campoInput">
                    <label for="dato">Ingrese dato:</label>
                    <input type="text" id="dato" name="degree" class="border rounded p-2" placeholder="(ej. 1ro Básico B)">
                    @error('degree')
                    <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                    @enderror
                </div>
                {{--                Finaliza--}}
                <div class="mb-4">
                    <label for="teacher" class="text-sm leading-7 text-gray-600">Docente</label>
                    <input type="text" id="teacher" name="teacher" class="w-full resize-none rounded border border-gray-300 bg-white py-2 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
                    @error('teacher')
                    <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="rounded border-0 bg-indigo-500 py-2 my-2 px-6 text-lg text-white hover:bg-indigo-600 focus:outline-none">
                    Guardar
                </button>
            </div>
        </form>

        <div class="mx-5 mr-3">
            <a href="{{ route('scheduleDetails.index') }}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Regresar
            </a>
        </div>

    </div>

    @section('js')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const checkbox = document.getElementById('mostrarCampo');

                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        document.getElementById('campoInput').classList.remove('hidden');
                    } else {
                        document.getElementById('campoInput').classList.add('hidden');
                    }
                });
            });

        </script>
    @endsection

</x-layouts.app-layout>
