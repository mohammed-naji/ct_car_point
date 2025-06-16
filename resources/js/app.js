import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

Echo.private("App.Models.User." + userId).notification((notification) => {
    toastr.success(`<a href="${notification.url}">${notification.msg}</a>`);
});
