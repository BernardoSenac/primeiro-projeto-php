<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<link rel="stylesheet" href="loginStyle.css">
<style>
  css-doodle {
    --color: @p(#51eaea, #fffde1, #ff9d76, #FB3569);
    --rule: (
      :doodle {
        @grid: 30x1 / 18vmin;
        --deg: @p(-180deg, 180deg);
      }
      :container {
        perspective: 30vmin;
      }
      :after, :before {
        content: '';
        background: var(--color); 
        @place-cell: @r(100%) @r(100%);
        @size: @r(6px);
        @shape: heart;
      }
    
      @place-cell: center;
      @size: 100%;
    
      box-shadow: @m2(0 0 50px var(--color));
      background: @m100(
        radial-gradient(var(--color) 50%, transparent 0) 
        @r(-20%, 120%) @r(-20%, 100%) / 1px 1px
        no-repeat
      );
    
      will-change: transform, opacity;
      animation: scale-up 12s linear infinite;
      animation-delay: calc(-12s / @I * @i);

      @keyframes scale-up {
        0%, 95.01%, 100% {
          transform: translateZ(0) rotate(0);
          opacity: 0;
        }
        10% { 
          opacity: 1; 
        }
        95% {
          transform: 
            translateZ(35vmin) rotateZ(@var(--deg));
        }
      }
    )
  }
</style>
<css-doodle use="var(--rule)"></css-doodle>
    <h1>Login</h1>
    <form action="controller.php" method="post">
        <label for="usuario">Usuário:</label>
        <br>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="senha">Senha:</label>
        <br>
        <input type="password" name="senha" id="senha" required>
        <br>
        <input type="hidden" name="acao" id="acao" value="entrar">
        <input type="submit" value="Entrar">
        <br>
    </form>
</body>
</html>

