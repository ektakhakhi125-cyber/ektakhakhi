function validateLogin() {

    let username = document.getElementById("username").value.trim();

    let password = document.getElementById("password").value.trim();

    if (username === "") {

        alert("Please enter username.");

        return false;
    }

    if (password === "") {

        alert("Please enter password.");

        return false;
    }

    return true;
}


function validateTicket() {

    let title = document.getElementById("title").value.trim();

    let status = document.getElementById("status").value;

    let assignedTo =
        document.getElementById("assignedTo").value.trim();


    if (title === "") {

        alert("Please enter ticket title.");

        return false;
    }


    if (status === "") {

        alert("Please select ticket status.");

        return false;
    }


    if (assignedTo === "") {

        alert("Please enter assigned person.");

        return false;
    }


    return true;
}


function loadTickets(status) {

    let ticketData =
        document.getElementById("ticketData");

    ticketData.innerHTML = "Loading...";


    let xhr = new XMLHttpRequest();

    xhr.open(
        "GET",
        "ajax_tickets.php?status=" + encodeURIComponent(status),
        true
    );


    xhr.onreadystatechange = function () {

        if (
            xhr.readyState === 4 &&
            xhr.status === 200
        ) {

            ticketData.innerHTML = xhr.responseText;

        }

    };


    xhr.send();

}