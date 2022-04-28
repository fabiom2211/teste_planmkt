# Laravel REST API

## Iniciando o projeto


Copie e cole o seu *.env.example* renomeando para *.env* e adiciona informações do seu Banco de Dados

For MySQL, add
```
DB_CONNECTION=mysql
DB_HOST=172.18.0.2
DB_PORT=3306
DB_DATABASE=planmkt
DB_USERNAME=root
DB_PASSWORD=xxxx
```

Rode os seguintes comando na raiz do projeto:

```
composer install
php artisan migrate
php artisan serve
```

## Rotas
Route::get('/', [MarcaController::class, 'index']);
Route::post('/', [MarcaController::class, 'store']);
Route::post('/show', [MarcaController::class, 'show']);
Route::post('/update', [MarcaController::class, 'update']);
Route::post('/delete', [MarcaController::class, 'destroy']);
Route::post('/restore', [MarcaController::class, 'restore']);
```
# Public

GET    /api/produto   (Listas todas as produtos)
POST   /api/produto   (Cria uma produto)
POST   /api/produto/show  (Mostra uma produto)
POST   /api/produto/update    (Atualiza dados da produto)
POST   /api/produto/delete    (Deleta uma produto)


GET    /api/marca   (Listas todas as marcas)
POST   /api/marca   (Cria uma marca)
POST   /api/marca/show  (Mostra uma marca)
POST   /api/marca/update    (Atualiza dados da marca)
POST   /api/marca/delete    (Deleta uma marca)


```
