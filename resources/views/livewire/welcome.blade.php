<?php

use function Livewire\Volt\{state};

?>

@section('head')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
@endsection

<form class="flex flex-col space-y-6" action="{{ route('storePost') }}" method="POST">
    @csrf
    <div class="flex flex-col space-y-2">
        <label>Title</label>
        <input type="text" name='title' placeholder="Title..." class="px-3 py-2 rounded dark:bg-neutral-700" />
    </div>

    <div class="flex flex-col space-y-2">
        <label>Description</label>
        <input type="text" name='description' placeholder="Description..."
            class="px-3 py-2 rounded dark:bg-neutral-700" />
    </div>

    <input type="file" name="image" />

    <button type="submit" class="rounded bg-green-600 hover:bg-green-500 px-2 py-1">Save</button>
</form>


@section('scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]')

        // Create a FilePond instance
        const pond = FilePond.create(inputElement)

        FilePond.setOptions({
            server: {
                process: '/upload',
                revert: '/delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            },
        });
    </script>
@endsection
