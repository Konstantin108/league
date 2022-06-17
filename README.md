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
API

FormRequest для валидации входных данных name и phone_number
поле id автоинкрементное, поле avatar_path может оставаться пустым,
если аватар не загружен. В файле UserRequest настроены правила, поля не 
должны оставаться пустыми, поле phone_number должно содержать только цифры

Файл InDataBaseUserRepository отвечает за обращение к БД, реализует интерфейс UserRepositoryInterface

php artisan migrate - для создание таблицы
php artisan db:seed --class=UserSeeder - создает трех пользователей



