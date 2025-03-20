let http1 = new XMLHttpRequest();
let http2 = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', function() {
    setInterval(send_message, 250);
    setInterval(get_message, 250);
});

function send_message() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const message = document.getElementById('send_message_box').value;
    const status = document.getElementById('send_status');
    
    fetch(`sendmessage.php?username=${username}&password=${password}&message=${message}`)
    .then(response => response.text())
    .then(data => {
        status.innerHTML = data;
    });

}
function get_message() {
    const username = document.getElementById('get_name').value;

    if (username == '') {
        document.getElementById('get_status').innerHTML = '';
        return;
    }

    fetch(`getmessage.php?name=${username}`)
    .then(response => response.text())
    .then(data => {
        console.log('Data: ', data);
        document.getElementById('message_box').value = data;
    })
}