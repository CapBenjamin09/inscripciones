@php
    $edit = isset($registration);
@endphp

<div class="mb-5">
    <label for="student_id" class="mb-3 block text-base font-medium text-[#07074D]">
        Estudiante:
    </label>
    @if($edit)
    <input type="hidden" name="student_id" id="student_id" value="{{$registration->student_id}}">
    <select disabled name="student_id2" id="student_id2"
            class="w-full">
            <option value="{{ $registration->student_id }}">{{ $registration->student->student_personal_code . ' ' . strtoupper($registration->student->name)  . ' ' . strtoupper($registration->student->lastname) }}</option>
    </select>
    @else
    <select name="student_id" id="student_id"
            class="w-full">
        @foreach($students as $student)
            <option value="{{ $student->id }}">{{ $student->student_personal_code . ' ' . strtoupper($student->name)  . ' ' . strtoupper($student->lastname) }}</option>
        @endforeach
    </select>
    @endif
</div>
<div class="mb-5">
    <label for="degree_id" class="mb-3 block text-base font-medium text-[#07074D]">
        Grado
    </label>
    <select name="degree_id" id="degree_id" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        @foreach($degrees as $degree)
            @if($edit)
                @if($degree->id == $registration->degree_id)
                    <option selected value="{{ $registration->degree_id }}">{{ $registration->degree->name }}</option>
                @else
                    <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                @endif
            @else
                <option value="{{ $degree->id }}">{{ $degree->name }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="mb-5">
    <label for="date_registration" class="mb-3 block text-base font-medium text-[#07074D]">
        Fecha:
    </label>
    <input type="text" name="date_registration" id="date_registration" disabled value="{{ $edit ? \Carbon\Carbon::parse($registration->date)->format('d/m/Y') :\Carbon\Carbon::parse(now())->format('d/m/Y') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="cycle" class="mb-3 block text-base font-medium text-[#07074D]">
        Ciclo:
    </label>
    <input type="text" name="cycle" id="cycle" placeholder="Ej: 2024" value="{{ $edit ? old('cycle', $registration->cycle) : old('cycle') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="voucher_record" class="mb-3 block text-base font-medium text-[#07074D]">
        Comprobante de pago (opcional):
    </label>
    @if($edit)
        @if(isset($registration->voucher_record))
            <a target="_blank" href="{{ asset($registration->voucher_record) }}" class="mb-3 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                <svg class="fill-current w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                <span class="text-center">Presiona este botón para descargar el archivo anterior</span>
            </a>
        @else
            <p class="text-center mb-4 max-w-md mx-auto mt-2 text-gray-500">No existe un archivo cargado.</p>
        @endif
    @endif
    <div class="flex items-center space-x-6">
        <div class="shrink-0">
            <img id='preview_img' class="h-16 w-16 object-cover rounded-full" src="https://cdn.icon-icons.com/icons2/2570/PNG/512/image_icon_153794.png" alt="Current profile photo" />
        </div>
        <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input type="file" onchange="loadFile(event)" name="voucher_record" value="{{ old('voucher_record') }}" class="block w-full text-sm text-slate-500
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
    <label for="paid_registration" class="mb-3 block text-base font-medium text-[#07074D]">
        Registro de pago (opcional):
    </label>
    <input type="text" name="paid_registration" id="paid_registration" value="{{ $edit ? old('paid_registration', $registration->paid_registration) : old('paid_registration') }}" placeholder="Ej: 3223123-5"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="comments" class="mb-3 block text-base font-medium text-[#07074D]">
        Comentarios (opcional):
    </label>
    <textarea id="comments" placeholder="Puedes dejar un comentario si hace falta algún documento." name="comments" class="h-32 w-full resize-none rounded border border-gray-300 bg-white py-1 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">{{ $edit ? $registration->comments : '' }}</textarea>
</div>
<div class="mb-5">
    <label for="status" class="mb-3 block text-base font-medium text-[#07074D]">
        Estado:
    </label>
    <select name="status" id="status"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        @if($edit)
            @if($registration->status == "PAGO INCOMPLETO")
                <option value="PAGO INCOMPLETO" selected>PAGO INCOMPLETO</option>
                <option value="PAGO FINALIZADO">PAGO FINALIZADO</option>
                <option value="NO SE HA PAGADO">NO SE HA PAGADO</option>
            @elseif($registration->status == "PAGO FINALIZADO")
                <option value="PAGO INCOMPLETO" >PAGO INCOMPLETO</option>
                <option value="PAGO FINALIZADO" selected>PAGO FINALIZADO</option>
                <option value="NO SE HA PAGADO">NO SE HA PAGADO</option>
            @elseif($registration->status == "NO SE HA PAGADO")
                <option value="PAGO INCOMPLETO" >PAGO INCOMPLETO</option>
                <option value="PAGO FINALIZADO" >PAGO FINALIZADO</option>
                <option value="NO SE HA PAGADO" selected>NO SE HA PAGADO</option>
            @endif
        @else
            <option value="PAGO INCOMPLETO">PAGO INCOMPLETO</option>
            <option value="PAGO FINALIZADO">PAGO FINALIZADO</option>
            <option value="NO SE HA PAGADO">NO SE HA PAGADO</option>
        @endif
    </select>
</div>
