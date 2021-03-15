## Laravel 8 

Laravel em versões anteriores do Laravel, o RouteServiceProvider continha uma propriedade $namespace. O valor desta propriedade seria automaticamente prefixado nas definições de rota do controlador e chamadas para o action helper / URL :: action method.

## E se eu quiser seguir o antigo caminho de roteamento
1. Primeiro, vá para o app/providers/RouteServiceProvider.php .
2. Nesse arquivo, descomente a linha protected $namespace = 'App\Http\Controllers';

