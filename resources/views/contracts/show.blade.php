<x-app-layout>
    <div class="container p-3">
        <div class="d-flex justify-content-between">
            <div class="mb-3">
                <label for="name" class="form-label">{{ $contract->name }}</label>
            </div>
            <input type="text" hidden id="content" name="content" value="{{ $contract->content }}">
        </div>
        <div id="editor" style="height: 65vh;"></div>
    </div>

    <script>
        const container = document.getElementById('editor');
        const quill = new Quill(container, {
            theme: 'snow',
            readOnly: true,
            modules: {
                toolbar: false,
            },
        });

        let content = document.getElementById('content');
        let parsedContent = JSON.parse(content.value);

        quill.setContents(parsedContent);
    </script>
</x-app-layout>
