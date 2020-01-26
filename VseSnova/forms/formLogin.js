(function() {
    App.generateLoginForm =
        function generateLoginForm() {
            let form = App.ObjectForm;                                                                                  // создаем переменную куда закидываем тело страницы
            form.addDivSection();
            form.addDivRowHeader();
            form.addDivHeader();
            form.addRowBody();
            form.addInputToForm('text', 'username', "Введите имя пользователя");
            form.addDivErrorsToForm('error_username');                                                        //создаем форму ошибки имени
            form.addInputToForm('password', 'password', 'Введите свой пароль');
            form.addDivErrorsToForm('error_password');                                                        //создаем форму ошибки для пароля
            form.addDivSuccess('success');
            form.addButton('Войти', "register", App.registrationAjax);
            form.addRowFooter();
            form.addDivFooter();
            form.addFormToPage(".contBody");
         }


})();