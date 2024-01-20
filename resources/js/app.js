import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: f8a5e1bc31ad4949f454,
    cluster: ap2,
    encrypted: true,
});
