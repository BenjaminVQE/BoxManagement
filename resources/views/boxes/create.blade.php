<x-app-layout>
    <div class="container mt-4 pb-4">
        <form class="row g-3" method="POST" action="{{ route('boxes.store') }}">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Box Stockage Angers #1">
            </div>
            <div class="mb-3">
                <label for="surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="surface" name="surface" placeholder="35">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="244">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Localisation</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="34 rue du petitchemin Chalonnes-sur-Loire">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label>Locataire</label>
                <select class="form-select" aria-label="Default select example" name="tenant">
                    <label>Locataire</label>
                    <option selected>Choisir un locataire</option>
                    @foreach ($tenants as $tenant)
                    <option value="{{$tenant['id']}}">{{$tenant['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>