<x-layouts.app-layout>
    <!-- component -->


    <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url('https://images.pexels.com/photos/1103970/pexels-photo-1103970.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2')">
        <div class="rounded-xl bg-gray-800 bg-opacity-50 px-16 py-10 shadow-lg backdrop-blur-sm bg-white/30 max-sm:px-8">
            <div class="text-white">
                <div class="mb-8 flex flex-col items-center">
                    <img src="{{ asset('img/d59a5c4f-6de9-443f-b59f-e127b4f20459.png') }}" width="150" alt="" srcset="" />
                    <h1 class="mb-2 text-2xl text-gray-800">Iniciar Sesión</h1>
                    <span class="text-gray-800">Ingrese los detalles de inicio de sesión</span>
                    @if(session('status'))
                        <div class="p-1 text-sm text-gray-800 rounded-lg" role="alert">
                            <span class="font-medium">Alert!</span> {{session('status')}}
                        </div>
                    @endif
                </div>
                <form action="{{ route('session.store') }}" method="POST">
                    @csrf

                    <div class="mb-4 text-lg">
                        <input type="email" name="email" class="rounded-3xl border-none bg-sky-800 bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" placeholder="id@email.com" />
                        @error('email')
                        <p class="text-gray-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4 text-lg">
                        <input type="password" name="password" class="rounded-3xl bg-sky-800 border-none  bg-opacity-50 px-6 py-2 text-center text-inherit placeholder-slate-200 shadow-lg outline-none backdrop-blur-md" placeholder="*********" />
                        @error('password')
                        <p class="text-gray-800 my-1 rounded-lg text-sm px-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-8 flex justify-center text-lg text-black">
                        <button type="submit" class="rounded-3xl bg-sky-600  px-10 py-2 text-white shadow-xl transition-colors duration-300 hover:bg-sky-500">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
