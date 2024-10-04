<x-app-layout>
    <div class="container mt-3  ">
        <div class="d-flex justify-content-end w-100 mb-3">
            <a href="{{ route('boxes.create') }}" type="button" class="btn btn-outline-success">Créer une box</a>
        </div> 
        <table class="table">
            <thead>
              <tr class="table-light">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Surface</th>
                <th scope="col">Prix</th>
                <th scope="col">Localisation</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($boxes as $box)
                    <th scope="row">{{ $box['id']}}</th>
                    <td>{{ $box['name']}}</td>
                    <td>{{ $box['surface']}}</td>
                    <td>{{ $box['price']}}</td>
                    <td>{{ $box['address']}}</td>
                    <td>
                        <form action="{{ route('boxes.destroy',$box->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                @endforeach
              </tr>
            </tbody>
          </table>
    </div>
</x-app-layout>