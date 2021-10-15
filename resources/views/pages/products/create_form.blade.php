<form class="form"
    action="{{ route('products.store') }}"
    method="POST">

    <div class="form__group">
        <label for="name"
            class="form__group--label">
            Nome do produto
        </label>
        <input class="form__group--input"
            type="text"
            name="name"
            id="name"
            placeholder="Nome do Produto"
            autocomplete="off">
    </div>

    <div class="form__group">
        <label for="description"
            class="form__group--label">
            Descrição do produto
        </label>
        <textarea class="form__group--input" name="description" id="description"></textarea>
    </div>

    <div class="form__group">
        <label for="price"
            class="form__group--label">
            Preço
        </label>
        <input class="form__group--input"
            step="0.01"
            type="number"
            name="price"
            id="price"
            placeholder="Preço do Produto"
            autocomplete="off">
    </div>

    <div class="form__group__button">
        <button class="form__group__button--submit">
            Enviar
        </button>
    </div>
</form>
