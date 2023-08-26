const add_btn = document.querySelector("#add-btn");

//  for add btn 
add_btn.addEventListener("click",(btn) => {
    task = prompt("Enter The Task: ");
    const date = btn.target.attributes.data_date.value;
    if(task !== null && task.length < 200){
        link = "/PHP/020_ToDoList/backend/insert_task.php?value="+task+"&date="+date;
        // executeInBackground(link);
        window.open(link,'_self');
        return
    }
    alert("please enter your task");
});

//  for edit btn 

function edit_fn(btn){
    const id = btn.attributes.data_id.value;
    const old_value = btn.attributes.data_value.value;
    const site = btn.attributes.data_site.value;
    task = prompt("Edit your task: ",`${old_value}`);
    if(task !== null && old_value !== task && task.length < 200){
        link = "/PHP/020_ToDoList/backend/edit.php?value="+task+"&id="+id+"&site="+site;
        // executeInBackground(link);
        window.open(link,'_self');
        return
    }
    alert("please edit your task and make sure to leave it not empty!");
}

function executeInBackground(id, inp) {
    var xhr = new XMLHttpRequest();

    // Specify the PHP file's URL
    var url = "/PHP/020_ToDoList/backend/edit_state.php?id=" + id + "&state=" + inp.checked;


    // Open an asynchronous GET request to the PHP file
    xhr.open("GET", url, true);


    xhr.send();


}

// add line-through to a label 
function add_lt(inp) {
    const label = inp.parentNode.children[1];
    if (inp.checked) {
        label.style.textDecoration = 'line-through';
    } else {
        label.style.textDecoration = 'none';
    }
}


function cb_changed(event, inp) {
    const id = inp.getAttribute("id").replace("cb-", ""); // Corrected this line
    add_lt(inp);
    executeInBackground(id, inp);
    if (event.shiftKey && inp.checked) {
        const inputs = [...document.querySelector(".to-do-list").querySelectorAll("input[type='checkbox']")];


        for (let i = inputs.length - 1; i >= 0; i--) { // Changed loop conditions and added 'let'
            const inputId = inputs[i].getAttribute("id").replace("cb-", ""); // Corrected getting input ID

            if (parseInt(inputId) < parseInt(id)) {

                if (inputs[i].checked) {

                    return;
                } else {
                    inputs[i].checked = true;
                    add_lt(inputs[i]);
                    executeInBackground(inputId, inputs[i]);

                }
            }
        }

    }


}