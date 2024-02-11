<x-layouts.app-layout>

    <div class="container p-2 px-10 py-8 mx-auto bg-white shadow-xl">

        <div class="p-3 pt-10 grid grid-cols-6 gap-4">
            <div class="relative mt-1 col-start-1 col-end-3 pb-10">
                <h1 class="text-5xl font-bold text-black text-center">Mensualidades</h1>
            </div>

            <div class="col-end-7 col-span-1 px-5 py-4">
                <a href="{{ route('payments.create') }}">
                    <button type="submit" class="text-white bg-sky-800 hover:bg-sky-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">
                        Agregar </button>
                </a>
            </div>
        </div>
        @if(session('status'))
            <div class="flex justify-start px-4 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="container mx-auto px-6 rounded-xl mt-8 mb-5 sm:px-6 lg:px-8 py-8">
            <table id="example" class="table-auto w-full pt-8">
                <thead>
                <tr>
                    <th class="px-4 py-2">Alumno</th>
                    <th class="px-4 py-2">Mes Pagado</th>
                    <th class="px-4 py-2">Fecha de Pago</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td class="border px-4 py-2">{{ $payment->student->student_personal_code . ' ' . $payment->student->name . ' ' . $payment->student->lastname }}</td>
                        <td class="border px-4 py-2">{{ $payment->month }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($payment->date_payment)->format('d/m/Y') }}</td>
                        <td class="border px-4 py-2">
                            <div class="flex flex-row">
                                <a href="{{ route('payments.show', $payment) }}">
                                    <button class="relative align-middle select-none px-2 font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="{{ route('payments.edit', $payment) }}">
                                    <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30" type="button">
                                            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 w-6">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                              </svg>
                                            </span>
                                    </button>
                                </a>
                                <form method="POST" action="{{route('payments.destroy', $payment)}}" class="formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="relative align-middle px-2 select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-blue-gray-500 hover:bg-blue-gray-500/10 active:bg-blue-gray-500/30">
                                        <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                // Add any customization options here
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('benq-ex2710q-dropdown-button');
            const dropdown = document.getElementById('benq-ex2710q-dropdown');

            dropdownButton.addEventListener('click', function () {
                const rect = dropdownButton.getBoundingClientRect();
                dropdown.style.position = 'fixed';
                dropdown.style.top = `${rect.bottom + window.scrollY}px`;
                dropdown.style.left = `${rect.left + window.scrollX}px`;
                dropdown.classList.toggle('hidden');
            });

            const dropdownButtons = dropdown.querySelectorAll('button');

            dropdownButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    // Puedes personalizar la lógica para cada botón dentro del menú desplegable aquí
                    console.log(`Botón con ID ${button.id} clickeado`);
                    dropdown.classList.add('hidden'); // Oculta el menú después de hacer clic en un botón
                });
            });
        });

    </script>


</x-layouts.app-layout>
