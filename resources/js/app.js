import Echo from "laravel-echo";
import Pusher from "pusher-js";
import tinymce from "tinymce";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: f8a5e1bc31ad4949f454,
    cluster: ap2,
    encrypted: true,
} );

document.addEventListener("DOMContentLoaded", function () {
    tinymce.init({
        selector: "#service_details",
        height: 300,
        plugins: "autolink lists link",
        toolbar:
            "undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
        menubar: false,
    });

    // If using CKEditor:
    ClassicEditor.create(document.querySelector("#service_details")).catch(
        (error) => {
            console.error(error);
        }
    );
});

