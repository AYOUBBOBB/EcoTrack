# EcoTrack — interface JavaFX (connexion & inscription)

Maquette desktop alignée sur `templates/security/login.html.twig` (couleurs, carte, dégradé gauche).

**Maven** : artefact `com.ecotrack:javafx-ecotrack-auth` — lancer avec `mvn javafx:run` (classe principale `EcoTrackFxApp`).

## Fichiers principaux

| Fichier | Rôle |
|--------|------|
| `src/main/resources/fxml/EcoTrackAuthView.fxml` | **Ouvrir dans Scene Builder** — connexion + inscription (`StackPane` : deux cartes) |
| `src/main/resources/fxml/include/EcoTrackBrandingPanel.fxml` | Bandeau gauche vert / bleu |
| `src/main/resources/css/ecotrack.css` | Thème `-fx-*` EcoTrack |
| `src/main/java/com/ecotrack/ui/EcoTrackAuthController.java` | Contrôleur (`@FXML`, bascule login ↔ register) |
| `src/main/java/com/ecotrack/ui/EcoTrackFxApp.java` | Lanceur |

## Lancer

```bash
cd javafx-ecotrack
mvn javafx:run
```

## Navigation UI

- **Créer un compte** → panneau inscription  
- **Se connecter** (lien) → retour panneau connexion  

Aucun appel réseau : messages de démo dans les bandeaux vert / rouge.
