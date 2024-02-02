<x-layouts.app-layout>
<!-- component -->

    <div class="container p-2 px-10 py-8 mx-auto bg-white shadow-xl">
        <h1 class="text-5xl font-bold text-black text-center my-4">Usuarios</h1>
        @if(session('status'))
            <div class="flex justify-start px-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="p-3 pt-8 grid grid-cols-6 gap-4">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1 col-start-1 col-end-3">
                <form action="{{ route('users.index') }}" method="get" class="flex justify-between">
                    @csrf
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search" name="search" value="{{ $search }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5" placeholder="Search for items"/>
                </form>
            </div>

            <div class="col-end-7 col-span-1 px-5 py-1">
                <a href="{{ route('users.create') }}">
                <button type="submit" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                    Agregar </button>
                </a>
            </div>
        </div>

    <div class="p-6 px-0">
        <table class="mt-4 w-full min-w-max table-auto text-left">
            <thead>
            <tr>
                <th class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Nombre
                    </p>
                </th>
                <th class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Correo
                    </p>
                </th>
                <th class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Creación
                    </p>
                </th>
                <th class="cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 p-4 transition-colors hover:bg-blue-gray-50">
                    <p class="antialiased font-sans text-sm text-blue-gray-900 flex items-center justify-between gap-2 font-normal leading-none opacity-70">
                        Acciones</p>
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
            <tr>

                <td class="p-4 border-b border-blue-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="flex flex-col">
                            <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                                {{$user->name}}</p>
                        </div>
                    </div>
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                    <div class="flex flex-col">
                        <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal opacity-70">
                            {{$user->email}}</p>
                    </div>
                </td>

                <td class="p-4 border-b border-blue-gray-50">
                    <p class="block antialiased font-sans text-sm leading-normal text-blue-gray-900 font-normal">
                        {{$user->created_at->diffForHumans()}}</p>
                </td>
                <td class="p-4 border-b border-blue-gray-50">
                    <div class="flex flex-row">
                        <a href="{{ route('users.edit', $user) }}">
                            <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                  </svg>
                                </span>
                            </button>
                        </a>
                        <form method="POST" action="{{route('users.destroy', $user)}}" class="formulario-eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                                <svg class="w-5 h-5 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
        <div class="my-8">
            {{$users->links()}}
        </div>
    </div>

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

