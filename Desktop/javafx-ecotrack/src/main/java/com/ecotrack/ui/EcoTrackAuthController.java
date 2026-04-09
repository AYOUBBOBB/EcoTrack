package com.ecotrack.ui;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.CheckBox;
import javafx.scene.control.Hyperlink;
import javafx.scene.control.Label;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;

/**
 * Contrôleur pour {@code EcoTrackAuthView.fxml} — connexion et inscription (UI uniquement).
 */
public class EcoTrackAuthController {

    // region Navigation
    @FXML
    private VBox paneLogin;

    @FXML
    private VBox paneRegister;
    // endregion

    // region Connexion
    @FXML
    private TextField loginEmailField;

    @FXML
    private PasswordField loginPasswordField;

    @FXML
    private CheckBox loginRememberCheck;

    @FXML
    private Hyperlink linkForgotPassword;

    @FXML
    private Button buttonLoginSubmit;

    @FXML
    private Button buttonSocialGoogle;

    @FXML
    private Button buttonSocialFacebook;

    @FXML
    private Hyperlink linkGoToRegister;

    @FXML
    private HBox messageBannerLogin;

    @FXML
    private Label messageLabelLogin;
    // endregion

    // region Inscription
    @FXML
    private TextField registerNameField;

    @FXML
    private TextField registerEmailField;

    @FXML
    private PasswordField registerPasswordField;

    @FXML
    private PasswordField registerPasswordConfirmField;

    @FXML
    private Button buttonRegisterSubmit;

    @FXML
    private Hyperlink linkGoToLogin;

    @FXML
    private HBox messageBannerRegister;

    @FXML
    private Label messageLabelRegister;
    // endregion

    @FXML
    private void initialize() {
        showLoginPanel();
    }

    // region Basculer connexion / inscription

    @FXML
    private void onGoToRegisterClicked() {
        hideMessageLogin();
        hideMessageRegister();
        showRegisterPanel();
    }

    @FXML
    private void onGoToLoginClicked() {
        hideMessageRegister();
        hideMessageLogin();
        showLoginPanel();
    }

    private void showLoginPanel() {
        paneLogin.setVisible(true);
        paneLogin.setManaged(true);
        paneRegister.setVisible(false);
        paneRegister.setManaged(false);
    }

    private void showRegisterPanel() {
        paneRegister.setVisible(true);
        paneRegister.setManaged(true);
        paneLogin.setVisible(false);
        paneLogin.setManaged(false);
    }

    // endregion

    // region Actions connexion (stubs)

    @FXML
    private void onLoginSubmitClicked() {
        String email = safe(loginEmailField.getText());
        String password = loginPasswordField.getText();
        if (email.isEmpty() || password == null || password.isEmpty()) {
            showMessageLogin("Saisissez l’email et le mot de passe.", false);
            return;
        }
        // Stub : brancher vers API Symfony / service plus tard
        showMessageLogin("Connexion (démo UI) — email : " + email, true);
    }

    @FXML
    private void onForgotPasswordClicked() {
        showMessageLogin("Mot de passe oublié : ouvrir le flux web /reset-password (à intégrer).", false);
    }

    @FXML
    private void onSocialGoogleClicked() {
        showMessageLogin("Connexion sociale Google (à intégrer).", false);
    }

    @FXML
    private void onSocialFacebookClicked() {
        showMessageLogin("Connexion sociale Facebook (à intégrer).", false);
    }

    // endregion

    // region Actions inscription (stubs)

    @FXML
    private void onRegisterSubmitClicked() {
        String name = safe(registerNameField.getText());
        String email = safe(registerEmailField.getText());
        String p1 = registerPasswordField.getText();
        String p2 = registerPasswordConfirmField.getText();

        if (name.isEmpty()) {
            showMessageRegister("Le nom est obligatoire.", false);
            return;
        }
        if (email.isEmpty()) {
            showMessageRegister("L’email est obligatoire.", false);
            return;
        }
        if (p1 == null || p1.length() < 8) {
            showMessageRegister("Le mot de passe doit contenir au moins 8 caractères.", false);
            return;
        }
        if (p2 == null || !p1.equals(p2)) {
            showMessageRegister("Les mots de passe ne correspondent pas.", false);
            return;
        }

        showMessageRegister("Inscription (démo UI) — compte créé pour " + email + ". Passez à la connexion.", true);
    }

    // endregion

    private static String safe(String s) {
        return s == null ? "" : s.trim();
    }

    private void showMessageLogin(String text, boolean success) {
        applyBanner(messageBannerLogin, messageLabelLogin, text, success);
    }

    private void showMessageRegister(String text, boolean success) {
        applyBanner(messageBannerRegister, messageLabelRegister, text, success);
    }

    private void hideMessageLogin() {
        hideBanner(messageBannerLogin, messageLabelLogin);
    }

    private void hideMessageRegister() {
        hideBanner(messageBannerRegister, messageLabelRegister);
    }

    private static void applyBanner(HBox banner, Label label, String text, boolean success) {
        label.setText(text);
        banner.getStyleClass().removeAll("success");
        if (success) {
            banner.getStyleClass().add("success");
        }
        banner.setManaged(true);
        banner.setVisible(true);
    }

    private static void hideBanner(HBox banner, Label label) {
        label.setText("");
        banner.setManaged(false);
        banner.setVisible(false);
        banner.getStyleClass().removeAll("success");
    }
}
