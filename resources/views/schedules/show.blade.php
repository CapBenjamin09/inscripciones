<x-layouts.app-layout>

    {{--BANER--}}

    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-md overflow-hidden pt-8">
            <div class="p-8">


                <div class="p-5 pt-5 grid grid-cols-6 gap-4">
                    <div class="relative mt-1 col-start-1 col-end-3">
                        <div class="uppercase tracking-wide px-5 text-lg text-blue-500 font-semibold">{{ $schedule->assignment }}</div>
                    </div>

                    <div class="col-end-7 col-span-1 px-5 py-1">
                        <a href="{{ route('schedules.index') }}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                            </svg>
                            Regresar
                        </a>
                    </div>

                </div>

            </div>
    </div>

{{--    Inicio de tabla--}}

    <div class="flex flex-wrap mb-10">
    <div class="border border-blue-700 bg-white rounded-lg overflow-hidden shadow-xl max-w-sm mx-auto mt-16">
        <p class="py-2 text-center text-xl bg-blue-800 text-gray-50">
            Lunes
        </p>
        <table class="w-full text-sm leading-5">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Hora</th>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Curso</th>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Grado</th>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Docente</th>
            </tr>
            </thead>
            <tbody>

            @foreach($mondays as $monday)
            <tr>
                <td class="py-3 px-4 text-left font-medium ">{{ $monday->hour }}</td>
                <td class="py-3 px-4 text-left ">{{ $monday->course }}</td>
                <td class="py-3 px-4 text-left ">{{ $monday->degree }}</td>
                <td class="py-3 px-4 text-left ">{{ $monday->teacher }}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="border border-blue-700 bg-white rounded-lg overflow-hidden shadow-xl max-w-sm mx-auto mt-16">
        <p class="py-2 text-center text-xl bg-blue-800 text-gray-50">
            Martes
        </p>
        <table class="w-full text-sm leading-5">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Hora</th>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Curso</th>
                <th class="py-3 px-4 text-left font-medium text-gray-600">Docente</th>
            </tr>
            </thead>
            <tbody>

            @foreach($tuesdays as $tuesday)
                <tr>
                    <td class="py-3 px-4 text-left font-medium text-gray-600">{{ $tuesday->hour }}</td>
                    <td class="py-3 px-4 text-left">{{ $tuesday->course }}</td>
                    <td class="py-3 px-4 text-left">{{ $tuesday->teacher }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

        <div class="border border-blue-700 bg-white rounded-lg overflow-hidden shadow-xl max-w-sm mx-auto mt-16">
            <p class="py-2 text-center text-xl bg-blue-800 text-gray-50">
                Miércoles
            </p>
            <table class="w-full text-sm leading-5">
                <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Hora</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Curso</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Docente</th>
                </tr>
                </thead>
                <tbody>

                @foreach($wednesdays as $wednesday)
                    <tr>
                        <td class="py-3 px-4 text-left font-medium text-gray-600">{{ $wednesday->hour }}</td>
                        <td class="py-3 px-4 text-left">{{ $wednesday->course }}</td>
                        <td class="py-3 px-4 text-left">{{ $wednesday->teacher }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="border border-blue-700 bg-white rounded-lg overflow-hidden shadow-xl max-w-sm mx-auto mt-16">
            <p class="py-2 text-center text-xl bg-blue-800 text-gray-50">
                Jueves
            </p>
            <table class="w-full text-sm leading-5">
                <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Hora</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Curso</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Docente</th>
                </tr>
                </thead>
                <tbody>

                @foreach($thursdays as $thursday)
                    <tr>
                        <td class="py-3 px-4 text-left font-medium text-gray-600">{{ $thursday->hour }}</td>
                        <td class="py-3 px-4 text-left">{{ $thursday->course }}</td>
                        <td class="py-3 px-4 text-left">{{ $thursday->teacher }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="border border-blue-700 bg-white rounded-lg overflow-hidden shadow-xl max-w-sm mx-auto mt-16">
            <p class="py-2 text-center text-xl bg-blue-800 text-gray-50">
                Viernes
            </p>
            <table class="w-full text-sm leading-5">
                <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Hora</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Curso</th>
                    <th class="py-3 px-4 text-left font-medium text-gray-600">Docente</th>
                </tr>
                </thead>
                <tbody>

                @foreach($fridays as $friday)
                    <tr>
                        <td class="py-3 px-4 text-left font-medium text-gray-600">{{ $friday->hour }}</td>
                        <td class="py-3 px-4 text-left">{{ $friday->course }}</td>
                        <td class="py-3 px-4 text-left">{{ $friday->teacher }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-layouts.app-layout>
