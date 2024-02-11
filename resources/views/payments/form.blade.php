@php
    $edit = isset($payment);
@endphp

<div class="mb-5">
    <label for="student_id" class="mb-3 block text-base font-medium text-[#07074D]">
        Estudiante:
    </label>
    <select name="student_id" id="student_id"
            class="w-full">
        @foreach($students as $student)
            @if($edit)
                @if($student->id == $payment->student_id)
                    <option selected value="{{ $payment->student_id }}">{{ $payment->student->student_personal_code . ' ' . strtoupper($payment->student->name)  . ' ' . strtoupper($payment->student->lastname) }}</option>
                @else
                    <option value="{{ $student->id }}">{{ $student->student_personal_code . ' ' . strtoupper($student->name)  . ' ' . strtoupper($student->lastname) }}</option>
                @endif
            @else
                <option value="{{ $student->id }}">{{ $student->student_personal_code . ' ' . strtoupper($student->name)  . ' ' . strtoupper($student->lastname) }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="mb-5">
    <label for="month" class="mb-3 block text-base font-medium text-[#07074D]">
        Mes:
    </label>

    <select name="month" id="month"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        @if($edit)
            <option selected>{{ $payment->month }}</option>
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        @else
            <option value="Enero">Enero</option>
            <option value="Febrero">Febrero</option>
            <option value="Marzo">Marzo</option>
            <option value="Abril">Abril</option>
            <option value="Mayo">Mayo</option>
            <option value="Junio">Junio</option>
            <option value="Julio">Julio</option>
            <option value="Agosto">Agosto</option>
            <option value="Septiembre">Septiembre</option>
            <option value="Octubre">Octubre</option>
            <option value="Noviembre">Noviembre</option>
            <option value="Diciembre">Diciembre</option>
        @endif
    </select>
</div>
<div class="mb-5">
    <label for="date_payment" class="mb-3 block text-base font-medium text-[#07074D]">
        Fecha de pago:
    </label>
    <input type="text" name="date_payment" id="date_payment" readonly value="{{ $edit ? \Carbon\Carbon::parse($payment->date_payment)->format('d/m/Y') : \Carbon\Carbon::now()->format('d/m/Y') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="buyer_number" class="mb-3 block text-base font-medium text-[#07074D]">
        Número de comprobante:
    </label>
    <input type="text" name="buyer_number" id="buyer_number" placeholder="Ej: 12345-1" value="{{ $edit ? old('buyer_number', $payment->buyer_number) : old('buyer_number') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="voucher" class="mb-3 block text-base font-medium text-[#07074D]">
        Comprobante de pago:
    </label>
    @if($edit)
        <a target="_blank" href="{{ asset($payment->voucher) }}" class="mb-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="fill-current w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
            <span class="text-center">Presiona este botón para descargar el archivo anterior</span>
        </a>
    @endif
    <div class="flex items-center space-x-6">
        <div class="shrink-0">
            <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://cdn.icon-icons.com/icons2/2570/PNG/512/image_icon_153794.png" alt="Current profile photo" />
        </div>
        <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input type="file" onchange="loadFile(event)" name="voucher" value="{{ old('voucher') }}" class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                  "/>
        </label>
    </div>
</div>
<div class="mb-5">
    <label for="comments" class="mb-3 block text-base font-medium text-[#07074D]">
        Comentarios (opcional):
    </label>
    <textarea id="comments" placeholder="Puedes dejar un comentario." name="comments" class="h-32 w-full resize-none rounded border border-gray-300 bg-white py-1 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">{{ $edit ? old('comments', $payment->comments) : '' }}</textarea>
</div>
