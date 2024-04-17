<x-container>
    <div class="flex flex-col items-center">
        @livewire('petition-api')
    </div>

    @push('js')
        <script src="{{asset('js/app.js')}}"></script>
    @endpush
</x-container>
