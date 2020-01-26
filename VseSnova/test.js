function AddNote(event) {
    event.preventDefault();

    let element = document.getElementById('form1');
    let form = document.createElement('form1');
    form.setAttribute('method',"post");

    let div = document.createElement('div');
    div.className = "Edit_node";
    div.innerText = "Edit_Node";

    let inputName = document.createElement('input');
    inputName.type = "text";
    inputName.id = "name";
    inputName.name = "name";
    inputName.className = "Note_name";
    inputName.placeholder = "Введите название заметки";

    let date = document.createElement('input');
    date.id = "date";
    date.type = "date";
    date.name = "date";
    date.className = "form-control";

    let textarea = document.createElement('textarea');
    textarea.id = "note";
    textarea.className = "Note_text";
    textarea.name = "note";

    let button = document.createElement('button');
    button.className = "register1";
    button.type = "submit";
    button.innerText = "Сохранить запись";
    button.onclick = saveNote;

    element.appendChild(form);
    element.appendChild(div);
    element.appendChild(inputName);
    element.appendChild(date);
    element.appendChild(textarea);
    element.appendChild(button);
}
//
function saveNote(event) {
    event.preventDefault();
    let name = document.getElementById('name').value;
    if (name =='')
    {
        return alert('Название записи не введено');
    }
    fetch('PHP/Note.php', {method: "POST", body: new FormData(document.querySelector('.form1'))
    })
        .then(response => response.json())
        .then(json => {

        });
}