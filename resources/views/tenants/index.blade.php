<x-app-layout>
    <div class="container mt-3  ">
        <div class="d-flex justify-content-end w-100 mb-3">
            <a href="{{ route('tenants.create') }}" type="button" class="btn btn-outline-success">Créer un locataire</a>
        </div> 
        <table class="table">
            <thead>
              <tr class="table-light text-center">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Numéro Tél</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tenants as $tenant)
                <tr class="text-center ">
                    <th scope="row">{{ $tenant['id']}}</th>
                    <td>{{ $tenant['lastName']}}</td>
                    <td>{{ $tenant['firstName']}}</td>
                    <td>{{ $tenant['phoneNumber']}}</td>
                    <td>
                      <div class="d-flex justify-content-center w-100 gap-2">
                        <a class="btn btn-warning" href="{{route('tenants.edit', $tenant['id'])}}"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('tenants.destroy',$tenant->id) }}" method="POST">
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