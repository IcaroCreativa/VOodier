PAGE REGISTER


    <h1>Ajouter une annonce</h1>

    <form action="{{Route('register')}}" method="post" enctype="multipart/form-data">
    <!-- CSRF signifie Cross-Site Request Forgery. C’est une attaque qui consiste à faire envoyer par un client une requête à son insu. Cette attaque est relativement simple à mettre en place et consiste à envoyer à un client authentifié sur un site un script dissimulé (dans une page web ou un email) pour lui faire accomplir une action à son insu.
    Pour se prémunir contre ce genre d’attaque Laravel génère une valeur aléatoire (token) associée au formulaire de telle sorte qu’à la soumission cette valeur est vérifiée pour être sûr de l’origine.
    Ce middleware CSRF est rangé dans le dossier app/Http/Middleware -->
    @csrf
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="titre" id="">{{ $errors->first('title', ':message') }}</td>
        </tr>
        <tr>
            <td>Category</td>
            <td><input type="text" name="categorie_id" id="">{{ $errors->first('categorie_id', ':message') }}</td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" id="">{{ $errors->first('description', ':message') }}</td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><input type="file" id="" name="img" accept="image/png, image/jpeg">{{ $errors->first('img', ':message') }}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="prix" id="">{{ $errors->first('prix', ':message') }}</td>
        </tr>
        <tr>
            <td>Location</td>
            <td><input type="text" name="localisation" id="">{{ $errors->first('localisation', ':message') }}</td>
        </tr>

        <tr>
            <td>Condition</td>
            <td>
            <select name="condition" id="condition">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                
            </select>{{ $errors->first('localisation', ':message') }}</td>
        
        </tr>
        <tr>
            <td><input type="submit" value="Envoyer"></td>
            <td><input type="reset" value="Annuler"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    </form>
