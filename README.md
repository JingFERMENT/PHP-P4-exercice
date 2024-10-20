# The ArtBox

The ArtBox est un site web permettant de gérer des œuvres d'art à l'aide d'une base de données. Ce projet inclut la récupération, l'affichage et l'ajout d'œuvres, ainsi que la gestion des erreurs lors de l'ajout de nouvelles œuvres via un formulaire.

## Fonctionnalités

1. **Affichage des œuvres sur la page d'accueil**  
   Les œuvres affichées sur la page d'accueil sont récupérées directement depuis la base de données.

2. **Page de détail d'une œuvre**  
   Chaque œuvre possède une page de détail individuelle. Les informations de l'œuvre sont récupérées en base de données.

3. **Affichage d'une page d'erreur en cas d'œuvre inexistante**  
   Si un utilisateur tente d'accéder à une œuvre qui n'existe pas dans la base de données, il sera redirigé automatiquement vers la page d'accueil.

4. **Ajout d'une nouvelle œuvre**  
   Une fonctionnalité permet d'ajouter une nouvelle œuvre à la liste des œuvres via un formulaire.

5. **Gestion des erreurs de formulaire**  
   Le formulaire d'ajout d'œuvres traite les erreurs suivantes :
   - Titre vide
   - Auteur vide
   - Lien ne respectant pas le format d'une URL valide
   - Description inférieure à 3 caractères

