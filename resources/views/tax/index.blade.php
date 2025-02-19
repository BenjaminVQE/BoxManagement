<x-app-layout>
    <div>
        <h3>Informations fiscales</h3>
        <p>Revenu total annuel : {{ number_format($totalAmount, 2) }} €</p>

        @if ($totalAmount < 15000)
            <p>Régime Micro-foncier : Vous devez déclarer <strong>{{ number_format($amountTaxes, 2) }} €</strong>
                dans la <strong>case {{ $case }}</strong> (abattement de 30%).</p>
        @else
            <p>Régime Réel : Vous devez déclarer <strong>{{ number_format($amountTaxes, 2) }} €</strong> dans la
                <strong>case {{ $case }}</strong>.
            </p>
        @endif
    </div>
</x-app-layout>
