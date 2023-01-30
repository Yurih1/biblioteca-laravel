<x-layout title="Atualizar usuário">

<form action="/users/edit/{{ $user->id }}" method="post">
    
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

    <div class="mb-3">
        <label for="name" class="form-label">Nome <span>*</span>:</label>
        <input type="text" id="name" name="nome" class="form-control" value="{{ $user->name }}" required>

        <label for="name" class="form-label">Email <span>*</span>:</label>
        <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
        
        @if($user->devolution_date != null)
            <label for="name" class="form-label">Livro devolvido? :</label>
            <input type="checkbox" id="returned" name="devolvido" value="sim" {{ $checked }}>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="/users/create" class="btn btn-danger">Voltar</a>
</form>
@if($interval < 0 )
    <p style="color:Red;" class="mb-3 mt-3">DEVOLUÇÃO ATRASADA</p>
@endif

</x-layout>