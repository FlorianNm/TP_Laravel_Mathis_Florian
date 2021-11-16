<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une catégorie !') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    Ajouter une catégorie !

                    <form action="{{route('categorie.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Nom du commentaire">
                        </div></br>
                        <div>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <button type="reset" class="btn btn-danger">Effacer</button>
                        </div>
                    </form></br></br>

                    <table>
                        <thead>
                            <tr>
                                <th scope="row">id</th>
                                <td>nom</td>
                                <td>created</td>
                                <td>updated</td>
                                <td>bouton</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                                <tr>
                                    <th scope="row">{{ $categorie->id }}    -</th>
                                    <td>{{ $categorie->nom }}   -</td>
                                    <td>{{ $categorie->created_at }}    -</td>
                                    <td>{{ $categorie->updated_at }}    -</td>
                                    <td>
                                        <form action="{{ route("categorie.delete") }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>