@php
    $edit = isset($degree)
@endphp

<div class="mb-5">
    <label for="name" class="block mb-2 text-md font-medium text-gray-900 ">Nombre:</label>
    <input type="text"
           id="name"
           name="name"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
           value="{{ $edit ? old('name', $degree->name) : old('name') }}" >
</div>
<div class="mb-5">
    <label for="cost_monthly" class="block mb-2 text-md font-medium text-gray-900 ">Costo de mensualidad:</label>
    <input type="number"
           step="0.01"
           id="cost_monthly"
           name="cost_monthly"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
           placeholder="120.00"
           value="{{ $edit ? old('cost_monthly', $degree->cost_monthly) : old('cost_monthly') }}" >
</div>

