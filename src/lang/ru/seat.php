<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015, 2016, 2017, 2018, 2019  Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

return [

    // General
    'home'                  => 'Главная',
    'character'             => 'Персонаж|Персонажи',
    'corporation'           => 'Корпорация|Корпорации',
    'user'                  => 'Пользователь|Пользователи',
    'last_update'           => 'Последнее обновление',
    'unknown'               => 'Неизвестно',
    'note'                  => 'Заметка',
    'name'                  => 'Имя|Название',
    'granted'               => 'Разрешено',
    'denied'                => 'Отказано',
    'enabled'               => 'Активировано',
    'disabled'              => 'Деактивировано',
    'username'              => 'Имя пользователя',
    'email'                 => 'Email',
    'close'                 => 'Закрыть',
    'date'                  => 'Дата',
    'status'                => 'Статус',
    'id'                    => 'ID|IDs',
    'type'                  => 'Тип|Типы',
    'expiry'                => 'Дата окончания',
    'never'                 => 'Никогда',
    'detail'                => 'Детали|Детали',
    'delete'                => 'Удалить',
    'kill'                  => 'Уничтожить',
    'verify'                => 'Проверить',
    'reset'                 => 'Перезагрузить',
    'back'                  => 'Назад',
    'summary'               => 'Итог',
    'quantity'              => 'Количество',
    'volume'                => 'Объем',
    'group'                 => 'Группа|Группы',
    'owner'                 => 'Владелец',
    'description'           => 'Описание',
    'labels'                => 'Закладки',
    'created'               => 'Создано',
    'issuer'                => 'Создатель',
    'title'                 => 'Титул|Титулы',
    'price'                 => 'Цена',
    'reward'                => 'Цена',
    'collateral'            => 'Гарантийный взнос',
    'location'              => 'Место',
    'filter'                => 'Фильтр|Фильтры',
    'clear'                 => 'Очистить',
    'none'                  => 'Ничего',
    'permission'            => 'Итого разрешений|Разрешения',
    'affiliation'           => 'Итого субъектов|Субъект',
    'role'                  => 'Роль|Роли',
    'edit'                  => 'Редактировать',
    'remove'                => 'Удалить',
    'yes'                   => 'Да',
    'no'                    => 'Нет',
    'update'                => 'Обновить',
    'action'                => 'Действие',
    'key'                   => 'Ключ',
    'log'                   => 'Лог|Логи',
    'view'                  => 'Просмотр',
    'item'                  => 'Предмет|Предметы',
    'usage'                 => 'Использование',
    'unit'                  => 'Единица|Единицы',
    'add'                   => 'Добавить',
    'all'                   => 'Все',
    'inverse'               => 'Инвертировать',
    'read'                  => 'Прочитать',
    'level'                 => 'Уровень',
    'token'                 => 'Токен',

    // Requirements
    'requirements'          => 'Требования',
    'requirements_message'  => ' Данный перечень отображает перечень недостающих модулей PHP. Пожалуйста, установите их' .
        ' прежде чем продолжить ',
    'php_version'           => 'Версия PHP',
    'php_version_message'   => 'Установленная версия PHP не соответствует минимально требуемой версии для работы с' .
        ' SeAT. Пожалуйста сделайте апгрейд PHP.',
    'installed_version'     => 'Установленная версия.',
    'min_version'           => 'Минимально требуемая версия.',
    'admin_contact_warning' => ' Контакты администратор для инсталляции не указаны.' .
        ' Задачи не будут ставить в очередь. Настройте их в настройках SEAT. ',
    'refresh_token_warning' => 'Ваш аккаунт не содержит новый токен обновления.. ' .
        'Пожалуйста выйдите из учетной записи, войдите и скорректируйте, как можно скорее.',
    'sso_config_warning'    => 'SSO еще не настроены. Только административные ' .
        'аккаунты возможны.',
    'sso_activation'        => 'Активация SSO',
    'sso_confirmation'      => 'Видимо у вас уже есть учетная запись. Пожалуйста введите ваши параметры учетной записи для активации SSO.',

    // Auth
    'failed'                => 'Данные, которые вы ввели не соответствуют записи в базе данных.',
    'throttle'              => 'Слишком много попыток входа. Попробуйте чуть позже снова.',
    'login_welcome'         => 'Добро пожаловать,пожалуйста войдите, используя данные учетной записи EVE Online SSO.',
    'remember_me'           => 'Запомнить меня.',
    'password'              => 'Пароль',
    'password_again'        => 'Повторите пароль',
    'forgot'                => 'Я забыл свой пароль',
    'register'              => 'Регистрация новой учетной записи',
    'sign_in'               => 'Войти',
    'email_verify'          => 'Проверка Email',
    'email_verify_welcome'  => 'Пожалуйста, введите рабочий email для вашей учетной записи',

    // Registration
    'new_account'           => 'Новая учетная запись.',
    'register_welcome'      => 'Выберите название пользователя и безопасный пароль.',
    'register_eve_warn'     => 'Не используйте тот пароль, который используете для входа в EVE',
    'existing_account'      => 'У меня уже есть учетная запись',
    'register_account'      => 'Зарегистрировать учетную запись',

    // Passwords
    'password_reset'        => 'Сбросить пароль',
    'reset_welcome'         => 'Введите email учетной записи, для которой вы хотите сбросить пароль.',
    'remember'              => 'Я помню данные своей учетной записи',
    'reset_topic'           => 'Сбросить пароль',
    'reset_token_welcome'   => 'Введите email и новый пароль.',

    // Header
    'toggle_navigation'     => 'Включить навигацию',
    'queued'                => 'В очереди',
    'working'               => 'Работает',
    'joined'                => 'Соединен',
    'profile'               => 'Профиль',
    'sign_out'              => 'Выйти',
    'stop_impersonation'    => 'Остановить персонализацию',
    'switch_character'      => 'Переключить персонажа',
    'link_character'        => '+',
    'characters_in_group'   => 'Персонаж в группе|Персонажи в группе',

    // Notifications
    'error'                 => 'Ошибка',
    'success'               => 'Готово',
    'warning'               => 'Предупреждение',
    'notice'                => 'Заметка',
    'info'                  => 'Информация',

    // Menu
    'api_key_management'    => 'Управление API',
    'add_api_key'           => 'Добавить  EVE API ключ',
    'list_keys'             => 'Показать перечень EVE API ключей',
    'all_char'              => 'Все персонажи',
    'mail_timeline'         => 'Архив почты',
    'all_corp'              => 'Все корпорации',
    'configuration'         => 'Настройки',
    'access'                => 'Управление доступом',
    'other'                 => 'Иное',
    'tools'                 => 'Инструменты',
    'security_logs'         => 'Логи безопасности',
    'import'                => 'Импорт API ключей',
    'settings'              => 'Настройки SeAT',
    'schedule'              => 'Расписание',
    'no_main_char'          => 'Нет основного персонажа',
    'hello'                 => 'Привет',
    'online'                => 'Онлайн',
    'search'                => 'Поиск',
    'main_menu'             => 'Основное меню',
    'security'              => 'Безопасность',
    'sso'                   => 'Настройки SSO',
    'tracking'              => 'Отслеживание',
    'assets'                      => 'Активы',
    'location_flag'               => 'Местонахождение',
    'calendar'                    => 'Календарь',
    'channels'                    => 'Каналы',
    'contacts'                    => 'Контакты',
    'contracts'                   => 'Контракты',
    'fittings'                    => 'Фитинг',
    'fitting_items'               => 'Предметы комплектации',
    'industry'                    => 'Индустрия',
    'intel'                       => 'Данные разведки',
    'killmails'                   => 'Сообщения об уничтоженных кораблях',
    'mail'                        => 'Почта',
    'market'                      => 'Рынок',
    'notifications'               => 'Уведомления',
    'pi'                          => 'Планетарное взаимодействие',
    'research'                    => 'Исследования',
    'sheet'                       => 'Лист',
    'skills'                      => 'Навыки',
    'standings'                   => 'Репутация',
    'wallet'                      => 'Кошелек',
    'wallet_journal'              => 'Журнал движений в кошельке',
    'wallet_transactions'         => 'Движения средств в кошельке',
    // Dashboard
    'home_page'                   => 'Стартовая страница',
    'dashboard'                   => 'Аналитика',
    'online_layers'               => 'Игроки онлайн',
    'owned_api_keys'              => 'Введеные API ключи',
    'total_character_isk'         => 'Итого (ISK)',
    'total_character_skillpoints' => 'Итого очков умения (SP)',
    'total_character_mined_isk'   => 'Добыто (ISK)',
    'total_killmails'             => 'Итого писем об уничтоженных кораблях',
    'main_char_skills'            => ':character_name / умения',
    'main_char_skills_per_level'  => 'Умения по уровням',
    'main_char_skills_coverage'   => 'Умения в процентах',
    'concurrent_player_count'     => 'Количество одновременных игроков',
    'esi_response_time'           => 'Время отклика ESI',

    // Api Keys
    'api_key_add'                 => 'Добавить новый API ключ',
    'key_id'                      => 'Key ID',
    'v_code'                      => 'Verification Code',
    'check_key'                   => 'Check Key',
    'api_new_key'                 => 'Создать новый API ключ',
    'api_use_link'                => 'Используйте ссылку чтобы создать API ключ',
    'api_full_link'               => 'Полный API ключ для всех персонажей',
    'api_full_min_mask'           => 'Необходимый API ключ с минимальной маской',
    'insufficient_access_mask'    => 'Этот API ключе не содержит минимально требуемых параметров',
    'api_key_info'                => 'API ключ информация',
    'api_key_type'                => 'API ключ типа',
    'api_access_mask'             => 'API ключ параметры',
    'api_add_type_key'            => 'Добавить :тип API ключа',
    'api_add_job'                 => 'Добавление API ключа автоматически поставит в очередь необходимые процессы',
    'api_min_mask'                => 'Минимальные параметры ключа',
    'api_access'                  => 'Доступ',
    'api_detail'                  => 'Детали API ключа',
    'api_key_status'              => 'Статус API ключа',
    'api_job_update'              => 'Поставить в очередь процессы',
    'owner_info'                  => 'Информация о владельце',
    'no_owner'                    => 'У API ключа нет владельца',
    'last_login'                  => 'Последний вход',
    'account_status'              => 'Статус аккаунта',
    'transfer_ownership'          => 'Передать права управления',
    'seat_user'                   => 'Пользователь SeAT',
    'transfer'                    => 'Передать',
    'mask_map_fail'               => 'Невозможно загрузить маску доступа',
    'recent_jobs'                 => 'Последние процессы',
    'scope'                       => 'Возможность|Возможности',
    'api_all'                     => 'Все API ключи',
    'reveal'                      => 'Показать',
    'add_success'                 => 'API ключе успешно создан. Update Job :jobid Dispatched',
    're_enable'                   => 'Реактивировать ключ',
    'disable'                     => 'Деактивировать ключ',
    'reenable_all_disabled'       => 'Реактивировать все деактивированные ключи',
    'disable_all_enabled'         => 'Деактивировать все активированные ключи',
    'joblog'                      => 'Перечень процессов',
    'job_log_config'              => 'Job logging will only occur if it is enabled. Currently ' .
        'it is: :status',

    // People
    'people_groups'               => 'Группы людей',
    'unaffiliated_keys'           => 'Непривязанные ключи',
    'add_to_existing'             => 'Добавить к существующим',
    'add_to_existing_group'       => 'Добавить в существующую группу',
    'group_main'                  => 'Основная группа',
    'new_group_with_main'         => 'Новая группа с :name as Main',

    // Access
    'access_mangement'            => 'Управление доступом',
    'quick_add_role'              => 'Добавление роли',
    'role_name'                   => 'Название роли',
    'add_new_role'                => 'Добавить новую роль',
    'available_roles'             => 'Доступные роли',
    'quick_add_user'              => 'Быстро добавить пользователя',
    'add_new_user'                => 'Добавить нового пользователя',
    'edit_role'                   => 'Редактировать роль',
    'available_permissions'       => 'Доступные разрешения',
    'grant_permissions'           => 'Предоставить разрешения',
    'inverse_permission'          => 'Инвертировать выбранные разрешения',
    'inverse_affiliation'         => 'Инвертировать выбранные субъекты',
    'current_permissions'         => 'Текущие разрешения',
    'has_superuser'               => 'Имеет статус Суперюзера',
    'permission_inherit'          => 'Унаследовать все разрешения',
    'available_corporations'      => 'Доступные корпорации',
    'available_characters'        => 'Доступные персонажи',
    'add_affiliations'            => 'Добавить выбранные субъекты',
    'current_affiliations'        => 'Текущие субъекты',
    'available_users'             => 'Доступные пользователи',
    'available_groups'            => 'Доступная группа|Доступные группы',
    'add_user'                    => 'Добавить пользователя|Добавить пользователей',
    'add_group'                   => 'Добавить группу|Добавить группы',
    'current_users'               => 'Текущие пользователи',
    'current_groups'              => 'Текущая группа|Текущие группы',
    'select_item_add'             => 'Выбрать предмет для добавления',
    'impersonate'                 => 'Исполнять роль',
    'edit_user'                   => 'Редактировать пользователя',
    'activate_user'               => 'Активировать пользователя',
    'reassign_user'               => 'Переназначить пользователя',
    'reassign'                    => 'Переназначить',
    'deactivate_user'             => 'Отключить пользователя',
    'account_status_change'       => 'Статус аккаунта изменен',
    'user_agent'                  => 'Строка пользователя',
    'login_history'               => 'История входа',
    'role_summary'                => 'Итоги роли',
    'user_updated'                => 'Информация пользователя обновлена',
    'user_deleted'                => 'Пользователь удален',
    'self_delete_warning'         => 'Вы не можете удалить себя!',
    'impersonating'               => 'Исполнять роль :user',
    'revert_impersonation'        => 'Исполнение роли приостановлено',
    'user_created'                => 'Пользователь создан',
    'unauthorized_request'        => 'Неавторизованный запрос',
    'unauthorized_request_logged' => 'Данная попытка была сохранена в логе.',
    'role_added'                   => 'Роль была добавлена',
    'role_removed'                 => 'Роль была удалена',
    'permissions_granted'          => 'Разрешения предоставлены',
    'permission_revoked'           => 'Разрешения отозваны',
    'user_added'                   => 'Пользователю добавлена роль',
    'user_removed'                 => 'У пользователя удалена роль',
    'affiliations_added'           => 'Связи были добавлены на эту роль',
    'affiliation_removed'          => ' Связи были удалены у этой роли',

    // Tokens
    'valid_token'                  => 'Действующие токен',
    'invalid_token'                => 'Недействующий токен',

    // Import
    'api_import_title'             => 'Импортировать API ключи EVE',
    'csv_data_source'              => 'Файл источник CSV',
    'help'                         => 'Помощь',
    'importing_csv_data'           => 'Импортировать CSV',
    'csv_format_explained'         => 'Формат файла для CSV - keyID,vCode и приведен ниже',
    'important_notes'              => 'Важные заметки',
    'curr_user_becomes_owner'      => 'Текущий пользователь (:user) станет владельцем API ключей.',
    'only_format_is_checked'       => 'Здесь надо отметить только ключи API. Нет никаких отметок ' .
        'что минимальные API маски присутствуют.',
    'update_with_next_job'         => 'Ключевая информаця будет обновлены после следующего обновления или после ручного перезапуска.',

    // Schedule
    'new_schedule'                 => 'Новый график',
    'available_commands'           => 'Доступные команды',
    'cron_expression'              => 'Cron выражение',
    'current_schedule'             => 'Текущий график',
    'command'                      => 'Команда',
    'cron'                         => 'Cron',
    'allow_overlap'                => 'Добавить совпадение',
    'allow_maintenance'            => 'Позволить в режиме отладки',
    'scheduled_commands'           => 'Запланированные команды',
    'choose_prepop'                => 'Choose a pre-populated cron expression, or write your own.',
    'add_scheduled'                => 'Добавить запланированную команду',

    // Security
    'category'                     => 'Категория',
    'message'                      => 'Сообщение',
    'source'                       => 'Источник',

    // Ledger
    'ledger'                       => 'Движения средств в кошельке',
    'bountyprizesbymonth'          => 'Награды по месяцам',
    'bountyprizetotal'             => 'Итого наград',
    'pitotals'                     => 'PI сумма налогов',
    'wallet_division_name'         => 'Название кошелька',
    'wallet_summary'               => 'Итого кошелька|Итого кошельков',

    // Users
    'user_management'              => 'Редактирование пользователей',

    // Settings
    'admin_email'                  => 'Email администратора',
    'admin_email_help'             => 'Пожалуйста введите email администратора для установки SEAT.',
    'min_access_mask'              => 'Минимально требуемая маска доступа',
    'min_character_access_mask'    => 'Минимально требуемая маска доступа персонажа',
    'min_corporation_access_mask'  => 'Минимально требуемая маска доступа корпорации',
    'force_min_mask'               => 'Применить минимально требуемую маску доступа',
    'registration'                 => 'Регистрация',
    'maintenance'                  => 'Отладка',
    'cleanup_data'                 => 'Очистить данные',
    'cleanup_data_help'            => 'Когда отлажен для удаления данных, процесс отладки SEAT ' .
        'удалить все данные, такие как пользователи и корпорации, без активированных пользователей для данного' .
        'процесса.',
    'single_signon'                => 'Eve Online одноразовый вход',
    'admin_warn_sso'               => 'Перепроверьте EVE_CLIENT_ID, EVE_CLIENT_SECRET и EVE_CALLBACK_URL' .
        ' значения в .env файле так он может быть пустой или с ошибками. Проблема со входом может быть связана с этим!',
    'allow_sso'                    => 'Разрешить одноразовый вход',
    'allow_registration'           => 'Разрешить регистрацию',
    'email_activation'             => 'Активация Email',
    'require_activation'           => 'Требуется активация Email',
    'module_versions'              => 'SeAT версии модулей',
    'tp_versions'                  => 'Версии сторонних разработчиков',
    'installed'                    => 'Установлено',
    'current'                      => 'Текущее',
    'url'                          => 'Url',
    'google_analytics'             => 'Google аналатика',
    'allow_tracking'               => 'Позволить отслеживать',
    'tracking_id'                  => 'Уникальные ID отслеживания',
    'tracking_help'                => 'Прежде чем отключить отслеживание пользователя, пожалуй посмотрите' .
        ' документ ниже.',

    // SSO Settings
    'sso_scopes'                   => 'SSO возможности',
    'available_scopes'             => 'Все возможности SSO',
    'enable_all'                   => 'Включить все',
    'remove_all'                   => 'Отключить все',
    'update_sso_scopes'            => 'Обновить возможности SSO',
    'current_configuration_status' => 'Текущая конфигурация SSO',
    'client_id_status'             => 'Статус ID клиента:',
    'client_id_ok'                 => 'ID клиента корректный',
    'client_id_not_ok'             => 'ID клиента не корректный. Проверьте .env файл',
    'client_secret_status'         => 'Статус ключа безопастности:',
    'client_secret_ok'             => 'Ключ безопастности корректный',
    'client_secret_not_ok'         => 'Ключ безопастности не корректный. Проверьте .env файл',
    'callback_url_status'          => 'Статус обратной ссылки:',
    'callback_url_ok'              => 'Ссылка корректна :url',
    'callback_maybe_wrong'         => 'Обратная ссылка не корректна. Статус :current ' .
        'возможно должен быть :suggested',
    'client_callback_not_ok'       => 'Проверьте файл .env и установите обратную ссылку :url',

    // Updaters
    'update_dispatched'            => 'Обновление успешно запущено. Проверьте статус' .
        'немного позднее.',
    'update_failed'                => 'Обновление прошло неудачно. Пожалуйста свяжитесь с администратором SeAT.',
    'update_skill_queue'           => 'Обновить перечень умений в обучении',
    'update_assets'                => 'Обновить перечень ваших активов',
    'update_corp_history'          => 'Обновить историю членства в корпорациях',

    // Character
    'joined_curr_corp'             => 'Стаж в корпорации',
    'skillpoint'                   => 'Очка навыков|Очки навыков',
    'account_balance'              => 'Баланс аккаунта (ISK)',
    'current_ship'                 => 'Текущий корабль',
    'last_location'                => 'Последнее местонахождение',
    'security_status'              => 'Статус безопасности',
    'items_taking'                 => 'Взял предметы',
    'calendar_events'              => 'Календарь событий',
    'positive_standings'           => 'Положительная репутация',
    'neutral_standings'            => 'Нейтральная репутация',
    'negative_standings'           => 'Отрицательная репутация',
    'start'                        => 'Начать',
    'installer'                    => 'Установщик',
    'system'                       => 'Система',
    'activity'                     => 'Активность',
    'run'                          => 'Цикл|Циклы',
    'blueprint'                    => 'Чертеж',
    'product'                      => 'Продукт',
    'victim'                       => 'Жертва',
    'ship_type'                    => 'Тип корабля',
    'transaction_type'             => 'Тип перевода',
    'owner_1'                      => 'От',
    'owner_2'                      => 'Кому',
    'amount'                       => 'Количество',
    'balance'                      => 'Баланс',
    'corporation_name'             => 'Название корпорации',
    'character_name'               => 'Имя персонажа',
    'from'                         => 'От',
    'subject'                      => 'Тема',
    'to'                           => 'Кому',
    'to_corp'                      => 'В корпорацию',
    'missing_body'                 => 'Текст письма еще не загружен',
    'to_alliance'                  => 'В альянс',
    'to_char'                      => 'Персонажам',
    'total'                        => 'Итого',
    'updated'                      => 'Обновлено',
    'planet'                       => 'Планета',
    'upgrade_level'                => 'Увеличить уровень',
    'no_pins'                      => '# Pins',
    'agent'                        => 'Агент',
    'skill'                        => 'Навык|Навыки',
    'points_p_day'                 => 'Количество очков в день',
    'remainder'                    => 'Напоминание',
    'skills_summary'               => 'Обзор навыков',
    'curr_training'                => 'Сейчас изучается',
    'skill_training_end'           => 'Окончание обучения',
    'skill_queue'                  => 'Очередь умений',
    'no_skill_training'            => 'Нет умений в очереди',
    'empty_skill_queue'            => 'Очередь умений пустая',
    'account_info'                 => 'Информация об аккаунте',
    'paid_until'                   => 'Оплачен до',
    'logon_count'                  => 'Количество входов',
    'online_time'                  => 'Общее время онлайн',
    'jump_fatigue'                 => 'Пенальти гиперпрыжков (усталость)',
    'jump_clones'                  => 'Клон|Клоны',
    'jump_act_timer'               => 'Время до активации клона',
    'no_jump_clones'               => 'Клонов нет',
    'implants'                     => 'Имплантанты|Имплантаты',
    'no_implants'                  => 'Нет имплантатов',
    'employment_history'           => 'Стаж работы',
    'no_employment_information'    => 'Нет информации о стаже работы',
    'corporation_titles'           => 'Звание|Званий',
    'no_corporation_titles'        => 'Звания отсутствуют',
    'attribute'                    => 'Атрибут|Атрибуты',
    'value'                        => 'Ценность|Ценности',
    'bonus_remaps'                 => 'Перераспределение атрибутов',
    'last_remap_date'              => 'Последнее перераспределение атрибутов',
    'accrued_remap_cooldown_date'  => 'Следующее перераспределение атрибутов',
    'item_type'                    => 'Тип предмета',
    'client_name'                  => 'Имя клиента',
    'client'                       => 'Клиент',
    'qty'                          => '#',
    'unknown_character'            => 'Неизвестный персонаж. Проверьте актуальность API',
    'no_account_info'              => 'Нет информации об аккаунте',
    'channel_members'              => 'Члены канала связи',
    'motd'                         => 'MoTD',
    'bookmark'                     => 'Закладка|Закладки/Буки',
    'coordinates'                  => 'Координаты',
    'folder'                       => 'Папка',
    'skills_graph'                 => 'Графики навыков',
    'contract_items'               => 'Создать контракт',
    'progress'                     => 'Прогресс развития',

    // Character Intel
    'loading_journal'              => 'Загрузка журнала ...',
    'loading_transactions'         => 'Загрузка истории переводов ...',
    'loading_mail'                 => 'Загрузка истории почты...',

    // Corporation
    'alliance'                     => 'Альянс',
    'ticker'                       => 'Краткое название',
    'ceo'                          => 'Директор',
    'home_station'                 => 'Домашняя станция',
    'tax_rate'                     => 'Налог',
    'member_count'                 => 'Количество членов',
    'roles_change_log'             => 'Архив изменения ролей',
    'affected'                     => 'Применено',
    'member_limit'                 => 'Максимальное количество членов',
    'shares'                       => 'Акции',
    'member_capacity'              => 'Возможности членов корпорации',
    'divisional_information'       => 'Информация о дивизионах',
    'corporation_divisions'        => 'Корпоративные дивизионы',
    'wallet_divisions'             => 'Разделы кошелька корпорации',
    'unknown_corporation'          => 'Неизвестная корпорация. Проверьте API ключ, он обновлен?',
    'created_by'                   => 'Создано',
    'starbase'                     => 'База|Базы',
    'structure'                    => 'Структура|Структуры',
    'reinforce_week_hour'          => 'Время реинфорса. Неделя/Час',
    'state'                        => 'Состояние',
    'fuel_level'                   => 'Уровень топлива',
    'offline'                      => 'Примерное время выхода в оффлайн',
    'cargo_usage'                  => 'Использование трюма',
    'onlined_at'                   => 'Примерно время выхода в онлайн',
    'moon'                         => 'Луна',
    'use_standings_from'           => 'Использовать репутацию',
    'attack_on_agression'          => 'Атаковать в случае агрессии',
    'attack_on_war'                => 'Атаковать в случае войны',
    'corp_member_access'           => 'Доступ членов корпорации',
    'alliance_member_access'       => 'Доступ членов альянса',
    'fuel_levels'                  => 'Уровня топлива',
    'fuel_blocks'                  => 'Топливные блоки',
    'fuel_usage'                   => 'Использование топлива',
    'low_fuel'                     => 'Мало топлива',
    'stront_usage'                 => 'Использования Стронциума',
    'blocks_p_h'                   => 'Топливные блоки в час',
    'units_p_h'                    => 'Количество в час',
    'sov_bonus'                    => 'Бонус суверенитета',
    'reinforce_estimate'           => 'Примерное время входа в реинфорс',
    'module'                       => 'Модуль|Модули',
    'content'                      => 'Содержимое',
    'no_known_assets'              => 'Нет известных активов',
    'volume_usage'                 => 'Использование объёма',
    'loading_modules'              => 'Загрузка информации о модуле...',
    'pocos'                        => 'Таможенные офисы',
    'reinforcement'                => 'Реинфорс',
    'standing_level'               => 'Уровень репутации',
    'tax_alliance_corp'            => 'Налог: Альянс/Корпорация',
    'tax_standings'                => 'Налог: Репутация',
    'no_storage'                   => 'Не хватает места',
    'member'                       => 'Член|Члены',

    // Mining Ledger
    'mining'                       => 'Добыча руды',
    'mining_ledger'                => 'Гроссбух|Гроссбухи',
    'available_ledger'             => 'Доступный Гроссбух|Доступные Гроссбухи',
    'ore'                          => 'Руда',

    // Profile
    'user_profile'                 => 'Профиль',
    'user_preferences'             => 'Основные настройки',
    'user_account'                 => 'Аккаунт',
    'account_settings'             => 'Настройки аккаунта',
    'upgrade_sso'                  => 'Усовершенствовать до EVE Online SSO аккаунта',
    'change_email'                 => 'Поменять email',
    'superuser'                    => 'Суперпользователь',
    'user_interface'               => 'Интерфейс',
    'main_character'               => 'Основной персонаж',
    'seat_skin'                    => 'Стиль',
    'language'                     => 'Язык',
    'sidebar_size'                 => 'Размер экрана',
    'mail_as_threads'              => 'Просмотр сообщений в виде тем',
    'number_format'                => 'Формат цифр',
    'current_format'               => 'Текущий формат',
    'thousands_seperator'          => 'Тысячные',
    'decimal_seperator'            => 'Десятичные',
    'email_notifications'          => 'Уведомления по Emai',
    'setup_token_now'              => 'Настроить токен сейчас',
    'owned_keys'                   => 'Текущие ключи',
    'account_help'                 => 'По любым вопросам связанным с аккаунтом, включая разрешения, ' .
        'пожалуйста свяжитесь с администратором.',
    'current_email'                => 'Текущий Email',
    'new_email'                    => 'Новый Email',
    'confirm_new_email'            => 'Подтвердить новый Email',
    'scan_qr'                      => 'Сканировать QR код',
    'scan_qr_help1'                => 'Пожалуйста просканируйте QR код с вашим приложением авторизации.',
    'scan_qr_help2'                => 'Каждый раз, когда страница загружается, новый токен и QR код создается.',
    'supported_apps'               => 'Поддерживаемые приложения авторизации Google',
    'preferred_apps'               => 'Предпочтительные приложения',
    'other_apps'                   => 'Остальные приложения',
    'confirm_code'                 => 'Подтвердите код авторизации',
    'confirm_help'                 => 'Далее, подтвердите вашу настройку, путем ввода созданного кода' .
        'вашим приложением.',
    'code'                         => 'Код',
    'confirm_setup'                => 'Подтвердить настройку',
    'linked_characters'            => 'Связанные персонажи',
    'link_another_character'       => 'Привязать еще персонажа',
    'view_third_party_access'      => 'Посмотреть приложения на Eveonline.com',
    'third_party_access'           => 'Проверка доступа к приложению',

    // Queue
    'queue_manage'                 => 'Управление очередями производства',
    'total_jobs'                   => 'Всего процессов в производстве',
    'queued_jobs'                  => 'Производство в очереди',
    'working_jobs'                 => 'Производится',
    'error_jobs'                   => 'Ошибки в производстве',
    'complete'                     => 'Завершенные',
    'history'                      => 'История',
    'submit_jobs'                  => 'Назначить процесс в производство',
    'job_submit_desc'              => 'Эти кнопки позволяют вручную поставить работы в очередь.' .
        'Работают точно так-же, если делать через командную строку или календарь. ',
    'no_working'                   => 'Сейчас нет активного производства.',
    'no_queue'                     => ' Сейчас нет активного производства в очереди.',
    'job_error_detail'             => 'Ошибка в описании работы',
    'error_details_desc'           => 'Есть целый перечень причин ошибки. Если вы не понимаете, ' .
        'что является причиной ошибки, или разработчик попросил об этом, скопируйте весь текст ниже ' .
        'и вставьте его на сайт, отправьте ссылку.',
    'full_job_error'               => 'Детали ошибки процесса производства',
    'job_id'                       => 'ID производства',
    'api'                          => 'Api',
    'actions'                      => 'Действия',
    'owner_id'                     => 'ID владельца',
    'clear_all_errors'             => 'Очистить все ошибки',
    'output'                       => 'Выход',
    'last_output'                  => 'Последний выход',
    'view_full'                    => 'Посмотреть целиком',
    'no_errors'                    => 'Известных ошибок нет',
    'clear_all_history'            => 'Очистить всю историю',
    'job_history'                  => 'История производственных процессов',
    'no_history'                   => 'Нет истории производственных процессов',
    'eve_api_status'               => 'EVE API статус',
    'eve_api_error_threshold'      => 'Ошибки API',
    'eve_api_connection_threshold' => 'Ошибки соединения',
    'supervisor_offline'           => 'Offline',
    'supervisor_online'            => 'Online',

    // Tools
    'standings_builder'            => 'Конструктор репутации',

    // Footer
    'web_version'                  => 'Web Version',
    'sde_version'                  => 'SDE Version',
    'render_in'                    => 'Rendered In',
    'copyright'                    => 'Copyright',
];
