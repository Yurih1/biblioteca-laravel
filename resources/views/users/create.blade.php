<x-layout title="Cadastrar novo(a) Usuário(a)">

    <form action="/users/save" method="post">
    
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

        <div class="mb-3">
            <label for="name" class="form-label">Nome <span>*</span>:</label>
            <input type="text" id="name" name="nome" class="form-control" required>

            <label for="name" class="form-label">E-mail <span>*</span>:</label>
            <input type="text" id="email" name="email" class="form-control" required>

        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>

    <div class="mb-5">
        <h4  class="display-6 mt-5 mb-5">Clientes cadastrados</h4>
        <div class="mb-5">
        
            <table class="table">
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>

                    </tr>
                    @foreach($users as $user)
                        <tr> 
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="/users/view-detail/{{ $user->id }}" class="btn btn-secondary">Editar</a></td>
                            <td><a href="/users/delete/{{ $user->id }}" class="btn btn-danger">Excluir</a></td>
                        </tr> 

        </div>
            @endforeach
            </table>

    </div>

</x-layout>