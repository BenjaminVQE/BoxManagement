<x-app-layout>
    <div class="container mt-3  ">
        <div class="d-flex justify-content-end w-100 mb-3">
            <form action="{{ route('bills.store') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-outline-success">Générer facture</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr class="table-light text-center">
                    <th scope="col">#</th>
                    <th scope="col">Paiement Total</th>
                    <th scope="col">Contrat</th>
                    <th scope="col">Nombre de période</th>
                    <th scope="col">Date de paiement</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr class="text-center">
                        <th scope="row">{{ $bill->id }}</th>
                        <td>{{ $bill->payment_total }}</td>
                        <td>{{ $bill->contract->name }}</td>
                        <td>{{ $bill->period_number }}</td>
                        <td>
                            <form action="{{ route('bills.update', $bill->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="date" name="payment_date" id="payment_date">

                                <button type="submit" class="btn btn-outline-primary">Sauvegarder</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
