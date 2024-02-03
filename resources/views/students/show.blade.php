<x-layouts.app-layout>
    <div class="container px-10 pt-8 pb-16 my-14 mx-auto bg-white shadow-xl">
        <div class="flex justify-center py-10">
            <img class="shadow-md w-20 h-20 p-2 rounded-2xl ring-2 ring-gray-300 bg-sky-200" src="{{ asset('img/add_student.png') }}" alt="Bordered avatar">
            <h1 class="text-5xl font-bold text-black text-center my-4">&nbsp; Información del estudiante</h1>
        </div>
        <div class="flex">
            <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow mr-6">
                <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                    <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Información Personal</h1>
                </div>
                <div>
                    <div class="p-4 bg-white rounded-lg md:p-8">
                        <!-- List -->
                        <ul role="list" class="space-y-3 text-gray-500">
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">CUI:</span><p class="font-semibold text-gray-400">{{ $student->cui }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Código:</span><p class="font-semibold text-gray-400">{{ $student->student_personal_code }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Nombre completo:</span><p class="font-semibold text-gray-400">{{ $student->name . ' ' . $student->lastname }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Fecha de nacimiento:</span><p class="font-semibold text-gray-400">{{ $student->birthdate }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Dirección:</span><p class="font-semibold text-gray-400">{{ $student->address }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow mr-6">
                <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                    <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Información Adicional</h1>
                </div>
                <div>
                    <div class="p-4 bg-white rounded-lg md:p-8">
                        <!-- List -->
                        <ul role="list" class="space-y-3 text-gray-500">
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Estado del Estudiante:</span><p class="font-semibold text-gray-400 uppercase">{{ $student->status_student }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Grado actual del estudiante:</span><p class="font-semibold text-gray-400">{{ $student->degree->name }}</p>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-1/3 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Información de Encargado</h1>
            </div>
            <div>
                <div class="p-4 bg-white rounded-lg md:p-8">
                    <!-- List -->
                    <ul role="list" class="space-y-3 text-gray-500">
                        <li class="flex space-x-2 rtl:space-x-reverse items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                            <span class="leading-tight font-semibold text-gray-500">Encargado:</span><p class="font-semibold text-gray-400">{{ $student->incharge }}</p>
                        </li>
                        <li class="flex space-x-2 rtl:space-x-reverse items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                            </svg>
                            <span class="leading-tight font-semibold text-gray-500">Teléfono de Encargado:</span><p class="font-semibold text-gray-400">{{ $student->phone_incharge }}</p>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="mt-8 flex flex-row-reverse">
            <a href="{{ route('students.index')  }}">
            <div class="bg-blue-500 w-30 h-12 flex rounded-lg align-middle text-center text-white items-center p-2.5 my-auto hover:bg-blue-600 border-red-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                    <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg>
                <p class="mb-0.5">Regresar</p>
            </div>
            </a>

        </div>
    </div>



</x-layouts.app-layout>
