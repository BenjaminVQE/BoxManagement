<x-app-layout>
    <div class="container p-3">
        <form method="POST" action="{{ route('contracts_template.store') }}" id="form">
            @csrf
            @method('POST')
            <div class="d-flex justify-content-between">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom du modèle</label>
                    <input type="name" class="form-control" id="name" name="name"
                        placeholder="Modèle Contrat #1">
                </div>
                <input type="text" hidden id="content" name="content" value="">
                <button class="btn btn-primary h-25" type="submit" id="saveButton">Créer</button>
            </div>
        </form>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Variables Contrat
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Variable</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan=2 style="font-weight: bold;">LOCATAIRE</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/tenantFirstName/</th>
                                    <td>Prénom du locataire</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/tenantLastName/</th>
                                    <td>Nom du locataire</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/tenantAddress/</th>
                                    <td>Adresse du locataire</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/tenantPhoneNumber/</th>
                                    <td>Numéro de tél du locataire</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/tenantEmail/</th>
                                    <td>Email du locataire</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/tenantBankingDetails/</th>
                                    <td>Cordonnées bancaire du locataire</td>
                                </tr>
                                <tr>
                                    <td colspan=2 style="font-weight: bold;">BOX</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/boxName/</th>
                                    <td>Nom du box</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/boxSurface/</th>
                                    <td>Surface du box</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="font-weight: lighter">/boxAddress/</th>
                                    <td>Surface du box</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="editor" style="height: 65vh;"></div>
    </div>

    <script>
        const container = document.getElementById('editor');

        const quill = new Quill(container, {
            theme: 'snow'
        });

        document.getElementById('form').addEventListener('submit', function() {
            const content = JSON.stringify(quill.getContents());
            document.getElementById('content').value = content;
        });
    </script>
</x-app-layout>
