<x-layouts.app-layout>

    <div class="container p-2 px-10 py-10 rounded-lg bg-white shadow-xl">

        <div class="flex justify-center py-10">
        <img class="shadow-md w-20 h-20 p-2 rounded-2xl ring-2 ring-gray-300 bg-sky-200" src="{{ asset('img/add_student.png') }}" alt="Bordered avatar">
        <p class="items-center text-5xl py-4 px-2 font-bold">&nbsp; Crear alumno</p>
        </div>

        @if ($errors->any())
            <div class="mx-auto w-full max-w-[550px] items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                @foreach ($errors->all() as $error)
                    <div class="flex items-center my-1">
                        <svg class=" flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Alerta!</span> {{ $error }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <form class="max-w-lg mx-auto pt-5" action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="flex items-center justify-center px-8">
                <!-- Author: FormBold Team -->
                <div class="mx-auto w-full max-w-[550px] bg-white">

                    @include('students.form')

                    <div class="py-3 flex justify-between">
                        <div class="px-5">
                            <button type="submit" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 w-32 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                Guardar </button>
                        </div>
                        <div class="px-5">
                            <a href="{{ route('students.index') }}">
                                <button type="button" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 w-32 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">
                                    Regresar </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>


</x-layouts.app-layout>
