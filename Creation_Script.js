let idioma;
let dificultad;
let proposito;

document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card");
    const progBar = document.querySelector("#programCBar");
    const btnContinuar = document.getElementById("btnContinuar");

    const idiomas = [
        { img: "img/SP_LAN.png", titulo: "Español"},
        { img: "img/EN_LAN.png", titulo: "Inglés"},
        { img: "img/FR_LAN.png", titulo: "Frances"}
    ]

    const niveles = [
        { img: "img/EASY.png", titulo: "Principiante" },
        { img: "img/MEDIUM.png", titulo: "Intermedio" },
        { img: "img/HARD.png", titulo: "Avanzado" }
    ];

    const propositos = [
        { img: "img/Travel.png", titulo: "Viajes"},
        { img: "img/Bussines.png", titulo: "Negocios"},
        { img: "img/Gramatics.png", titulo: "Grámatica"}
    ]

    let creationP = 1;

    function updateCreation()
    {
        cards.forEach((card, index) => {
            const img = card.querySelector("img");
            const h1 = card.querySelector("h1");

            switch(creationP)
            {
                case 1:
                    img.src = idiomas[index].img;
                    h1.textContent = idiomas[index].titulo;
                    progBar.value = 0;
                    break;
                case 2:
                    img.src = niveles[index].img;
                    h1.textContent = niveles[index].titulo;
                    progBar.value = 33;
                    break;
                case 3:
                    img.src = propositos[index].img;
                    h1.textContent = propositos[index].titulo;
                    progBar.value = 66;
                    break;
                default:
                    img.src = "";
                    h1.textContent = "ERROR";
            }
        });
    }

    updateCreation();

    cards.forEach(card =>{
        card.addEventListener("click", (event) => {
            cards.forEach(j => {
                j.classList.remove("seleccionada");
                j.style.outline = "none";
                console.log("eliminando seleccion");
            })
            card.classList.add("seleccionada");
            card.style.outline = "solid 5px purple";
            console.log("Tarjeta de configuración seleccionada");

            btnContinuar.disabled = false;
            btnContinuar.classList.remove("desactivado");
            btnContinuar.classList.add("boton");
        })
    });
    
    if(btnContinuar){
        btnContinuar.addEventListener("click", (event) => {
            event.preventDefault();
            console.log("Click en continuar, Fase de creación: ", creationP);
            cards.forEach(card => {
                if(card.classList.contains("seleccionada"))
                {
                    const h1 = card.querySelector("h1");
                    switch(creationP)
                    {
                        case 1:
                            idioma = h1.textContent;
                            break;
                        case 2:
                            dificultad = h1.textContent;
                            break;
                        case 3:
                            proposito = h1.textContent;
                            break;
                        default:
                            
                    }
                    console.log("Asignando valores:", idioma, dificultad, proposito);
                }
            })

            if (creationP !== 3) {
                creationP++;
                updateCreation();

                cards.forEach(j => {
                    j.classList.remove("seleccionada");
                    j.style.outline = "none";
                });

                btnContinuar.disabled = true;
                btnContinuar.classList.remove("boton");
                btnContinuar.classList.add("desactivado");
            } else {
                console.log("Curso registrado \nIdioma:", idioma, "\nDificultad:", dificultad, "\nProposito:", proposito);

                localStorage.setItem("idioma", idioma);
                localStorage.setItem("dificultad", dificultad);
                localStorage.setItem("proposito", proposito);

                console.log("Valores guardados en localStorage:", idioma, dificultad, proposito);

                window.location.href = "Ready_Page.php";

                idioma = localStorage.getItem("idioma");
                dificultad = localStorage.getItem("dificultad");
                proposito = localStorage.getItem("proposito");
                console.log("Valores recibidos:", idioma, dificultad, proposito);

            }
            
            /*
            cards.forEach(j => {
                j.classList.remove("seleccionada");
                j.style.outline = "none";
                console.log("eliminando seleccion");
            })
            */

            btnContinuar.disabled = true;
            btnContinuar.classList.remove("boton");
            btnContinuar.classList.add("desactivado");
        });
    }

    const btnVolver = document.getElementById("btnVolver");
    btnVolver.addEventListener("click", (event) =>{
        event.preventDefault();
        console.log("Click en volver, Fase de creación: ", creationP);
        if(creationP !== 1)
        {
            creationP --;
            updateCreation();
        }
        else
        {
            window.location.href = "Home.php";
        }
    })

    /*
    setTimeout(() => {
        window.location.href = "Home.php";
    }, 1500);
    */
   
    function init()
    {
        idioma = localStorage.getItem("idioma");
        dificultad = localStorage.getItem("dificultad");
        proposito = localStorage.getItem("proposito");
        
        const URL_OLLAMA = "https://unswallowable-anette-isagogically.ngrok-free.dev/api/generate";   
        
        const btnGenerar = document.querySelector("#btnGenerar");
        /*
        if(btnGenerar)
        {
            console.log("Valores seleccionados:", idioma, dificultad, proposito);
            btnGenerar.addEventListener("click", async (e) => {
                e.preventDefault();
                btnGenerar.textContent = "Generando...";
                console.log("Generando curso...");
                setTimeout(async () => {
                    const programa = await fetchProgramaCompleto();
                    if(programa)
                    {
                        console.log("Asignando valores:", idioma, dificultad, proposito);
                        await fetch("Guardar_Curso.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ curso: programa, idioma, dificultad, proposito })
                        });
                        console.log("Programa Final:", programa);
                    }
                }, 50);
            })
        }
        */
        idioma = localStorage.getItem("idioma");
        dificultad = localStorage.getItem("dificultad");
        proposito = localStorage.getItem("proposito");

        if (btnGenerar) {
            btnGenerar.addEventListener("click", async (e) => {
                e.preventDefault();
                btnGenerar.textContent = "Generando...";
                const programa = await fetchProgramaCompleto();
                if (programa) {
                    await fetch("Guardar_Curso.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        credentials: "include",
                        body: JSON.stringify({ curso: programa, idioma, dificultad, proposito })
                    });
                    location.href='Home.php';
                }
            });
        }

        function safeParse(str) {
            try {
                return JSON.parse(str);
            } catch (err) {
                console.error("Error al parsear JSON:", err, "Texto:", str.slice(0,200));
                return null;
            }
        }

        async function fetchDia(dia) {
            const response = await fetch("fetchPrograma.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ idioma, dificultad, proposito, dia })
            });

            const text = await response.text();
            console.log("Respuesta cruda día", dia, ":", text);
            const outer = safeParse(text);
            if (!outer || !outer.response) {
                console.error("Respuesta inválida del backend en día", dia, ":", text);
                return null;
            }

            const inner = safeParse(outer.response);
            if (!inner || !inner.curso || !inner.curso.preguntas) {
                console.error("JSON interno inválido en día", dia, ":", outer.response);
                return null;
            }

            inner.curso.preguntas.forEach(p => {
                if (!Array.isArray(p.opciones)) return;
                p.opciones = p.opciones.map((op, idx) => {
                    if (!op.clave) {
                        const key = ["A","B","C"][idx];
                        return { clave: key, valor: op[key] || op.valor || "", correcta: !!op.correcta };
                    }
                    return {
                        clave: op.clave,
                        valor: op.valor || "",
                        correcta: !!op.correcta
                    };
                });
            });

            return inner;
        }

        async function fetchProgramaCompleto()
        {
            let curso = [];
            for (let dia = 1; dia <= 7; dia++)
            {
                const resultado = await fetchDia(dia);
                if(resultado)
                {
                    curso.push(resultado);
                }
            }
            console.log("Curso completo:", curso);
            return curso;
        }
    }

    const btn = document.querySelector("button");

    /*
    btn.addEventListener("click", () => {
    btn.classList.add("clicked");
    setTimeout(() => {
        btn.classList.remove("clicked");
    }, 200);
    });
    */


    init();
});

//window.addEventListener("load", init);
