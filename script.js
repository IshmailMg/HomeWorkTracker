document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('homeworkForm');
    const taskInput = document.getElementById('taskInput');
    const deadlineInput = document.getElementById('deadlineInput');
    const taskList = document.getElementById('taskList');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const task = taskInput.value.trim();
        const deadline = deadlineInput.value;

        if (task === '' || deadline === '') {
            alert('Please fill in all fields');
            return;
        }

        const formData = new FormData();
        formData.append('task', task);
        formData.append('deadline', deadline);

        fetch('save_task.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                const listItem = document.createElement('li');
                listItem.innerHTML = `<span>${task}</span> - Deadline: ${deadline} <button class="delete-btn">Delete</button>`;
                taskList.appendChild(listItem);

                taskInput.value = '';
                deadlineInput.value = '';

                const deleteBtn = listItem.querySelector('.delete-btn');
                deleteBtn.addEventListener('click', function () {
                    listItem.remove();
                });
            } else {
                alert('Failed to save task');
            }
        });
    });
});