<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QueryX - Login (Dummy)</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: -apple-system, BlinkMacSystemFont, "San Francisco", "Helvetica Neue", Arial, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #1c1c1e;
      color: #fff;
      overflow: hidden;
      font-size: 16px;
    }

    .login-container {
      background: rgba(28, 28, 30, 0.85);
      padding: 40px;
      border-radius: 16px;
      text-align: center;
      backdrop-filter: blur(20px);
      max-width: 400px;
      width: 100%;
      border: 1px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.6);
    }

    .logo {
      width: 120px;
      margin-bottom: 20px;
    }

    h2 {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    input, button {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      border-radius: 10px;
      font-size: 16px;
      transition: all 0.3s ease-in-out;
      text-align: center;
    }

    input {
      border: none;
      background: #333;
      color: #fff;
    }

    button {
      cursor: pointer;
      font-weight: bold;
      border: none;
      background: linear-gradient(135deg, #007aff, #1d72b8);
      color: #fff;
    }

    button:hover {
      background: linear-gradient(135deg, #1d72b8, #007aff);
    }

    .message {
      margin-top: 15px;
      font-size: 14px;
      color: #aaa;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="img/logo.png" alt="QueryX Logo" class="logo">
    <h2>QueryX - Acesso Restrito</h2>

    <form id="dummyForm">
      <input type="text" name="username" placeholder="Usuário" required>
      <input type="password" name="password" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>

    <div class="message">🔒 Esta é uma versão dummy do site, sem funcionalidades reais.</div>
  </div>
</body>
</html>
