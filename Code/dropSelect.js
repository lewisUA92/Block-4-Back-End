
window.onload = function() {
    let dropDown= document.getElementById("tables");   

    dropDown.addEventListener("change", function() {
        let selected = dropDown.options[dropDown.selectedIndex].value;
        if (selected == "parent") {
            window.location.href = "../parent/view.php";
        } else if (selected == "teacher") {
            window.location.href = "../teacher/view.php";
        } else if (selected == "student") {
            window.location.href = "../student/view.php";
        } else if (selected == "class"){
            window.location.href = "../class/view.php";
        } else if (selected == "family"){
            window.location.href = "../family/view.php";
        }
    });
};