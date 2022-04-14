<h1>Pets!!!</h1>

Seus pets:

<a href="/pets/create" >Adicionar</a>

<ul>
    @foreach ($pets as $pet)
        <li>
            <a href="/pets/{{ $pet->id }}">
                {{ $pet->name }}
            </a>
        </li>
    @endforeach
</ul>
