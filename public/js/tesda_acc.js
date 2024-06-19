function addRowToAccreditationTable() {
    var table = document.getElementById("accreditationTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow();

    var qualificationCell = newRow.insertCell(0);
    var accreditationNumberCell = newRow.insertCell(1);
    var validityCell = newRow.insertCell(2);

    qualificationCell.innerHTML = '<input type="text" placeholder="Qualification">';
    accreditationNumberCell.innerHTML = '<input type="text" placeholder="Accreditation Number">';
    validityCell.innerHTML = '<input type="text" placeholder="Validity">';
}

function addRowToAssessmentTable() {
    var table = document.getElementById("assessmentTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow();

    var qualificationCell = newRow.insertCell(0);
    var assessmentFeeCell = newRow.insertCell(1);
    var assessmentHoursCell = newRow.insertCell(2);
    var totalCandidatesCell = newRow.insertCell(3);

    qualificationCell.innerHTML = '<input type="text" placeholder="Qualification">';
    assessmentFeeCell.innerHTML = '<input type="text" placeholder="Assessment Fee">';
    assessmentHoursCell.innerHTML = '<input type="text" placeholder="Assessment Hours">';
    totalCandidatesCell.innerHTML = '<input type="text" placeholder="Total Candidates">';
}

document.querySelector('.add-schedule').addEventListener('click', function() {
    const scheduleContainer = document.getElementById('schedule-container');
    
    const newSchedule = document.createElement('div');
    newSchedule.className = 'schedule';
    
    newSchedule.innerHTML = `
        <h3><input type="text" placeholder="Schedule Date"></h3>
        <p class="title"><strong><input type="text" placeholder="Time"> <input type="text" placeholder="Course Name"></strong></p>
        <p class="address"><input type="text" placeholder="Location Address"></p>
        <p class="address"><input type="text" placeholder="Telephone"> <br><input type="email" placeholder="Email"></p>
    `;
    
    const hr = document.createElement('hr');
    hr.className = 'line';
    
    scheduleContainer.appendChild(newSchedule);
    scheduleContainer.appendChild(hr);
});