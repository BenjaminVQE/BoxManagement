<x-app-layout>
    <div class="container mt-4 pb-4">
        <form class="row g-3" method="POST" action="{{ route('boxes.update') }}">
            @csrf
            @method('PUT')
                
            <input type="hidden" name="id" value="{{ $box['id'] }}">
            
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="name" class="form-control" id="name" name="name" placeholder="Box Stockage Angers #1" value='{{$box['name']}}'>
            </div>
            <div class="mb-3">
                <label for="surface" class="form-label">Surface</label>
                <input type="number" class="form-control" id="surface" name="surface" placeholder="35" value='{{$box['surface']}}'>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="244" value='{{$box['price']}}'>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Localisation</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="34 rue du petitchemin Chalonnes-sur-Loire" value='{{$box['address']}}'>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" value='{{$box['description']}}'></textarea>
            </div>
            <div class="mb-3">
                <label>Locataire</label>
                <select class="form-select" aria-label="Default select example" name="tenant">
                    <label>Locataire</label>
                    <option selected>{{$box->tenant->lastName . ' ' .$box->tenant->firstName}}</option>
                    @foreach ($tenants as $tenant)
                    @if ($tenant['lastName'] !== $box->tenant->lastName)
                    <option value="{{$tenant['id']}}">{{$tenant['lastName'] . ' ' . $tenant['firstName']}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Modifier</button>
            </div>
        </form>
    </div>
</x-app-layout>