<x-app-layout>
    <div class="container mt-3  ">
        <div class="d-flex justify-content-end w-100 mb-3">
            <a href="{{ route('boxes.create') }}" type="button" class="btn btn-outline-success">Créer une box</a>
        </div> 
        <table class="table">
            <thead>
              <tr class="table-light text-center">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Surface</th>
                <th scope="col">Prix</th>
                <th scope="col">Localisation</th>
                <th scope="col">Locataire</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($boxes as $box)
                <tr class="text-center ">
                    <th scope="row">{{ $box['id']}}</th>
                    <td>{{ $box['name']}}</td>
                    <td>{{ $box['surface']}}</td>
                    <td>{{ $box['price']}}</td>
                    <td>{{ $box['address']}}</td>
                    <td>{{ $box->tenant ? $box->tenant->lastName . ' ' . $box->tenant->firstName : 'N/A' }}</td>
                    <td>
                      <div class="d-flex justify-content-center w-100 gap-2">
                        <a class="btn btn-warning" href="{{route('boxes.edit', $box['id'])}}"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('boxes.destroy',$box->id) }}" method="POST">
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