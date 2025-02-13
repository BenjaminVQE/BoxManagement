<x-app-layout>
    <div class="container mt-4 pb-4">
        <form class="row g-3" method="POST" action="{{ route('tenants.store') }}">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="lastName" class="form-label">Nom</label>
                <input type="name" class="form-control" id="lastName" name="lastName" placeholder="Doe">
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prénom</label>
                <input type="name" class="form-control" id="firstName" name="firstName" placeholder="Joe">
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">N° de téléphone</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="0783123457">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <textarea class="form-control" id="address" rows="2" name="address" placeholder="163 Kamryn Streets
New Brandt, ME 57906-3609"></textarea>
            </div>
            <div class="mb-3">
                <label for="bankingDetails" class="form-label">Données Bancaire</label>
                <textarea class="form-control" id="bankingDetails" rows="1" name="bankingDetails" placeholder="6052924475"></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Créer</button>
            </div>
        </form>
    </div>
</x-app-layout>