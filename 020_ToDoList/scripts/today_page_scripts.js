const add_btn = document.querySelector("#add-btn");


// function executeInBackground(link) {
//     var xhr = new XMLHttpRequest();

//     // Specify the PHP file's URL
//     var url = link;


//     // Open an asynchronous GET request to the PHP file
//     xhr.open("GET", url, true);


//     xhr.send();


// }
//  for add btn 
add_btn.addEventListener("click",() => {
    task = prompt("Enter The Task: ");
    if(task !== null ){
        console.log(task.length)
        link = "/PHP/020_ToDoList/backend/insert_task.php?value="+task;
        // executeInBackground(link);
        window.open(link,'_self');
        return
    }
    alert("please enter your task");
});
//  for edit btn 

function edit_fn(btn){
    console.info(btn.attributes);
    const id = btn.attributes.data_id.value;
    const old_value = btn.attributes.data_value.value;
    task = prompt("Edit your task: ",`${old_value}`);
    if(task !== null && old_value !== task){
        link = "/PHP/020_ToDoList/backend/edit.php?value="+task+"&id="+id;
        // executeInBackground(link);
        window.open(link,'_self');
        return
    }
    alert("please edit your task and make sure to leave it not empty!");
}

