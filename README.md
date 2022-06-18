Лига Цифровой Экономики
Тестовое задание

Текст задания:
Реализовать API на Laravel для CRUD-операций над пользователями с использованием:
* FormRequest для валидации входных данных
* Паттерн "Репозиторий" для работы с моделью User на уровне БД.
* Репозиторий НЕ возвращает Builder. Почитать здесь https://habr.com/ru/post/248505/

Таблица users:
* id
* name
* avatar_path
* phone_number

Задание выполнил:
API реализовал, проверить его работу можно через Postman
адрес: http://league.local/api/

* получить все записи: http://league.local/api/users/
* получить одну запись: http://league.local/api/users/{номер id}
* удалить запись: http://league.local/api/users/{номер id}  <- метод DELETE
* добавить запись: http://league.local/api/users/  <- метод POST
* обновить запись: http://league.local/api/users/{номер id}  <- метод PUT

API возвращает объекты в формате JSON, если валидация не пройдена так же возвращается
JSON с сообщениями об ошибках(необходимо в хедере передавать accept application/json)

FormRequest для валидации входных данных name, phone_number, avatar_path
поле id автоинкрементное. В файле UserRequest настроены правила, поля не 
должны оставаться пустыми, поле phone_number должно содержать только цифры

Файл InDataBaseUserRepository отвечает за обращение к БД, реализует интерфейс UserRepositoryInterface

php artisan migrate - для создание таблицы
php artisan db:seed --class=UserSeeder - создает трех пользователей



