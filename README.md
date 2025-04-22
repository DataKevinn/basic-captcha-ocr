
# Gerador de CAPTCHA em PHP

Este projeto implementa um gerador de CAPTCHA simples em PHP. O objetivo é gerar uma imagem com um código aleatório e distorcido, usado como uma medida de segurança para garantir que o usuário é uma pessoa e não um bot.

## Funcionalidades

- Geração de código aleatório de 6 caracteres (letras e números).
- Exibição de um CAPTCHA em formato de imagem PNG.
- Distúrbios na imagem com linhas e ruído para dificultar a leitura automática.
- Distorção no texto gerado para aumentar a segurança.
- Borrão leve na imagem para adicionar uma camada extra de complexidade.

## Como usar

1. Faça o download ou clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/captcha-php.git
   ```

2. Coloque o arquivo PHP em seu servidor local ou servidor de produção com suporte a PHP.

3. Verifique se o caminho para a fonte (`arial.ttf`) está correto no script:
   ```php
   $font = DIR . '/fonts/arial.ttf';
   ```

4. Acesse o arquivo PHP no seu navegador para gerar o CAPTCHA.

## Detalhes Técnicos

- O código PHP gera um CAPTCHA com 6 caracteres aleatórios.
- A imagem gerada é de 180x60 pixels.
- O texto é distorcido com um ângulo aleatório e posição de cada caractere.
- Há ruído (pontos aleatórios) e linhas curvas para tornar a leitura mais difícil para bots.
- A imagem é suavizada com um filtro de desfoque para aumentar a complexidade.
  
## Dependências

- PHP 7.x ou superior.
- Fonte `arial.ttf` disponível no diretório correto (ajuste o caminho no código).
  
## Contribuições

Sinta-se à vontade para fazer contribuições! Abra um *pull request* ou crie um *issue* para sugestões de melhorias ou novos recursos.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
