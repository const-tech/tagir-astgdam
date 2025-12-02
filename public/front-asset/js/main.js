// Click tog-show
if (document.querySelector(".tog-show")) {
    let togglesShow = document.querySelectorAll(".tog-show");
    togglesShow.forEach((e) => {
        let togg = true;
        e.addEventListener("click", (evt) => {
            let listItem = document.querySelector(e.getAttribute("data-show"));
            if (togg == true) {
                listItem.style.display = "flex";
                togg = false;
            } else {
                listItem.style.display = "none";
                togg = true;
            }
        });
    });
}
// print
if (
    document.getElementById("prt-content") &&
    document.getElementById("btn-prt-content")
) {
    const btnPrtContent = document.getElementById("btn-prt-content");
    btnPrtContent.addEventListener("click", printDiv);

    function printDiv() {
        const prtContent = document.getElementById("prt-content");
        newWin = window.open("");
        newWin.document.head.replaceWith(document.head.cloneNode(true));
        newWin.document.body.appendChild(prtContent.cloneNode(true));
        setTimeout(() => {
            newWin.print();
            newWin.close();
        }, 600);
    }
}
