<x-app-layout>
    <div class="container mt-4 pb-4">
        <form class="row g-3" method="POST" action="">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Nom du contrat</label>
                <input type="name" class="form-control" id="name" name="name"
                    placeholder="Contrat du locataire #1">
            </div>
            <div class="mb-3">
                <label for="dateStart" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="dateStart" name="dateStart">
            </div>
            <div class="mb-3">
                <label for="dateEnd" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="dateEnd" name="dateEnd">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Prélévement par mois</label>
                <input type="float" class="form-control" id="address" name="address" placeholder="332">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="box" class="form-label">Locataire</label>
                <select class="form-select" aria-label="Default select example" name="box">
                    <label>Box</label>
                    <option disabled selected>Choisir un box</option>
                    @foreach ($boxes as $box)
                        <option value="{{ $box->id }}">{{ $box->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tenant" class="form-label">Locataire</label>
                <select class="form-select" aria-label="Default select example" name="tenant">
                    <label>Locataire</label>
                    <option disabled selected>Choisir un locataire</option>
                    @foreach ($tenants as $tenant)
                        <option value="{{ $tenant['id'] }}">{{ $tenant->firstName . ' ' . $tenant['lastName'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>
