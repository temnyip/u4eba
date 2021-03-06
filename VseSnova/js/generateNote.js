
(function() {
    App.generateNoteList =
        function generateNoteList(arrDataJson) {

            let table = document.createElement("table");
            table.className = 'table_notes table table-striped table-hover';
            let tbody = document.createElement("tbody");


            arrDataJson.forEach(function (note){

                let tr = document.createElement('tr');
                let td_name = document.createElement('td');
                td_name.innerHTML = note['name'];
                td_name.className = 'note_name';
                td_name.onclick = function (){
                    App.seeNote(note);
                };

                let td_date = document.createElement('td');
                td_date.innerHTML = note['date_create'];
                td_date.className = 'note_date';

                let edit = document.createElement('td');
                edit.innerHTML ="&#10000;";
                edit.className = 'marker';


                edit.onclick = function(){
                    App.editNote(note);

                }
                let del = document.createElement('td');
                del.innerHTML = "&#10006;";
                del.className = 'marker';

                del.onclick = function(){
                    App.deleteNote(note['id'], note['name']);
                }
                tr.append(td_name);
                tr.append(td_date);
                tr.append(edit);
                tr.append(del);
                tbody.append(tr);

            })
            table.append(tbody);
            document.querySelector('.list_notes').innerHTML = '';
            document.querySelector('.list_notes').append(table);

        }
})();


(function() {
    App.seeNote =
        function seeNote(noteData) {
            let seeNote = document.querySelector('.note_work_area');
            seeNote.innerHTML = '';

            let name = document.createElement('div');
            name.innerText = noteData.name;
            name.className = 'see_name col-6';

            let date = document.createElement('div');
            date.innerHTML = noteData.date_create;
            date.className = 'see_date_create col-6';

            let hr = document.createElement('hr');

            let text = document.createElement('div');
            text.innerHTML = noteData.text;
            text.className = "see_text col-12 border-top";


            seeNote.append(name);
            seeNote.append(date);
            seeNote.append(hr);
            seeNote.append(text);

        }
})();

(function() {
    App.editNote =
        function editNote(noteData) {
            //create_form();
            //create_title_edit();
            //Create_date_edit();

            let editNote = document.querySelector('.note_work_area');
            editNote.innerHTML = '';

            let form = document.createElement("form");
            form.setAttribute('method',"post");
            form.className = "col-12 edit_note";

            let titleEdit = document.createElement("div");
            titleEdit.className = "title_edit col-12 border-bottom col-sm-10 my-2 text-lg-left";
            titleEdit.innerHTML = "<p>Edit node</p>";

            let noteName = document.createElement("input");
            noteName.type = "text";
            noteName.className = "name_note form-control form-control-lg col-sm-10 my-2";
            noteName.name = "name_note";
            noteName.value = noteData.name;

            let dateTime = document.createElement('input');
            dateTime.type = "text";
            dateTime.className = "form-control datetimepicker-input col-sm-10 my-2";
            dateTime.id = "datetimepicker";
            dateTime.name = "datetime_create";
            dateTime.value = noteData.date_create;

            dateTime.setAttribute('data-toggle', "datetimepicker");
            dateTime.setAttribute('data-target', "#datetimepicker");


            let  textNote = document.createElement("textarea");
            textNote.className = "text_note form-control form-control-lg col-sm-10 my-2 ";
            textNote.name = "text_note";
            textNote.value = noteData.text;


            let  sendButton = document.createElement("button");
            sendButton.className = "button_send btn btn-primary btn-lg my-2";
            sendButton.name = "save_button";
            sendButton.innerHTML = "Save";
            sendButton.onclick = function () {
                App.editNoteAjax(noteData.id, event);
            }


            form.append(titleEdit);
            form.append(noteName);
            form.append(dateTime);
            form.append(textNote);
            form.append(sendButton);
            editNote.append(form);



            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss'//,
                // defaultDate: noteData.date_create
            });
            $("#datetimepicker").val(noteData.date_create);




        }
})();

(function() {
    App.createNote =
        function createNote() {
            let createNote = document.querySelector('.note_work_area');
            createNote.innerHTML = '';

            let form = document.createElement("form");
            form.setAttribute('method',"post");
            form.className = "col-12 create_note";

            let titleEdit = document.createElement("div");
            titleEdit.className = "title_edit col-12 border-bottom col-sm-10 my-2 text-lg-left";
            titleEdit.innerHTML = "<p>Создание заметки</p>";

            let noteName = document.createElement("input");
            noteName.type = "text";
            noteName.className = "name_note form-control form-control-lg col-sm-10 my-2";
            noteName.name = "name_note";
            noteName.placeholder = "Note name";


            let  textNote = document.createElement("textarea");
            textNote.className = "text_note form-control form-control-lg col-sm-10 my-2 ";
            textNote.placeholder = "Note text";
            textNote.name = "text_note";


            let  sendButton = document.createElement("button");
            sendButton.className = "button_send btn btn-primary btn-lg my-2";
            sendButton.name = "save_button";
            sendButton.innerHTML = "Save";
            sendButton.onclick = function () {
                App.saveNoteAjax(event);
            }


            form.append(titleEdit);
            form.append(noteName);
            form.append(textNote);
            form.append(sendButton);
            createNote.append(form);





        }
})();

(function() {
    App.deleteNote =
        function deleteNote(noteId, noneName) {
            document.querySelector('.delete_modal .note_name').innerHTML = noneName;
            document.querySelector('.delete_modal .btn_delete').onclick = function () {
                App.deleteNoteAjax(noteId, event);
            }
            $('.delete_modal').modal();

        }
})();

(function() {
    App.searchNote =
        function searchNote() {
            $('tr.none_display').each(function () {
                $(this).removeClass('none_display');
            })
            let search_str = $('.search_input').val();
            $('td.note_name').each(function () {
                if (this.innerHTML.toUpperCase().match(search_str.toUpperCase()) == null){
                    $(this).parent().addClass("none_display");
                }
            })



        }
})();