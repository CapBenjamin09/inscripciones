<x-layouts.app-layout>

    <div class="container p-2 px-10 py-10 bg-white rounded-lg shadow-xl">

        <div class="flex justify-center py-10">
            <img class="shadow-md w-20 h-20 p-2 rounded-2xl ring-2 ring-gray-300 bg-sky-200" src="{{ asset('img/editar.png') }}" alt="Bordered avatar">
            <p class="items-center text-5xl py-4 px-2 font-semibold"> Editar usuario</p>
        </div>

        <form class="max-w-md mx-auto pt-5" action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                    Nombre</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">
                    Correo electrónico</label>
                <input type="email" name="email" id="base-input" value="{{ $user->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div>
                <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">
                    Contraseña</label>
                <input type="password" name="password" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="py-8 flex justify-center">
                <div class="px-5">
                    <button type="submit" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Guardar </button>
                </div>
                <div class="px-5">
                    <a href="{{ route('users.index') }}">
                        <button type="button" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none">
                            Regresar </button>
                    </a>
                </div>
            </div>

        </form>


    </div>


</x-layouts.app-layout>
