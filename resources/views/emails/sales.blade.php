<div>
    <h1>
        Olá, {{ $seller->name }}!
    </h1>
    <h1>
        Total de vendas:
    </h1>
    {{$sales}}

    <h2>
        Data: {{now()->format('d/m/Y')}}
    </h2>
</div>