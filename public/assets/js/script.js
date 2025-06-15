let search = document.querySelector(".search-box");
document.querySelector("#search-icon").onclick = () => {
    search.classList.toggle("active");
    menu.classList.remove("active");
};
let menu = document.querySelector(".navbar");
document.querySelector("#menu-icon").onclick = () => {
    menu.classList.toggle("active");
    search.classList.remove("active");
};
// Hide Menu And Search Box On Scroll
window.onscroll = () => {
    menu.classList.remove("active");
    search.classList.remove("actve");
};

// Header

let header = document.querySelector("header");

window.addEventListener("scroll", () => {
    header.classList.toggle("shadow", window.scrollY > 0);
});

//  Payment Process
let payment_btns = document.querySelectorAll(".pay-btn");
payment_btns.forEach((btn) => {
    btn.onclick = (e) => {
        e.preventDefault();

        let part_id = btn.dataset.id;
        btn.classList.add("disabled");
        btn.innerHTML = "Processing..";

        const csrfToken = document.head.querySelector(
            "[name~=csrf-token][content]"
        ).content;

        fetch("/pay", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({
                part_id: part_id,
            }),
        })
            .then((response) => response.json())
            .then((data) => {
                stripe.redirectToCheckout({
                    sessionId: data.session_id,
                });
            });
    };
});
