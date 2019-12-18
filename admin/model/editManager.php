<?php

class editManager extends Manager {

    public function getAllChapter() {
        $db = $this->dbConnect();

        $gac = $db->prepare('SELECT * FROM billets WHERE id = ?');
        $gac->execute([$_GET['chapitre']]);

        return $gac->fetchAll();
    }

    public function enregistrerChapitre($chemin) {
        $db = $this->dbConnect();

        $ec = $db->prepare('INSERT INTO billets(titre, contenu, lien_image)
                       VALUES(:titre, :contenu, :image)');

        $valeurRetour = $ec->execute([
                    ":titre"   => $_POST['titre'],
                    ":contenu" => $_POST['contenu'],
                    ":image"   => $chemin
        ]);

        return $valeurRetour;
    }

    public function majChapitre($chemin) {

        $db = $this->dbConnect();

        $majc = $db->prepare('UPDATE billets
                              SET titre = :titre,
                                  contenu = :contenu,
                                  lien_image = :image
                              WHERE id = :id');

        $valeurRetour = $majc->execute([
                       ":titre"   => $_POST['titre'],
                       ":contenu" => $_POST['contenu'],
                       ":image"   => $chemin,
                       ":id"      => $_GET['chapitre']
        ]);

        return $valeurRetour;
    }

    public function supprimerChapitre() {
        $db = $this->dbConnect();

        $sc = $db->prepare('DELETE from billets 
                            WHERE id = ?');

        $sc->execute([$_SESSION['chapitreASupprimer']]);

        // on a supprimé le chapitre, il faut aussi supprimer les commentaires associés !
        $db = $this->dbConnect();

        $scc = $db->prepare('DELETE from commentaires 
                            WHERE id_billet = ?');

        $scc->execute([$_SESSION['chapitreASupprimer']]);
    }
}