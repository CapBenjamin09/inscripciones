<x-layouts.app-layout>
    <div class="container mx-auto my-8 py-4 rounded-lg bg-white px-4 shadow">
        <h1 class="text-5xl font-bold text-black text-center my-4">Editar Grado</h1>
        <form class="max-w-3xl mx-auto" method="POST" action="{{ route('degree.update', $degree) }}">
            @csrf
            @method('patch')

            @include('degrees.form')

            <div class="flex justify-between px-4">
                <a href="{{ route('degree.index') }}" class="inline-flex items-center text-blue-600 hover:underline">Volver</a>
                <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                            focus:outline-none focus:ring-blue-300 font-medium rounded-lg
                            text-sm w-full sm:w-auto px-5 py-2.5
                            text-center">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-layouts.app-layout>

