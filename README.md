# paintOnline
paintOnline - графический редактор, построенный на веб-сокетах

Данная работа представляет собой маленькое онлайн приложение, которое позволяет редактировать изображения
в простом графическом редакторе, построенном на canvas (HTML5), совместно.

В данном редакторе действия одного пользователя одновременно видят другие пользователи. 

Для общения между участниками создан небольшой чатик справа от полотна для рисования.

Перед началом работы с редактором, необходима регистрация. После регистрации и авторизации происходит переход на страницу
создания сессий. В данном месте создаются локальные диалоги. После создания такого диалога, пользователя перекидывает на 
страницу редактора, где он является хостом и его выход из редактора будет означать уничтожение текущего диалога.

Созданная пользователем сессия тут же отображается всем авторизованным пользователям на странице создания сессий,
и поэтому они могут войти в сессию пользователя-хоста, если знают пароль и имя сессии, которое ей присвоил создатель.
