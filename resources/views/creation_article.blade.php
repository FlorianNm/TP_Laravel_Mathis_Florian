<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer ton article !') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Créer ton article !

                    <form action="{{route('article.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="nom" class="form-control" placeholder="Nom de l'article">
                            <select>
                                @foreach($categories as $categorie)
                                    <option>{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div><br>
                        <div>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <button type="reset" class="btn btn-danger">Effacer</button>
                        </div>
                    </form><br><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>