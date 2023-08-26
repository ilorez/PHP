const add_btn = document.querySelector("#add-btn");

//  for add btn 
add_btn.addEventListener("click",(btn) => {
    task = prompt("Enter The Task: ");
    const date = btn.target.attributes.data_date.value;
    if(task !== null){
        link = "/PHP/020_ToDoList/backend/insert_task.php?value="+task+"&date="+date;
        // executeInBackground(link);
        window.open(link,'_self');
        return
    }
    alert("please enter your task");
});

//  for edit btn 

function edit_fn(btn){
    // console.info(btn.attributes);
    const id = btn.attributes.data_id.value;
    const old_value = btn.attributes.data_value.value;
    task = prompt("Edit your task: ",`${old_value}`);
    if(task !== null && old_value !== task){
        link = "/PHP/020_ToDoList/backend/edit.php?value="+task+"&id="+id+"&site=tomorrow";
        // executeInBackground(link);
        window.open(link,'_self');
        return
    }
    alert("please edit your task and make sure to leave it not empty!");
}