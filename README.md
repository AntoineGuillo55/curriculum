# Curriculum

Ce projet est une application web CV réalisée en Symfony permettant de présenter mon parcours professionnel, mes expériences, mes études et mon portfolio. Il s'agit d'un site CV interactif avec gestion d'administration, formulaire de contact, et affichage dynamique des expériences et projets.

## Fonctionnalités principales
- Présentation des expériences professionnelles (jobs)
- Présentation du cursus universitaire
- Portfolio de projets
- Interface d'administration sécurisée
- Formulaire de contact
- Thème sombre/clair

## Technologies utilisées
- Symfony (PHP)
- Twig
- Doctrine ORM
- JavaScript (vanilla)
- CSS personnalisé

## Procédure de déploiement

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/AntoineGuillo55/curriculum.git
   cd curriculum
   ```
2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```
3. **Créer le fichier d'environnement**
   - Copier le fichier `.env.example` en `.env` et adapter les variables (base de données, mailer, etc).

4. **Créer la base de données**
   ```bash
   php bin/console doctrine:database:create
   php bin/console doctrine:migrations:migrate
   ```
5. **Lancer le serveur de développement Symfony**
   ```bash
   symfony server:start
   # ou
   php -S localhost:8000 -t public
   ```
6. **Accéder à l'application**
   - Rendez-vous sur [http://localhost:8000](http://localhost:8000)

## Auteur
Antoine Guillo

---
N'hésitez pas à ouvrir une issue ou une pull request pour toute suggestion ou amélioration !
