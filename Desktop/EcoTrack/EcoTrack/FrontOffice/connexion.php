<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - User</title>
</head>
<body>

<div class="login-container">
    <div class="login-card">

    <div class="logo">
        <a href="#">
            <img src="images/EcoTrack.png" alt="EcoTrack Logo">
        </a>
    </div>

    <h2>Se connecter</h2>
    <p class="subtitle">Connectez-vous avec votre adresse email</p>

    <form action="login_traitement.php" method="POST">
        <input type="email" name="email" placeholder="Adresse email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>

        <a href="#" class="forgot">Mot de passe oublié ?</a>

        <button type="submit">Se connecter</button>
    </form>

</div>

</div>

</body>
</html>
<style>
    .logo {
    text-align: center;
    margin-bottom: 20px;
}

.logo img {
    height: 120px;
    width: auto;
}
.logo img {
    animation: fadeInDown 1s ease;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    height: 100vh;
    background: url("images/frame.jpg") no-repeat center center/cover;
}

/* Overlay optionnel pour lisibilité */
.login-container {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.25);
}

.login-card {
    background: #ffffff;
    width: 380px;
    padding: 35px;
    border-radius: 10px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
    text-align: center;
}

.login-card h2 {
    margin-bottom: 10px;
    color: #2c3e50;
}

.subtitle {
    font-size: 14px;
    color: #7f8c8d;
    margin-bottom: 25px;
}

.login-card input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

.login-card input:focus {
    border-color: #2e86de;
    outline: none;
}

.forgot {
    display: block;
    text-align: left;
    font-size: 13px;
    color: #2e86de;
    margin-bottom: 20px;
    text-decoration: none;
}

.forgot:hover {
    text-decoration: underline;
}

.login-card button {
    width: 100%;
    padding: 12px;
    background: #2e86de;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.3s;
}

.login-card button:hover {
    background: #1e6bb8;
}

</style>