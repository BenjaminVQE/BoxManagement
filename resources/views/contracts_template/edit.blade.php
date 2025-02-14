<x-app-layout>
    <div class="container p-3">
      <form method="POST" action="{{ route('contracts_template.update') }}" id="form">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $contract_template->id }}">
        <div class="d-flex justify-content-between">
          <div class="mb-3">
            <label for="name" class="form-label">Nom du modèle</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Modèle Contract #1" value="{{$contract_template->name}}">
          </div>
          <input type="text" hidden id="content" name="content" value="">
          <button class="btn btn-primary h-25" type="submit" id="saveButton">Modifier</button>
        </div>
      </form>
      <div id="editor" style="height: 65vh;"></div>
    </div> 

    <script>
      const container = document.getElementById('editor');
      
      const quill = new Quill(container, {
        theme: 'snow'  
      });

      $content = {!! json_encode($contract_template->content) !!}

      quill.setContents(JSON.parse($content));

      document.getElementById('form').addEventListener('submit', function () {
        const content = JSON.stringify(quill.getContents());
        document.getElementById('content').value = content;
      });

    </script>
  </x-app-layout>
  