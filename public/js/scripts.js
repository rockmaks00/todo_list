function create_card(id, header, responsible_name, responsible_surname,
                  deadline, priority_name, description, status_name) {
    let title_color = "text-muted";
    if(status_name === "Выполнена") {
        title_color = "text-success";
    }
    else if(Date.now() > Date.parse(deadline)) {
        title_color = "text-danger";
    }
    return `
<div class="card m-2 col-md-3">
    <div class="card-body" id="${id}">
        <h5 class="card-title ${title_color}">${header} <span class="card-text float-end text-muted font-16 mt-1">${status_name}</span></h5>
        <h6 class="card-subtitle text-muted">для ${responsible_name} ${responsible_surname}</h6>
        <h6 class="card-subtitle text-muted">до ${deadline}</h6>
        <h6 class="card-subtitle text-muted">${priority_name} приоритет</h6>
        <p class="card-text mt-2">${description}</p>
    </div>
</div>`;
}

function get_tasks() {
    $.get( "/tasks/get")
        .done(function( tasks ) {
            let list = document.getElementById('tasks_list');
            list.innerHTML = "";
            console.log(tasks);
            tasks.forEach((task)=> {
                list.innerHTML += create_card(task['id'], task['header'],
                    task['responsible']['name'], task['responsible']['surname'], task['deadline'],
                    task['priority']['name'], task['description'], task['status']['name']);
            });
    });
}

$(function () {
    get_tasks();
});
