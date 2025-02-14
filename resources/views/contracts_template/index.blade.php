<x-app-layout>
    <div class="container mt-3  ">
        <div class="d-flex justify-content-end w-100 mb-3">
            <a href="{{ route('contracts_template.create') }}" type="button" class="btn btn-outline-success">Créer un modèle</a>
        </div> 
        <table class="table">
            <thead>
              <tr class="table-light text-center">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($contractsTemplate as $contractTemplate)
                <tr class="text-center ">
                    <th scope="row">{{ $contractTemplate['id']}}</th>
                    <td>{{ $contractTemplate['name']}}</td>
                    <td>
                      <div class="d-flex justify-content-center w-100 gap-2">
                        <a class="btn btn-primary" href="{{route('contracts_template.show', $contractTemplate['id'])}}"><i class="fa-solid fa-eye"></i></i></a>
                        <a class="btn btn-warning" href="{{route('contracts_template.edit', $contractTemplate['id'])}}"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('contracts_template.destroy',$contractTemplate->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</x-app-layout>