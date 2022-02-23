require('./bootstrap');

const inputTextarea = document.querySelector('#data');
const submitButton = document.querySelector('#submit');
const tableDiv = document.querySelector('#table');
const rowsDiv = tableDiv.querySelectorAll('div[data-time]');

submitButton.addEventListener('click', submit);

function submit() {
    const valueString = inputTextarea.value;
    if (!isJSON(valueString)) {
        alert('JSON INVÁLIDO');
        return;
    }

    initialize();

    const valueJson = JSON.parse(valueString);
    const data = valueJson;
    for (let key in data) {
        const day = key;
        const activities = data[key];
        for (const activity of activities) {
            const startTime = activity.start_time;
            const endTime = activity.end_time;
            const text = activity.name;

            for (let i = 0; i < rowsDiv.length; i++) {
                const rowDiv = rowsDiv[i];
                const time = rowDiv.getAttribute('data-time');
                if (time >= startTime && time <= endTime ) {
                    const cellDiv = rowDiv.querySelector(`div[data-day='${day}']`);
                    cellDiv.classList.add('table-cell-selected');
                    cellDiv.innerHTML = text;
                }
            }
        }
    }
};

function initialize() {
    for (let i = 0; i < rowsDiv.length; i++) {
        const rowDiv = rowsDiv[i];
        const cellsDiv = rowDiv.querySelectorAll(`div[data-day]`);
        for (let j = 0; j < cellsDiv.length; j++) {
            const cellDiv = cellsDiv[j];
            cellDiv.classList.remove('table-cell-selected');
            cellDiv.innerHTML = null;
        }
    }
};

function isJSON(str) {
    try {
        return (JSON.parse(str) && !!str);
    } catch (e) {
        return false;
    }
};

inputTextarea.value = JSON.stringify({
    "monday": [
        {"name": "Jorge", "start_time": "08:00", "end_time": "09:00"},
        {"name": "Jorge", "start_time": "09:30", "end_time": "11:00"},
        {"name": "Jorge", "start_time": "15:00", "end_time": "16:00"},
        {"name": "Jorge", "start_time": "17:00", "end_time": "19:30"}
    ],
    "tuesday": [
        {"name": "Jorge", "start_time": "08:00", "end_time": "09:00"},
        {"name": "Jorge", "start_time": "11:30", "end_time": "12:00"},
        {"name": "Jorge", "start_time": "15:00", "end_time": "16:00"},
        {"name": "Jorge", "start_time": "17:00", "end_time": "19:30"}
    ],
    "wednesday": [
        {"name": "Jorge", "start_time": "08:00", "end_time": "09:00"},
        {"name": "Jorge", "start_time": "10:30", "end_time": "12:00"},
        {"name": "Jorge", "start_time": "15:00", "end_time": "16:00"},
        {"name": "Jorge", "start_time": "17:00", "end_time": "19:30"}
    ],
    "thursday": [
        {"name": "Jorge", "start_time": "08:00", "end_time": "09:00"},
        {"name": "Jorge", "start_time": "09:30", "end_time": "12:00"},
        {"name": "Jorge", "start_time": "15:00", "end_time": "16:00"},
        {"name": "Jorge", "start_time": "17:00", "end_time": "19:30"}
    ],
    "friday": [
        {"name": "Jorge", "start_time": "08:00", "end_time": "09:00"},
        {"name": "Jorge", "start_time": "09:30", "end_time": "12:00"},
        {"name": "Jorge", "start_time": "15:00", "end_time": "16:00"},
        {"name": "Jorge", "start_time": "17:00", "end_time": "19:30"}
    ]
});
submitButton.click();