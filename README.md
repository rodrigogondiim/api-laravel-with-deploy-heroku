
## Começo

 Para da o inicio do projeto,execute a base de dados<br>

 
 1 - Crie o banco de dados gestao <br>
 2 - Exucute a criaçao tabelas(estados,cidades,pessoas,logs)<br>
 3 - Execute os inserts Estados 4 - Execute os inserts Cidades <br>

#### HOST : [API_HEROKU](https://host-mundao.herokuapp.com/api/cidades)
### SCHEMA SQL: 

execute o comando no repositório: ```bash php artisan migrate ```  

[Inserir registro nas tabelas](https://github.com/rodrigogondiim/Teste-Backend-InCicle/blob/master/database/schema.sql)

### OU se preferir 

[Query sql](https://github.com/rodrigogondiim/Teste-Backend-InCicle/blob/master/database/schema.sql)
 
 Armazenado no caminho Database/Schema.SQL.
 
 Onde executa e cria todas as tabelas automaticamente e possui todas as cidades e estados tudo já pronto para inserção .

**OBS:** Não esqueça de alterar o nome no banco de dados no laravel

**Tudo inserido?**

 Agora é hora de ver essa api show de bola voando as rotas utilizadas foram: ``` GET api/cidades GET api/cidades/id POST api/cidades POST api/pessoas PUT api/cidades/id ```


#### Listando todas as cidades
Atraves da request ``` GET api/cidades```
![image](https://user-images.githubusercontent.com/99778340/155343894-8f06e55c-ee07-4d27-b947-cc7e14cb2672.png) 

#### Listando pelo id 
Atraves da request ``` GET api/cidades/id``` 
Onde retona todas as cidades daquele determinado estado(id).
Para utilizar paginação somente utilizar o 
 ``` GET api/cidades/id?page=1``` 

![image](https://user-images.githubusercontent.com/99778340/155389937-200f050f-d2a8-471b-a5e7-4d2347eefde9.png)
#### Criando Cidade e Estado
Estado é um item unico então não pode ser repetido na tabela;
Só basta fazer a requisiçao para a rota  ``` POST api/pessoas```
Exemplo  de request: 
 ```{ "estado": "Acre", "Cidade","Teste" }```
![image](https://user-images.githubusercontent.com/99778340/155390971-2fe6a849-0be2-4e34-8aa9-7d8fdfd25e31.png)
 

#### Atualizando Cidade
``` PUT api/cidades/id```
Passando o id da cidade,e o campo no json 
 ```{ "Cidade","Teste" }```
 ![image](https://user-images.githubusercontent.com/99778340/155392335-e5c28914-73b6-49f9-a8f8-96eabea5635b.png)

#### Verificando se cidade existe
 
 ``` POST api/cidades/search```
 Exemplo request
 ```{ "nome","Teste" }```
![image](https://user-images.githubusercontent.com/99778340/155399251-73a4b644-cbc8-4253-a43a-b94bf1991b5e.png)
 
 


#### Teste Unitários com PHP Unit
Testes unitários mediante a essas rotas e seus respectivos retornos foram realizado os teste com o PHP UNIT .![image](https://user-images.githubusercontent.com/99778340/155345511-49bf106d-bc7e-4840-9446-c7a2574a2a5e.png)
### Agora é hora de inserir na tabela pessoas 
Só basta fazer a requisiçao para a rota  ``` POST api/pessoas```
![image](https://user-images.githubusercontent.com/99778340/155353472-bfb9eedb-74ba-4865-96da-d979e3876dc8.png)
 
 Onde tambem ocorre a validação para ver se cidade e estado que o usuario esta tentando inserir existe no banco.
 ![image](https://user-images.githubusercontent.com/99778340/155400036-f972e96b-d914-423d-8c26-523bd9ef0dbb.png)



#### TAREFA 4 - WEB SOCKET NAO CONSEGUI CONCLUIR POR CAUSA DO TEMPO DE CONCLUSÃO,NUNCA TINHA UTILIZADO ANTES ENTÃO VI QUE ERA ALGO PARA SER FEITO DO JEITO CERTO!!
