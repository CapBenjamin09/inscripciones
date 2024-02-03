@php
    $edit = isset($student);
@endphp
<div class="mb-5">
    <label for="cui" class="mb-3 block text-base font-medium text-[#07074D]">
        CUI de Alumno
    </label>
    <input type="text" name="cui" id="cui" placeholder="CUI de Alumno" value="{{ $edit ? old('cui', $student->cui) : old('cui') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="student_personal_code" class="mb-3 block text-base font-medium text-[#07074D]">
        Código de Alumno
    </label>
    <input type="text" name="student_personal_code" id="student_personal_code" placeholder="Código de Alumno" value="{{ $edit ? old('student_personal_code', $student->student_personal_code) : old('student_personal_code') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="-mx-3 flex flex-wrap">
    <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                Nombre
            </label>
            <input type="text" name="name" id="name" placeholder="Nombre de alumno" value="{{ $edit ? old('name', $student->name) : old('name') }}"
                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>
    </div>
    <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
            <label for="lastname" class="mb-3 block text-base font-medium text-[#07074D]">
                Apellido
            </label>
            <input type="text" name="lastname" id="lastname" placeholder="Apellido de alumno" value="{{ $edit ? old('lastname', $student->lastname) : old('lastname') }}"
                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>
    </div>
</div>
<div class="mb-5">
    <label for="birthdate" class="mb-3 block text-base font-medium text-[#07074D]">
        Fecha de nacimiento:
    </label>
    <input type="date" name="birthdate" id="birthdate" value="{{ $edit ? old('birthdate', $student->birthdate) : old('birthdate') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
<div class="mb-5">
    <label for="degree_id" class="mb-3 block text-base font-medium text-[#07074D]">
        Grado
    </label>
    <select name="degree_id" id="degree_id" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        @foreach($degrees as $degree)
            @if($edit)
                @if($degree->id == $student->degree_id)
                    <option selected value="{{ $student->degree_id }}">{{ $student->degree->name }}</option>
                @else
                    <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                @endif
            @else
                <option value="{{ $degree->id }}">{{ $degree->name }}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="-mx-3 flex flex-wrap">
    <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
            <label for="incharge" class="mb-3 block text-base font-medium text-[#07074D]">
                Encargado
            </label>
            <input type="text" name="incharge" id="incharge" placeholder="Nombre de encargado" value="{{ $edit ? old('incharge', $student->incharge) : old('incharge') }}"
                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>
    </div>
    <div class="w-full px-3 sm:w-1/2">
        <div class="mb-5">
            <label for="phone_incharge" class="mb-3 block text-base font-medium text-[#07074D]">
                Teléfono de Encargado
            </label>
            <input type="text" name="phone_incharge" id="phone_incharge" placeholder="Télefono" value="{{ $edit ? old('phone_incharge', $student->phone_incharge) : old('phone_incharge') }}"
                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
        </div>
    </div>
</div>
<div class="mb-5">
    <label for="address" class="mb-3 block text-base font-medium text-[#07074D]">
        Dirección
    </label>
    <input type="text" name="address" id="address" placeholder="Dirección del alumno" value="{{ $edit ? old('address', $student->address) : old('address') }}"
           class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
</div>
@if($edit)
    <div class="mb-5">
        <label for="status_student" class="mb-3 block text-base font-medium text-[#07074D]">
            Estado del alumno
        </label>
        <select name="status_student" id="status_student" class="w-full uppercase rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            @if($student->status_student == 'activo')
                <option selected value="{{ $student->status_student }}">{{ $student->status_student }}</option>
                <option value="inactivo">inactivo</option>
            @else
                <option value="activo">activo</option>
                <option selected value="{{ $student->status_student }}">{{ $student->status_student }}</option>
            @endif
        </select>
    </div>
@endif
