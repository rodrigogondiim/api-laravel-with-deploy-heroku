Começo
---

Para da o inicio do projeto,execute a base de dados<br>
1 - Crie o banco de dados gestao
2 - Exucute a criaçao tabelas(estados,cidades,pessoas,logs)
3 - Execute os inserts Estados
4 - Execute os inserts Cidades

---
### SCHEMA SQL: 
execute o comando no repositório: 
```bash
php artisan migrate
```
 
<h3>OU se preferir</h3>

 https://github.com/rodrigogondiim/Teste-Backend-InCicle/blob/master/database/schema.sql
;
#Armazenado no caminho <b>Database/Schema.SQL</b>

Onde executa e cria todas as tabelas automaticamente.

<b>OBS</b>: Não esqueça de alterar o nome no banco de dados no laravel

<h4>Tudo inserido?</h4>

as rotas utilizadas foram:
```
GET  api/cidades       
GET  api/cidades/id    
POST api/cidades
POST api/pessoas
PUT  api/cidades/id    
```

![image](https://user-images.githubusercontent.com/99778340/155343894-8f06e55c-ee07-4d27-b947-cc7e14cb2672.png)

## Testes unitários
Mediante a essas rotas e seus respectivos retornos
foram realizado os teste com o PHP UNIT

![image](https://user-images.githubusercontent.com/99778340/155345511-49bf106d-bc7e-4840-9446-c7a2574a2a5e.png)


---
<h3>Agora é hora de inserir na tabela pessoas</h3>

Só basta fazer a requisiçao para a rota api/cidades **com o verbo POST**

![image](https://user-images.githubusercontent.com/99778340/155353472-bfb9eedb-74ba-4865-96da-d979e3876dc8.png)


<h4>TAREFA 4 - WEB SOCKET NAO CONSEGUI CONCLUIR POR CAUSA DO TEMPO,NUNCA TINHA UTILIZADO ANTES ENTÃO VI QUE ERA ALGO PARA SER FEITO DO JEITO CERTO!!!</h4>
