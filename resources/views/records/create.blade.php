<x-layouts.app-layout>
    <div class="container mx-1 p-2 px-8 py-10 rounded-lg bg-white shadow-xl">

        <div class="uppercase tracking-wide px-6 text-lg text-blue-500 font-semibold">Agregar expediente a alumno</div>


            <div class="max-w-xl mx-auto mt-16 mb-16 flex w-full flex-col border rounded-lg bg-white p-8">
                <h2 class="title-font mb-1 text-lg font-medium text-gray-900">Agregar archivo</h2>
                <p class="mb-5 leading-relaxed text-gray-600">Agrega los datos solicitados para añadir un archivo al expediente del alumno.
                </p>
                <form class="max-w-3xl mx-auto" method="POST" action="{{ route('records.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="text-sm leading-7 text-gray-600">Alumno</label>
                        <br>
                        <select name="student_id" id="student_id"
                                class="w-full">
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->student_personal_code . ' ' . strtoupper($student->name)  . ' ' . strtoupper($student->lastname) }}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="name" class="text-sm leading-7 text-gray-600">Nombre del archivo</label>
                        <input type="text" value="{{ old('name') }}" id="name" name="name" class="w-full rounded border border-gray-300 bg-white py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200" />
                        @error('name')
                        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="file_record" class="text-sm leading-7 text-gray-600">Archivo</label>
                        <div class="flex items-center space-x-6">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" onchange="loadFile(event)" name="fileRecord" value="{{ old('fileRecord') }}" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-violet-100
                                  "/>
                            </label>
                        </div>
                        @error('fileRecord')
                        <p class="text-red-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="rounded border-0 bg-indigo-500 py-2 my-2 px-6 text-lg text-white hover:bg-indigo-600 focus:outline-none">
                        Guardar
                    </button>
                </form>
            </div>

        <div class="mx-5 mr-3">
            <a href="{{ route('students.index') }}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Regresar
            </a>
        </div>

    </div>

    @push('scripts-registrations')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @endpush

    <script>
        $('#student_id').select2();
    </script>
</x-layouts.app-layout>
