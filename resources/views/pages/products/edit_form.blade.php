<form class="form"
    action="{{ route('products.update', $product) }}"
    method="POST">
    @method('PUT')
    @csrf

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
            autocomplete="off"
            value="{{ $product->name }}">

        @if ($errors->has('name'))
            <span class="badge--primary">
                {{ $errors->first('name') }}
            </span>
        @endif

    </div>

    <div class="form__group">
        <label for="description"
            class="form__group--label">
            Descrição do produto
        </label>
        <textarea class="form__group--input" name="description" id="description">{{ $product->description }}</textarea>

        @if ($errors->has('description'))
            <span class="badge--primary">
                {{ $errors->first('description') }}
            </span>
        @endif

    </div>

    <div class="form__group">
        <label for="price"
            class="form__group--label">
            Preço (em Reais)
        </label>
        <input class="form__group--input"
            step="0.01"
            type="number"
            name="price"
            id="price"
            placeholder="Preço do Produto"
            autocomplete="off"
            value="{{ $product->price }}">

        @if ($errors->has('price'))
            <span class="badge--primary">
                {{ $errors->first('price') }}
            </span>
        @endif
    </div>

    <div class="form__group__button">
        <button class="form__group__button--submit">
            Enviar
        </button>
    </div>
</form>
