@props(['icon', 'label', 'value'])

<div class="p-4 bg-white border-2 border-green-400 rounded-lg shadow-md text-center">
   <div class="text-green-600 text-3xl mb-2">
      <i class="{{ $icon }}"></i>
   </div>
   <p class="text-sm text-gray-600">{{ $label }}</p>
   <p class="text-xl font-bold text-gray-800">{{ $value }}</p>
</div>
