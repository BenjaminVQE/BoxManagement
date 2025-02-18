<x-app-layout>
    <div class="container mt-4 pb-4">
        <form class="row g-3" method="POST" action="{{ route('contracts.store') }}" id="form">
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
                <input type="number" class="form-control" step="0.01" id="monthlyPrice" name="monthlyPrice"
                    placeholder="332">
            </div>
            <div class="mb-3">
                <label for="box" class="form-label">Box</label>
                <select class="form-select" aria-label="Default select example" name="box" id="box">
                    <option disabled selected>Choisir un box</option>
                    @foreach ($boxes as $box)
                        <option value="{{ $box->id }}" data-box="{{ json_encode($box) }}">{{ $box->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tenant" class="form-label">Locataire</label>
                <select class="form-select" aria-label="Default select example" name="tenant" id="tenant">
                    <label>Locataire</label>
                    <option disabled selected>Choisir un locataire</option>
                    @foreach ($tenants as $tenant)
                        <option value="{{ $tenant->id }}" data-tenant="{{ json_encode($tenant) }}">
                            {{ $tenant->firstName . ' ' . $tenant->lastName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="contractTemplate" class="form-label">Modèle du contrat</label>
                <select class="form-select" aria-label="Default select example" name="contractTemplate"
                    id="contractTemplate">
                    <option disabled selected>Choisir un modèle</option>
                    @foreach ($contractTemplates as $contractTemplate)
                        <option value="{{ $contractTemplate->id }}" data-content="{{ $contractTemplate->content }}">
                            {{ $contractTemplate->name }}
                        </option>
                    @endforeach
                </select>
                <input type="text" hidden name="content" id="content">
            </div>
            <div id="editor" style="height: 65vh;"></div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Créer</button>
            </div>
        </form>
    </div>
    <script>
        const container = document.getElementById('editor');

        const quill = new Quill(container, {
            theme: 'snow',
            readOnly: true,
            modules: {
                toolbar: false,
            },
        });

        document.getElementById('contractTemplate').addEventListener('change', function(e) {
            let selectedOption = e.target.options[e.target.selectedIndex];
            let content = selectedOption.getAttribute('data-content');
            let parsedContent = JSON.parse(content);

            // Récupérer les informations du box sélectionné
            let boxSelect = document.getElementById('box');
            let selectedBox = boxSelect.options[boxSelect.selectedIndex];
            let boxData = JSON.parse(selectedBox.getAttribute('data-box'));

            // Récupérer les informations du locataire sélectionné
            let tenantSelect = document.getElementById('tenant');
            let selectedTenant = tenantSelect.options[tenantSelect.selectedIndex];
            let tenantData = JSON.parse(selectedTenant.getAttribute('data-tenant'));

            parsedContent.ops.forEach(function(op) {
                if (op.insert) {
                    let text = op.insert;

                    text = text.replace(/\/tenantFirstName\//g, tenantData.firstName)
                        .replace(/\/tenantLastName\//g, tenantData.lastName)
                        .replace(/\/tenantAddress\//g, tenantData.address)
                        .replace(/\/tenantPhoneNumber\//g, tenantData.phoneNumber)
                        .replace(/\/tenantEmail\//g, tenantData.email)
                        .replace(/\/tenantBankingDetails\//g, tenantData.bankingDetails)
                        .replace(/\/boxName\//g, boxData.name)
                        .replace(/\/boxSurface\//g, boxData.surface)
                        .replace(/\/boxAddress\//g, boxData.address);

                    const regex = /\/([^\/]+)\//g;
                    const matches = [...text.matchAll(regex)].map(match => match[1]);

                    op.insert = text;
                }

                quill.setContents(parsedContent);
            });
        });

        document.getElementById('form').addEventListener('submit', function() {
            const content = JSON.stringify(quill.getContents());
            document.getElementById('content').value = content;
        });
    </script>
</x-app-layout>
