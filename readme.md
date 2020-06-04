## Projeto que mostra o relacionamento "Um p/ Muitos" no Laravel

Observar o arquivo de rotas "web".

Nele foram codificas 2 formas de 'associar' ou 'relacionar' uma
instância de Produtos em Categoria e vice-versa.

1ª FORMA = Usando o método 'ASSOCIATE' 

2ª FORMA = Usando o método 'SAVE'

### Rodar as migrations com seeds

    cmd: php artisan migrate:refresh --seed

    ou

    cmd: php artisan migrate:fresh --seed

    Obs.: Os comandos acima recriam todo o banco, apagando os 
          dados pré-existentes e populando com os dados das seeds;

### Obs.: Diferença 'fresh' e 'refresh'

#### Fresh => 
    O comando 'migrate:fresh' apagará todas as tabelas do banco, inclusive as 
    que não foram geradas por migração. 
    
    Logo em seguida, recriará somente as tabelas definidas por migração. 

#### Refresh =>

    O comando 'refresh' apagará e recriará somente as tabelas definidas por 
    migração, mantendo as tabelas que não foram criadas por migração.