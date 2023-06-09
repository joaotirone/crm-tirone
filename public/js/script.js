const body = document.querySelector("body"),
        sidebar = body.querySelector(".sidebar"),
        toggle = body.querySelector(".toggle"),
        roxobutn = body.querySelector(".rbt"),
        backdiv = body.querySelector(".divback"),
        searchBtn = body.querySelector(".search-box"),
        modeSwtich = body.querySelector(".mode"),
        modeText = body.querySelector(".mode-text");
        graficodiv = body.querySelector(".divgrafico");

        toggle.addEventListener("click", () =>{
            sidebar.classList.toggle("close");
        });

        // Obtém a preferência do usuário do armazenamento local
        const userPreference = localStorage.getItem("modePreference");

        // Define o modo com base na preferência do usuário
        if (userPreference === "dark") {
            body.classList.add("dark");
            modeText.innerText = "Light Mode";
        } else {
            body.classList.remove("dark");
            modeText.innerText = "Dark Mode";
        }

        // Alterna o modo e salva a preferência do usuário no armazenamento local
        modeSwtich.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light Mode";
                localStorage.setItem("modePreference", "dark");
            } else {
                modeText.innerText = "Dark Mode";
                localStorage.setItem("modePreference", "light");
            }
        });