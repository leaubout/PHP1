<?php
    $title = "Recherche d'articles par le titre";
    
    require_once "../bdd/articles.php";
    $erreur = "";
    if (isset($_POST['search']) && $_POST['search'] == "go"){
        if (isset($_POST['inputSearch'])){
            $length = mb_strlen($_POST['inputSearch']);
            if ($length == 0){
                $erreur = "Vous devez saisir saisir un titre d'article.";
            }else if ($length < 3){
                $erreur = "Vous devez saisir au moins 3 caractères pour que la recherche ne renvoie pas trop d'articles.";
            }else{
                // on nettoie les données reçues de l'utilisateur
                $data = cleanPOST($_POST);
                $articles = NULL;
                $articles = readByTitle($data['inputSearch']);
            }
        }
    }
?>        
        <div class="container">
            <h3>Bienvenue sur le système de recherche d'articles</h3>
            
            <div class="alert alert-danger" role = "alert" <?php if (empty($erreur)){echo "hidden";} ?>>
                <?php if (!empty($erreur)){ echo $erreur; }?>
            </div>
            
            <form class="form-inline" role="form" action="" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="inputSearch">
                </div>
                <button class="btn btn-large btn-primary" name="search" type="submit" value="go">Rechercher</button>
            </form>
            <br><br>
            <?php $mock = [
                ['id'=>4, 'titre' => 'Titre 1', 'slug'=>'the']
                
            ];?>
            <div id="list">
                <?php
                if (isset($_POST['search']) && $_POST['search'] == 'go'){ 
                    if ($articles == FALSE){?>
                        Aucun résultat trouvé...
                <?php }else{ ?>
                <ul>
                    <?php 
                            foreach($articles as $article){?>
                                            
                            <li id="art_<?= $article['id']?>">
                                <a href="article/<?= $article['slug']?>"><?= $article['titre']?></a>
                            </li>
                        
                  <?php     }?>
                  </ul>
                  <?php } 
                }?>
                
            </div>
        </div>    
        