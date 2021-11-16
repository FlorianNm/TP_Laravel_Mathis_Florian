<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach($detailarticles as $detailarticle)
                {{ $detailarticle->nom }}</br>
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <p><strong><font size="5">Ajouter un commentaire :</font></strong></p></br>

                    <form  action="{{route('commentaire.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="int" name="article_id" class="form-control" placeholder="id article"><br>
                            <input type="text" name="libelle" class="form-control" placeholder="Commentaire">
                            <select name="note">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div><br>
                        <div>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <button type="reset" class="btn btn-danger">Effacer</button>
                        </div>
                    </form><br><br>

                    <p><strong><font size="5">Commentaires :</font></strong></p></br>
                        
                    @foreach($commentaires as $commentaire)
                        <div style="border-width:2px">
                            @foreach($users as $user)
                                @if ($commentaire->user_id == $user->id)
                                   <strong>Compte :</strong> {{ $user->name }}</br>
                                @endif
                            @endforeach
                            <strong>Description :</strong> {{ $commentaire->libelle }}</br>
                            <strong>Note :</strong> {{ $commentaire->note }}/5</br>
                        </div>
                        <br>
                    @endforeach
                    
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>