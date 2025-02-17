<x-app-layout>
    <div class="container p-3">
        <form method="POST" action="{{ route('contracts_template.store') }}" id="form">
            @csrf
            @method('POST')
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="name" class="form-label">{{ $contract_template->name }}</label>
                </div>
                <input type="text" hidden id="content" name="content" value="">
            </div>
        </form>
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

        let content = {!! json_encode($contract_template->content) !!}

        quill.setContents(JSON.parse(content));
    </script>
</x-app-layout>
