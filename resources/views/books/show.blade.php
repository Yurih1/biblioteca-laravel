<x-layout title="Alugar livro">

    @if($book->situation == 'EMPRESTADO')
        <p class="mt-5 mb-5">Está livro já está emprestado. Favor aguardar.</p>
        <a href="/books/create" class="btn btn-danger">Voltar</a>
    @else
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="nome" value="{{ $book->name }}" readonly>

            <label for="name" class="form-label">Autor:</label>
            <input type="text" id="author" name="autor" value="{{ $book->author }}" readonly>

            <label for="name" class="form-label">Gênero:</label>
            <input type="text" id="genre" name="genero" value="{{ $book->genre }}" readonly><br>
    
        </div>

        <form action="/books/reserving/{{ $book->id }}" method="post">
            <label for="name" class="form-label">Adicionar usuário:</label>
            <select name="usuarios" id="usuarios">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>

            <label for="birthday">Data de devolução:</label>
            <input class="slds-input" type="date" id="datemin" name="datemin" min="{{ $date }}" required>


            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <input type="hidden" name="situacao" id="situation" value="EMPRESTADO" />

            <button type="submit" class="btn btn-primary">salvar</button>
            <a href="/books/create" class="btn btn-danger">Voltar</a>
        </form>
    
    @endif

</x-layout>
