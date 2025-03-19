<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\StoreGroupRequest;
use App\Mail\groupCreateMail;
use App\Models\Group;
use App\Models\Liste;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GroupController extends Controller
{

    // fonction pour afficher la view groupTemplate avec le Code du group crée ainsi que tout les users dans le groupe et les liste dans le groupe
    public function show(Group $group, $code)
    {
        $group = Group::where('code', $code)->firstOrFail();
        $users = $group->users;
        $AllListes = Liste::where('group_id', $group->id)->get();
        return view('groupTemplate.groupTemplate', ['group' => $group], compact('users', 'AllListes'));
    }


    // fonction pour afficher la view Mes Groupes avec les groupes de l'utilisateurs connecter
    public function index() {
        // User groups
        $groups = auth()->user()->groups;
        return view('groups.groups', ['groups' => $groups]);
    }


    // Fonction pour crée un Groupe
    public function save(Request $request)
    {
        // On Verifie si l'utilisateur est bien connecté
        if (!auth()->check()) {
            return redirect()->route('login'); // on redirige vers la page de connexion si pas connecter
        }

        // Récupère l'id de l'utilisateur connecté
        $userId = auth()->id();

        // on crée un nouveau groupe avec les données du formulaire
        $group = Group::create([
            'name' => $request->input('name'),
            'user_id' => $userId,
            'code' => Group::generateUniqueCode(),
            'group_id' => $request->input('group_id'),
        ]);

        // on envoie un email de confirmation à l'utilisateur après la création du groupe
        Mail::to(auth()->user()->email)->send(new groupCreateMail($group));

        // Ajoute le créateur du groupe comme membre du groupe
        $group->users()->attach($userId);

        // et on redirige vers la page du groupe créé avec son code
        return redirect()->route('group.show', ['code' => $group->code]);
    }




    // Function pour crée une Liste avec la request du formulaire en paramettre
    public function createListe(Request $request)
    {
        // Tout d'abord on vavenir valider le formulaire recus
        $request->validate([
            'group_id' => 'required|integer|exists:groups,id',
            'name' => 'required|string|max:10',
            'description' => 'required|string|max:255'
        ]);

        // On vient stocker l'id du groupe dans la variable $group
        $group = Group::where('id', $request->input('group_id'))->firstOrFail();

    // On vient Crée la Liste avec la methode create avec les parametre de la liste ('group_id', 'user_id', 'name', 'description')
       Liste::create([
            'group_id' => $request->input('group_id'),
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
    // et on renvoie vers le bon groupe grace au code du group
        return redirect()->route('group.show', $group->code );
    }



    // Function pour Supprimer Une liste avec L'id en paramettre
    public function SuppListe($id)
    {
        // stock la liste selectionné dans $liste
        $liste = Liste::findOrFail($id);

        // si l'user_id de la liste selectionner correspond pas a l'id de la personne connecter
        if ($liste->user_id !== auth()->id()) {
            // tu refuse et pars
            return redirect()->back();
        }
        // sinon tu supprime la liste
        $liste->delete();
        return redirect()->back();
    }


    // Function pour Supprimer Un groupe avec L'id en paramettre
    public function deleteGroup($id)
    {
        // stock la liste selectionné dans $group
        $group = Group::findOrFail($id);

        // si l'user_id du group selectionner correspond pas a l'id de la personne connecter
        if ($group->user_id !== auth()->id()) {
            // tu refuse et pars
            return redirect()->back();
        }
        // sinon tu supprime le groupe
        $group->delete();

        return redirect()->route('groups');
    }

}
