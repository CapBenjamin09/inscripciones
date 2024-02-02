<x-layouts.app-layout>

    <div class="container mx-1 p-2 px-8 py-10 rounded-lg bg-white shadow-xl">

        <div class="uppercase tracking-wide px-6 text-lg text-blue-500 font-semibold">HORARIO DE CLASE</div>

        <form class="max-w-3xl mx-auto" method="POST" action="{{ route('schedules.store') }}">
        <div class="max-w-xl mx-auto mt-16 mb-16 flex w-full flex-col border rounded-lg bg-white p-8">
            <h2 class="title-font mb-1 text-lg font-medium text-gray-900">Crear formulario</h2>
            <p class="mb-5 leading-relaxed text-gray-600">Agrega los datos solicitados para crearlo
            </p>

                @csrf
            <div class="mb-4">
                <label for="title" class="text-sm leading-7 text-gray-600">Titulo</label>
                <input type="text" id="title" name="title" class="w-full rounded border border-gray-300 bg-white py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
            </div>
            <div class="mb-4">
                <label for="degree" class="text-sm leading-7 text-gray-600">Grado o Docente</label>
                <input type="text" id="degree" name="degree" class="w-full resize-none rounded border border-gray-300 bg-white py-2 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
            </div>
            <button type="submit" class="rounded border-0 bg-indigo-500 py-2 my-2 px-6 text-lg text-white hover:bg-indigo-600 focus:outline-none">
                Guardar
            </button>
        </div>
    </form>

        <div class="mx-5 mr-3">
            <a href="{{ route('schedules.index') }}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Regresar
            </a>
        </div>

    </div>

</x-layouts.app-layout>
