<x-layouts.app-layout>

    <div class="container mx-auto py-4 rounded-lg my-8 bg-white px-4 shadow">

        <div class="p-3 pt-8 ml-10">
            <h1 class="text-5xl font-bold text-sky-600 my-4">{{ $degree->name }}</h1>
        </div>

        <div class="container mx-auto px-6 rounded-xl mt-8 mb-5 sm:px-6 lg:px-8 py-8">
            <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($students as $student)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $student->student_personal_code . ' '. $student->name . ' ' . $student->lastname }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($student->status_student == 'activo')
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ strtoupper($student->status_student) }}
                                </span>
                            @else
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    {{ strtoupper($student->status_student) }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4 flex flex-row-reverse">
                <a href="{{ route('degree.index')  }}">
                    <div class="bg-blue-400 w-30 h-10 flex rounded-lg align-middle text-center text-white items-center p-2.5 my-auto hover:bg-blue-300 border-red-300 cursor-pointer">
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
