package com.ecotrack.ui;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;
import java.util.Objects;

/**
 * Lanceur minimal — connexion / inscription (UI).
 * Scene Builder : ouvrir {@code fxml/EcoTrackAuthView.fxml}.
 */
public class EcoTrackFxApp extends Application {

    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader loader = new FXMLLoader(Objects.requireNonNull(
                getClass().getResource("/fxml/EcoTrackAuthView.fxml")));
        Parent root = loader.load();
        Scene scene = new Scene(root);
        stage.setTitle("EcoTrack — Connexion");
        stage.setMinWidth(900);
        stage.setMinHeight(620);
        stage.setScene(scene);
        stage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }
}
