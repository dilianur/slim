<?php

// Подключение автозагрузки через composer
require __DIR__ . '/../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory  as AppFactory;
// use Slim\Factory\AppFactory;

$app = AppFactory::create();
//Добавьте два обработчика:
// $faker = Factory::create();
// $faker->seed(1234);

// $domains = [];
// for ($i = 0; $i < 10; $i++) {
//     $domains[] = $faker->domainName;
// }
// // echo 'fdfgdf';
// $phones = [];
// for ($i = 0; $i < 10; $i++) {
//     $phones[] = $faker->phoneNumber;
// }

// $app = AppFactory::create();
// $app->addErrorMiddleware(true, true, true);

// $app->get('/', function ($request, $response) {
//     return $response->write('go to the /phones or /domains');
// });

///phones - возвращает список телефонов содержащихся в переменной $phones закодированный в json.
///domains - возвращает список доменов содержащихся в переменной $domains закодированный в json.
//Подсказки
//Кодирование в json: json_encode($data)
//Чтобы получить данные внутри обработчиков, воспользуйтесь замыканием (для телефонов: use ($phones)).
// $app->get('/users', function ($request, $response) use ($phones) {

// });
// $errorMiddleware = $app->addErrorMiddleware(true, true, true);

// // Define app routes
// $app->get('/hello/{name}', function (Request $request, Response $response, $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });
//Реализуйте маршрут /companies, по которому отдаётся список компаний 
//в виде json. Компании отдаются не все сразу, а только соответствующие 
//текущей запрошенной странице. По умолчанию выдаётся 5 результатов на запрос.
// $app->get('/companies', function ($request, $response) use ($companies) {
//     $page = $request->getQueryParam('page', 1);
//     $per = $request->getQueryParam('per', 5);
//     $offset = ($page - 1) * $per;
//     $ob = array_slice($companies, $offset, $per);
//     return $response->write(json_encode($ob));
// });
// $companies = App\Generator::generate(100);

// $app = AppFactory::create();
// $app->addErrorMiddleware(true, true, true);

// $app->get('/', function ($request, $response, $args) {
//     return $response->write('open something like (you can change id): /companies/5');
// });
$companies = []
// BEGIN (write your solution here)
//Реализуйте Маршрут /companies/{id}, по которому отдается json представление компании. 
//Компания извлекается из списка $companies. Каждая компания представлена ассоциативным массивом 
//у которого есть текстовый (то есть тип данных - строка) ключ id:
$app->get('/companies/{id:[0-9]+}', function ($request, $response, $args) use ($companies) {
    $id = $args['id'];
    print_r($companies);
    // $offset = id->firstWhere($id);
    if (!$companies) {
        $response2 = $response->withStatus(404);
    }
    return $response2->write(json_encode($offset));
});
// END
$app->run();
// echo json_encode($phones);
// $app->run();
//Реализуйте Маршрут /companies/{id}, по которому отдается json представление компании. 
//Компания извлекается из списка $companies. Каждая компания представлена ассоциативным массивом 
//у которого есть текстовый (то есть тип данных - строка) ключ id:
$app->get('/companies/{id:[0-9]+}', function($request, $response, $args) use ($companies) {
    //извлекли плейсхолдер по id
    $arg = $args['id'];
    // при помощи коллект библиотеки, извлекли определенную компанию по id плейсчолдер
    $collec = collect($companies)->firstWhere('id', $arg);
    // условие создали, если нет такойкомпания с определенным плейсхолдерем id, выдаем ошибку 404
    if (!$collec) {
        return $response->withStatus(404)->write('Page not found');
    }
    // если есть, то выводим компанию определенную по плейсхолдер
    return $response->write(json_encode($collec));
});

echo <a href="<?= $co['firstName']?>"></a>