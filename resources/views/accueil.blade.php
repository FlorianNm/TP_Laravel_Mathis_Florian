<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <strong><font size="6pt"><u>Liste des catégories :</u></font></strong>
                    </br></br>

                    @foreach($categories as $categorie)
                        <a href="{{ url('accueil/'.$categorie->id)}}">{{ $categorie->nom }}</a></br></br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
