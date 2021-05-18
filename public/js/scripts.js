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
<div class="card m-2 col-md-3 hand" id="${id}" onclick="update_modal(this)">
    <div class="card-body">
        <h5 class="card-title ${title_color}">${header} <span class="card-text float-end text-muted font-16 mt-1">${status_name}</span></h5>
        <h6 class="card-subtitle text-muted">для ${responsible_name} ${responsible_surname}</h6>
        <h6 class="card-subtitle text-muted">до ${deadline}</h6>
        <h6 class="card-subtitle text-muted">${priority_name} приоритет</h6>
        <p class="card-text mt-2">${description}</p>
    </div>
</div>`;
}

function create_modal() {
    $('#create-modal').modal('show');
}

function update_modal(element) {
    tasks.forEach((task)=> {
        if(task['id'] == element.id) {
            let deadline = task['deadline'].replace(' ', 'T').substr(0, 16);
            let title = $('#update-title');
            let desc = $('#update-description');
            let date = $('#update-deadline');
            let priority = $('#update-priority');
            let resp = $('#update-responsible');
            $('#update-id').val(task['id']);
            title.val(task['header']);
            desc.val(task['description']);
            date.val(deadline);
            priority.val(task['priority']['id']);
            resp.val(task['responsible']['id']);
            if($('#user-id').val() == task['responsible']['id']) {
                title.attr('disabled', true);
                desc.attr('disabled', true);
                date.attr('disabled', true);
                priority.attr('disabled', true);
                resp.attr('disabled', true);
            }
            else {
                title.attr('disabled', false);
                desc.attr('disabled', false);
                date.attr('disabled', false);
                priority.attr('disabled', false);
                resp.attr('disabled', false);
            }
            $('#update-status').val(task['status']['id']);
        }
    })
    $('#update-modal').modal('show');
}

let tasks;

function get_tasks(groupBy) {
    $.get( "/tasks/get")
        .done(function( data ) {
            tasks = data;
            let list = document.getElementById('tasks_list');
            list.innerHTML = group(groupBy);
    });
}

function groupNone() {
    let html = "";
    tasks.forEach((task)=> {
        html += create_card(task['id'], task['header'],
            task['responsible']['name'], task['responsible']['surname'], task['deadline'],
            task['priority']['name'], task['description'], task['status']['name']);
    });
    return html;
}

function groupByDate() {
    let html = "";
    let now = new Date();
    let day_end = new Date(Date.parse(now.getFullYear() + "-" + (now.getMonth() + 1) + "-" + now.getDate()) + 86400000);
    let week_end = new Date(day_end.getTime() + 86400000 * 6);
    let group = [
        ['Задачи на сегодня', ''],
        ['Задачи на неделю', ''],
        ['Задачи позже', ''],
        ['Истекшие', '']
    ];
    tasks.forEach((task)=> {
        let card = create_card(task['id'], task['header'],
            task['responsible']['name'], task['responsible']['surname'], task['deadline'],
            task['priority']['name'], task['description'], task['status']['name']);
        let deadline = Date.parse(task['deadline']);
        if(deadline < now) {
            group[3][1] += card;
        }
        else if(deadline < day_end) {
            group[0][1] += card;
        }
        else if(deadline < week_end) {
            group[1][1] += card;
        }
        else {
            group[2][1] += card;
        }
    });
    group.forEach((category) => {
        if(category[1] !== '')
            html += "<div class='col-9 text-center'><h5>" + category[0] + "</h5></div>" + category[1];
    })
    return html;
}

function groupByResponsible() {
    let html = "";
    let tasksByUser = {};
    tasks.forEach((task)=> {
        let user_id = task['responsible']['id'];
        let user_name = task['responsible']['name']
        let user_surname = task['responsible']['surname'];
        let card = create_card(task['id'], task['header'],
            task['responsible']['name'], task['responsible']['surname'], task['deadline'],
            task['priority']['name'], task['description'], task['status']['name']);
        if(tasksByUser[user_id] === undefined) {
            tasksByUser[user_id] = `<div class='col-9 text-center'><h5>${user_name} ${user_surname}</h5></div>` + card;
        }
        else {
            tasksByUser[user_id] += card;
        }
    });
    for (const [key, value] of Object.entries(tasksByUser)) {
        html += value;
    }
    return html;
}

function group(groupBy) {
    switch (groupBy) {
        case "group-none":
            return groupNone();
        case "group-date":
            return groupByDate();
        case "group-responsible":
            return groupByResponsible();
    }
}

$(function () {
    get_tasks("group-none");
});
