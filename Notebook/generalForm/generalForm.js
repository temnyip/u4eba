
(function () {
    App.ObjectForm = {};
    App.ObjectForm.addDivHeader = addDivHeader;
    App.ObjectForm.addDivSection = addDivSection;
    App.ObjectForm.addRowBody = addRowBody;
    App.ObjectForm.addFormToPage = addFormToPage;
    App.ObjectForm.addInputToForm = addInputToForm;
    App.ObjectForm.addDivErrorsToForm = addDivErrorsToForm;
    App.ObjectForm.addButton = addButton;
    App.ObjectForm.addDivSuccess = addDivSuccess;
    App.ObjectForm.addDivFooter = addDivFooter;


    let section = document.createElement("div");
    function addDivSection() {
        section.className = "section";
        document.body.append(section);
    }

    function addDivHeader() {
        let header = document.createElement("div");
        header.className = "header fixed-top";
        header.id = "head";
        header.innerText = "SUPER NOTEBOOK";
        section.append(header);
    }

    let rowBody = document.createElement("div");
    function addRowBody() {
        rowBody.className = "container contBody";
        section.append(rowBody);
    }


    let form = document.createElement("form");
    form.setAttribute('method',"post");
    // form.setAttribute('action', "");
    form.className = ("registration_form");

    function addInputToForm (type, name, placeholder, pattern) {
        let input = document.createElement("input");
        input.type = type;
        input.name = name;
        input.className = "registrationForm form-control form-control-lg";
        input.placeholder = placeholder;
        input.pattern = pattern;
        form.append(input);
    }

    function addFormToPage(selector) {
        document.querySelector(selector).append(form); //  привязываемся к rowBody в файле generateRegForm.js
    }

    let errorCssClassName = "errors";
    function addDivErrorsToForm (classname) {
        let divErrors = document.createElement("div");
        divErrors.className = errorCssClassName + ' ' + classname;
        form.append(divErrors);
    }

    let messageOkClassName = "registration_result";  //задаем имя класса
    function addDivSuccess (classname) {
        let divOk = document.createElement("div");
        divOk.className = messageOkClassName + ' ' + classname;
        form.append(divOk);

    }
    function addButton(buttonValue, buttonName, onclick) {
        let button = document.createElement("input");
        button.type = "button";
        button.name = buttonName;
        button.className = "registrationForm btn btn-lg btn-primary btn-block";
        button.value = buttonValue;
        button.onclick = function () {
            onclick(event);
        };
        form.append(button);
    }

    function addDivFooter() {
        let footer = document.createElement("div");
        footer.className = "header fixed-bottom";
        footer.id = "foot";
        footer.innerText = "Copyright by Vasyankin, 2019";
        section.append(footer);
    }

})();