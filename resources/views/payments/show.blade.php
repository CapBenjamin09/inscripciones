<x-layouts.app-layout>

    <div class="w-full  bg-white border border-gray-200 rounded-lg shadow mr-6">

        <div class="py-24 px-8 max-w-5xl mx-auto flex flex-col md:flex-row gap-12">
            <div class="flex flex-col text-left basis-1/2">
                <p class="inline-block font-semibold text-primary">{{ $payment->buyer_number }}</p>
                <p class="sm:text-4xl mt-2 text-3xl font-extrabold text-base-content">{{ $payment->student->student_personal_code . ' ' . $payment->student->name . ' ' . $payment->student->lastname }}</p>
            </div>
            <ul class="basis-1/2">
                <li>
                    <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Ver datos del registro</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">
                                Mes: {{ $payment->month }} <br>
                                Fecha: {{ \Carbon\Carbon::parse($payment->date_payment)->format('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10" aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">Ver comentario agregado</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden" style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">
                                {{ $payment->comments }}
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <script>
            function toggleFAQ(button) {
                const content = button.nextElementSibling;
                button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
                content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
            }
        </script>

        <p class="flex justify-center font-semibold text-primary">Comprobante de pago</p>
        <div class="p-1 flex items-center max-h-full justify-center mb-10">

        @if($payment->voucher != null)
            @if(pathinfo($payment->voucher, PATHINFO_EXTENSION) == 'jpg' || pathinfo($payment->voucher, PATHINFO_EXTENSION) == 'png' || pathinfo($payment->voucher, PATHINFO_EXTENSION) == 'jpeg')
                <div class="flex-shrink-0 relative overflow-hidden mt-5 border-2 bg-gray-50 rounded-lg max-w-screen-xl shadow-lg">

                    <div class="relative pt-15 mt-7 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3"
                             style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
                        </div>
                        <img class="relative rounded-lg h-96 w-96" src="{{ asset($payment->voucher) }}" alt="{{ $payment->buyer_number }}">
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <div class="flex flex-row-reverse">
                            <a download="" target="_blank" href="{{ asset($payment->voucher) }}" class="block bg-white rounded-full text-blue-500 hover:text-blue-700 text-xs font-bold px-3 py-2 leading-none flex items-center">Descargar imagen</a>
                        </div>
                    </div>
                </div>
            @else
                <div>
                    <embed src="{{ asset( $payment->voucher) }}" type="application/pdf" class="w-[700px] h-[500px]">
                </div>
            @endif

        @else
            <p class="mt-10">No hay un archivo para mostrar</p>
        @endif
    </div>

        <div class="px-5 mt-10 mb-10">
            <a href="{{ route('payments.index') }}" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-blue-500 bg-white rounded-lg hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-5 h-5 mr-1">
                    <path strokeLinecap="round" strokeLinejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Regresar
            </a>
        </div>

    </div>

</x-layouts.app-layout>
