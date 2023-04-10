Pusher.logToConsole = true;

var pusher = new Pusher("e97ae877a8f1daf67e50", {
    cluster: "ap1",
});

var channel = pusher.subscribe("my-channel");
channel.bind("my-event", function (data) {
    location.reload();
    console.log('berhasil');
});
