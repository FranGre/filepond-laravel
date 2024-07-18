<?php

use function Livewire\Volt\{state};

?>

@section('head')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endsection

<div>
    <input type="file" />
</div>


@section('scripts')
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]')

        // Create a FilePond instance
        const pond = FilePond.create(inputElement)
    </script>
@endsection
