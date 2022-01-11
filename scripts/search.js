const search = document.querySelector("#nav-search");

const body = document.querySelector("#body");

search.addEventListener("click", () => {
    const searchDiv = document.createElement("div");
    
    const searchBar = `
        <form action="/search.php" method="GET">
            <input name="search" type="text" placeholder="Search">
        </form>
    `;
    searchDiv.innerHTML = searchBar;
    
    searchDiv.addEventListener("focusout", () => {
        searchDiv.remove();
    });

    searchDiv.className = "searchbar";

    body.appendChild(searchDiv);

    const input = document.querySelector(".searchbar form input");
    input.focus();
    // console.log(input.autofocus);
})

const copyEmail = document.querySelector("#copy-email");

copyEmail.addEventListener("click", () => {
    navigator.clipboard.writeText("christiandanielgomes@gmail.com");
})