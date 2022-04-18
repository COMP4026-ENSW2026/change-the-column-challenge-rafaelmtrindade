Adicionar novo pet:

<form action="/pets" method="post">
    @csrf

    <label for="name">Nome</label>
    <input id="name" name="name" type="text" /> <br />

    <label for="color">Cor</label>
    <input id="color" name="color" type="text" /> <br />

    <label for="specie">Especie</label>
    <select name="specie" id="specie">
        <option value="cachorro">Cachorro</option>
        <option value="calopsita">Calopsita</option>
        <option value="cavalo">Cavalo</option>
        <option value="cobra">Cobra</option>
        <option value="coelho">Coelho</option>
        <option value="gato">Gato</option>
        <option value="hamster">Hamster</option>
        <option value="lagarto">Lagarto</option>
        <option value="papagaio">Papagaio</option>
        <option value="peixe">Peixe</option>
        <option value="periquito">Periquito</option>
        <option value="rato">Rato</option>
        <option value="tartaruga">Tartaruga</option>
        <option value="outro">Outro</option>
    </select> <br />

    <label for="size">Size</label>
    <select name="size" id="size">
        <option value="XS">XS</option>
        <option value="SM">SM</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select>

    <br />
    <button type="submit">
        Cadastrar
    </button>
</form>

<a href="/pets">Voltar</a>