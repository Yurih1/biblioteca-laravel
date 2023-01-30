<x-layout title="Cadastrar novo livro">

    <form action="/books/save" method="post">
    
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="mb-3">
            <label for="name" class="form-label">Nome <span>*</span>:</label>
            <input type="text" id="name" name="nome" class="form-control" required>

            <label for="name" class="form-label">Autor <span>*</span>:</label>
            <input type="text" id="author" name="autor" class="form-control" required>

            <label for="name" class="form-label">Gênero:</label>
            <input type="text" id="genre" name="genero" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    <div class="mb-5">
        <h4  class="display-6 mt-5 mb-5">Livros cadastrados</h4>
        <div class="mb-5">
        
            <table class="table">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Situação</th>
                    </tr>
                    @foreach($books as $book)
                        <tr> 
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->situation }}</td>
                            <td><a href="/books/reserve/{{ $book->id }}" class="btn btn-success" >Alugar</a></td>
                            <td><a href="/books/edit/{{ $book->id }}" class="btn btn-secondary">Editar</a></td>
                            <td><a href="/books/delete/{{ $book->id }}" class="btn btn-danger">Excluir</a></td>
                        </tr> 
        </div>
            @endforeach
            </table>

    </div>

</x-layout>