# Comptes Utilisateurs - Ninja Network

## 🔐 Comptes Administrateurs

### Admin Principal
- **Email** : `admin@ninja.com`
- **Mot de passe** : `admin123`
- **Rôle** : Admin
- **Description** : Compte administrateur principal avec tous les droits

### Maître Kenshin
- **Email** : `kenshin@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : Admin
- **Description** : Maître administrateur du système

### Yuki Sensei
- **Email** : `yuki@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : Admin
- **Description** : Administratrice spécialisée

## 👥 Comptes Utilisateurs Normaux

### Hiroshi Tanaka
- **Email** : `hiroshi@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : User
- **Description** : Utilisateur standard

### Sakura Yamamoto
- **Email** : `sakura@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : User
- **Description** : Utilisatrice standard

### Kenji Sato
- **Email** : `kenji@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : User
- **Description** : Utilisateur standard

### Maya Nakamura
- **Email** : `maya@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : User
- **Description** : Utilisatrice standard

### Takeshi Kimura
- **Email** : `takeshi@ninja.com`
- **Mot de passe** : `password123`
- **Rôle** : User
- **Description** : Utilisateur standard

## 🎯 Permissions par Rôle

### Administrateurs (Admin)
- ✅ Accès au dashboard administrateur
- ✅ Créer des ninjas
- ✅ Supprimer des ninjas
- ✅ Gérer les utilisateurs
- ✅ Changer les rôles des utilisateurs
- ✅ Voir toutes les statistiques
- ✅ Accès complet à toutes les fonctionnalités

### Utilisateurs (User)
- ✅ Voir la liste des ninjas
- ✅ Voir les détails d'un ninja
- ❌ Créer des ninjas
- ❌ Supprimer des ninjas
- ❌ Accéder au dashboard admin
- ❌ Gérer les utilisateurs

## 🚀 Comment utiliser

1. **Connexion** : Allez sur `/login` et utilisez un des comptes ci-dessus
2. **Test Admin** : Connectez-vous avec `admin@ninja.com` / `admin123`
3. **Test User** : Connectez-vous avec `hiroshi@ninja.com` / `password123`

## 📝 Notes

- Tous les mots de passe sont sécurisés avec bcrypt
- Les comptes admin peuvent promouvoir des utilisateurs en admin
- Les nouveaux utilisateurs s'inscrivant via `/register` sont automatiquement des "User"
- Seuls les admins peuvent créer et supprimer des ninjas 