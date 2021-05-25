<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Hi....{{ Auth::user()->name }}
  </x-slot>

  <div class="py-12">
    This is just home page for new setup
  </div>
</x-app-layout>
