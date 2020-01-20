
(function () {
    App.ObjectForm = {};
    App.ObjectForm.addDivRowHeader = addDivRowHeader;
    App.ObjectForm.addDivHeader = addDivHeader;
    App.ObjectForm.addDivSection = addDivSection;
    App.ObjectForm.addRowBody = addRowBody;
    App.ObjectForm.addFormToPage = addFormToPage;
    App.ObjectForm.addInputToForm = addInputToForm;
    App.ObjectForm.addDivErrorsToForm = addDivErrorsToForm;
    App.ObjectForm.addButton = addButton;
    App.ObjectForm.addDivSuccess = addDivSuccess;
    // App.ObjectForm.addClassToForm = addClassToForm;
    App.ObjectForm.addRowFooter = addRowFooter;
    App.ObjectForm.addDivFooter = addDivFooter;

    // function addClassToForm(setAttribute){
    //     form.setAttribute = setAttribute;
    // }

    let section = document.createElement("div");
    function addDivSection() {
        section.className = "section";
        document.body.append(section);
    }

    let rowHead = document.createElement("div"); // 3. Делаем строку для хедера
    function addDivRowHeader() {
        rowHead.className = "container contHead text-uppercase";
        section.append(rowHead);
    }

    function addDivHeader() {
        let header = document.createElement("div");
        header.className = "header navbar";
        header.id = "head";
        header.innerText = "super notebook";
        section.append(header);
    }

    let rowBody = document.createElement("div");
    function addRowBody() {
        rowBody.className = "container contBody";
        section.append(rowBody);
    }


    let form = document.createElement("form");
    form.setAttribute('method',"post");
    form.setAttribute('action', "validationForm/checkLogin.php");
    form.className = ("registration_form container-fluid column");

    function addInputToForm (type, name, placeholder, pattern) {
        let input = document.createElement("input");
        input.type = type;
        input.name = name;
        input.className = "registrationForm form-control form-control-lg col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2";
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
    function addButton(buttonValue, buttonName) {
        let button = document.createElement("input");
        button.type = "submit";
        button.name = buttonName;
        button.className = "registrationForm btn btn-lg btn-primary btn-block col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2";
        button.value = buttonValue;
        // button.onclick = function () {
        //     onclick(event);
        // };
        form.append(button);
    }
    let rowFooter = document.createElement("div");
    function addRowFooter() {
        rowFooter.className = "container contFooter";
        section.append(rowFooter);
    }
    function addDivFooter() {
        let footer = document.createElement("div");
        footer.className = "header navbar fixed-bottom";
        footer.id = "foot";
        footer.innerText = "Copyright by Vasyankin, 2019";
        section.append(footer);
    }

})();