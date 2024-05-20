
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche PFE</title>
    <link rel="stylesheet" href="{{ asset('css/Fiche_PFE.css') }}"/>
    
</head>
<body>
    <div class="card">
        <span class="title">Fiche PFE</span>
        <form class="form" name="F" method="POST" action="{{ route('updatefiche',$data['id']) }}">
          @csrf

          <div class="group">
            <input placeholder="‎" type="text" name="societe_acceuil" value={{$data['societe_acceuil'] }} required="" >
            <label for="name">Societe d'acceuil</label>
          </div>

          <div class="group">
            <input placeholder="‎" type="text" id="enc" name="encadrant_externe" value={{$data['encadrant_externe'] }} required="" >
            <label for="enc">Encadrant externe</label>
          </div>

          <div class="group">
            <input placeholder="‎" type="text" id="tel" name="ntel_societe" value={{$data['ntel_societe'] }}  required="" >
            <label for="tel">Numero tel de Societe </label>
          </div>

          <div class="group">
            <input placeholder="‎" type="email" id="email" name="mail_societe" value={{$data['mail_societe'] }} required="" >
            <label for="email">Email Societe</label>
          </div>

          <div class="group">
            <input placeholder="‎" type="text" id="tit" name="intitule_pfe" value={{$data['intitule_pfe'] }} required="" >
            <label for="tit">Intitulé du PFE</label>
          </div>

           <div class="group">
            <textarea placeholder="‎" id="bes" name="besions_fonctionnels" rows="5" required="" >{{$data['besions_fonctionnels'] }}</textarea>
            <label for="bes">Besion fonctionnels</label>
          </div>

          <div class="group">
            <textarea placeholder="‎" id="tech" name="technologies_utilisees" rows="5" required="" >{{$data['technologies_utilisees'] }}</textarea>
            <label for="tech">Technologies utilisees</label>
          </div>

          
          <div class="rad" >
            Langue:
            <input name="langue" type="radio" value="Francais" {{ $data->langue === 'Francais' ? 'checked' : '' }}/> Francais
            <input name="langue" type="radio" value="Anglais" {{ $data->langue === 'Anglais' ? 'checked' : '' }}/>  Anglais
        </div>

        <select name="Remarque">
          <option value="en Attente" {{ $data['Remarque'] === 'en Attente' ? 'selected' : '' }}>En Attente</option>
          <option value="accepte" {{ $data['Remarque'] === 'accepte' ? 'selected' : '' }}>Accepte</option>
          <option value="refuse" {{ $data['Remarque'] === 'refuse' ? 'selected' : '' }}>Refuse</option>
      </select><br><br>

          
          <button type="submit">Submit</button><br>

        </form>
          
    </div>
        
</body>
</html>