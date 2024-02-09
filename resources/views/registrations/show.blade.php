<x-layouts.app-layout>
    <div class="container px-10 pt-8 pb-16 my-14 mx-auto bg-white shadow-xl">
        <div class="flex justify-center py-10">
            <h1 class="text-5xl font-bold text-sky-600 text-left my-4">Detalle de inscripción</h1>
        </div>
        <div class="mx-48">
            <div class="w-full  bg-white border border-gray-200 rounded-lg shadow mr-6">
                <div class="flex flex-wrap font-medium text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50">
                    <h1 class="inline-block text-center mx-auto p-4 text-blue-600 rounded-ss-lg text-xl cursor-text">Inscripción #{{ $registration->id }}</h1>
                </div>
                <div>
                    <div class="p-4 bg-white rounded-lg md:p-8">
                        <!-- List -->
                        <ul role="list" class="space-y-3 text-gray-500">
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Fecha:</span><p class="font-semibold text-gray-400">{{ \Carbon\Carbon::parse($registration->date)->format('d/m/Y') }}</p>
                            </li>
                            @if(isset($registration->cycle))
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Ciclo:</span><p class="font-semibold text-gray-400">{{ $registration->cycle }}</p>
                            </li>
                            @endif
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Alumno:</span><p class="font-semibold text-gray-400">{{ $registration->student->student_personal_code . ' ' . strtoupper($registration->student->name)  . ' ' . strtoupper($registration->student->lastname) }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Grado:</span><p class="font-semibold text-gray-400">{{ $registration->degree->name }}</p>
                            </li>
                            <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="leading-tight font-semibold text-gray-500">Estado de inscripción:</span><p class="font-semibold text-gray-400">{{ $registration->status }}</p>
                            </li>
                            @if(isset($registration->paid_registration))
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="leading-tight font-semibold text-gray-500">Registro de pago:</span><p class="font-semibold text-gray-400">{{ $registration->paid_registration }}</p>
                                </li>
                            @endif
                            @if(isset($registration->comments))
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-blue-500">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022ZM12 9a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="leading-tight font-semibold text-gray-500">Comentarios:</span><p class="font-semibold text-gray-400">{{ $registration->comments }}</p>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="flex justify-center py-10">
                <h1 class="text-5xl font-bold text-sky-600 text-left my-2">Comprobante</h1>
            </div>

            <div class="p-1 flex flex-wrap items-center justify-center">

                @if(pathinfo($registration->voucher_record, PATHINFO_EXTENSION) == 'jpg' || pathinfo($registration->voucher_record, PATHINFO_EXTENSION) == 'png' || pathinfo($registration->voucher_record, PATHINFO_EXTENSION) == 'jpeg')
                    <div class="flex-shrink-0 relative overflow-hidden bg-blue-500 rounded-lg max-w-screen-xl shadow-lg">
                        <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none"
                             style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
                        </svg>
                        <div class="relative pt-10 px-10 flex items-center justify-center">
                            <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                                 style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                            </div>
                            <img class="relative w-auto rounded-lg h-96 w-96" src="{{ asset($registration->voucher_record) }}" alt="">
                        </div>
                        <div class="relative text-white px-6 pb-6 mt-6">
                            <div class="flex flex-row-reverse">
                                <a target="_blank" href="{{ asset($registration->voucher_record) }}" class="block bg-white rounded-full text-blue-500 hover:text-blue-700 text-xs font-bold px-3 py-2 leading-none flex items-center">Ver imagen</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <embed src="{{ asset( $registration->voucher_record) }}" type="application/pdf" class="w-[1000px] h-[800px]">
                    </div>
                @endif
            </div>
            <div class="mt-8 flex flex-row-reverse">
                <a href="{{ route('registrations.index')  }}">
                    <div class="bg-blue-500 w-30 h-12 flex rounded-lg align-middle text-center text-white items-center p-2.5 my-auto hover:bg-blue-600 border-red-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                            <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 0 1 0 1.06L4.81 8.25H15a6.75 6.75 0 0 1 0 13.5h-3a.75.75 0 0 1 0-1.5h3a5.25 5.25 0 1 0 0-10.5H4.81l4.72 4.72a.75.75 0 1 1-1.06 1.06l-6-6a.75.75 0 0 1 0-1.06l6-6a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                        <p class="mb-0.5">Regresar</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-layouts.app-layout>
