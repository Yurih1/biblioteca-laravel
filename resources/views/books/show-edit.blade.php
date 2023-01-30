<x-layout title="Editar informações do livro">

    <form action="/books/edit/{{ $book->id }}" method="post">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="nome" value="{{ $book->name }}" required>

            <label for="name" class="form-label">Autor:</label>
            <input type="text" id="author" name="autor" value="{{ $book->author }}" required>

            <label for="name" class="form-label">Gênero:</label>
            <input type="text" id="genre" name="genero" value="{{ $book->genre }}" ><br>

            <button type="submit" class="btn btn-primary">salvar</button>
            <a href="/books/create" class="btn btn-danger">Voltar</a>
    
        </div>
    </form>

</x-layout>
