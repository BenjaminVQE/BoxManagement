<x-app-layout>
    <div class="container mt-3  ">
        <div class="d-flex justify-content-end w-100 mb-3">
            <a href="{{ route('contracts.create') }}" type="button" class="btn btn-outline-success">Créer un contrat</a>
        </div>
        <table class="table">
            <thead>
                <tr class="table-light text-center">
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Date Début</th>
                    <th scope="col">Date Fin</th>
                    <th scope="col">Prix/mois</th>
                    <th scope="col">Nom du Box</th>
                    <th scope="col">Locataire</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contracts as $contract)
                    <tr class="text-center ">
                        <th scope="row">{{ $contract->id }}</th>
                        <td>{{ $contract->name }}</td>
                        <td>{{ $contract->date_start }}</td>
                        <td>{{ $contract->date_end }}</td>
                        <td>{{ $contract->monthly_price }}</td>
                        <td>{{ $contract->box->name }}</td>
                        <td>{{ $contract->tenant->lastName . ' ' . $contract->tenant->firstName }}</td>
                        <td>
                            <div class="d-flex justify-content-center w-100 gap-2">
                                <a class="btn btn-primary" href="{{ route('contracts.show', $contract->id) }}"><i
                                        class="fa-solid fa-eye"></i></i></a>
                                <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
