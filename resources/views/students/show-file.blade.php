<x-layouts.app-layout>
    <div class="container px-10 pt-8 pb-16 my-14 mx-auto bg-white shadow-xl">
        <div class="flex justify-center py-10">
            <h1 class="text-5xl font-bold text-black text-center my-4">{{ $record->name }}</h1>
        </div>

        <div class="p-1 flex flex-wrap items-center justify-center">
            @if(pathinfo($record->file, PATHINFO_EXTENSION) == 'pdf')
                <div>
                    <embed src="{{ asset( $record->file) }}" type="application/pdf" class="w-[1000px] h-[800px]">
                </div>
            @else
            <img class="relative rounded-lg w-1/2 h-auto" src="{{ asset($record->file) }}" alt="">
            @endif
        </div>
        <div class="p-1 flex flex-wrap items-center justify-center">
            <a download="" target="_blank" href="{{ asset($record->file) }}" class=" mt-4 w-32 justify-center bg-gray-900 rounded-xl text-white hover:bg-gray-700 text-xs font-bold px-3 py-2 leading-none flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                &nbsp; Descargar
            </a>
        </div>

        <div class="mt-8 flex flex-row-reverse">
            <a href="{{ route('students.show', $student)  }}">
                <div
                    class="bg-blue-500 w-30 h-12 flex rounded-lg align-middle text-center text-white items-center p-2.5 my-auto hover:bg-blue-600 border-red-300 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                         class="w-5 h-5 mr-1">
                        <path fill-rule="evenodd"
                              d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z"
                              clip-rule="evenodd"/>
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
