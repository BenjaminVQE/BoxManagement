<x-app-layout>
    <div class="container mt-4 pb-4">
        <form class="row g-3" method="POST" action="{{ route('tenants.update') }}">
            @csrf
            @method('PUT')
                
            <input type="hidden" name="id" value="{{ $tenant['id'] }}">
            
            <div class="mb-3">
                <label for="lastName" class="form-label">Nom</label>
                <input type="name" class="form-control" id="lastName" name="lastName" placeholder="Doe" value='{{$tenant['lastName']}}'>
            </div>
            <div class="mb-3">
                <label for="firstName" class="form-label">Prénom</label>
                <input type="name" class="form-control" id="firstName" name="firstName" placeholder="John" value='{{$tenant['firstName']}}'>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">N° de téléphone</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="0789323484" value='{{$tenant['phoneNumber']}}'>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="user@example.com" value='{{$tenant['email']}}'>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <textarea class="form-control" id="address" rows="2" name="address">{{$tenant['address']}}</textarea>
            </div>
            <div class="mb-3">
                <label for="bankingDetails" class="form-label">Données Bancaire</label>
                <textarea class="form-control" id="bankingDetails" rows="1" name="bankingDetails">{{$tenant['bankingDetails']}}</textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Modifier</button>
            </div>
        </form>
    </div>
</x-app-layout>