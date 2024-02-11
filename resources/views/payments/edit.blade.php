<x-layouts.app-layout>

    <div class="container p-2 px-10 py-10 rounded-lg bg-white shadow-xl">

        <div class="flex justify-center py-10">
            <img class="shadow-md w-20 h-20 p-2 rounded-2xl ring-2 ring-gray-300 bg-sky-200" src="{{ asset('img/add_inscription.png') }}" alt="Bordered avatar">
            <p class="items-center text-5xl py-4 px-2 font-bold">&nbsp; Editar mensualidad</p>
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

        <form class="max-w-lg mx-auto pt-5" action="{{ route('payments.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="flex items-center justify-center px-8">
                <!-- Author: FormBold Team -->
                <div class="mx-auto w-full max-w-[550px] bg-white">

                    @include('payments.form')

                    <div class="py-3 flex justify-between">
                        <div class="px-5">
                            <button type="submit" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 w-32 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                                Guardar </button>
                        </div>
                        <div class="px-5">
                            <a href="{{ route('payments.index') }}">
                                <button type="button" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 w-32 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">
                                    Regresar </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script>
        $('#student_id').select2();

        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };


    </script>

    @push('scripts-registrations')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush

</x-layouts.app-layout>
