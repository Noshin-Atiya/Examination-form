// script.js
function validateForm() {
    const studentId = document.getElementById("student_id").value;
    const name = document.getElementById("name").value;
    const department = document.getElementById("department").value;
    const semester = document.getElementById("semester").value;
    const examType = document.getElementById("exam_type").value;
    const courseCodes = document.getElementById("course_codes").value;
    const examDate = document.getElementById("exam_date").value;

    if (!studentId || !name || !department || !semester || !examType || !courseCodes || !examDate) {
        alert("Please fill in all fields.");
        return false;
    }
    return true;
}
