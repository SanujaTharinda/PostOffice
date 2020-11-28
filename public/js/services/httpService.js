
function request({ type, data, url, success }) {
    $.ajax({ type, data, url, success });
}

export {
    request
}