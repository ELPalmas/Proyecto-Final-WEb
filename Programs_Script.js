async function cargarCursos() {
    const response = await fetch(`Home.php`)
    const data = await response.json();

    console.log("Cursos completos:", data);

    data.forEach(curso => {
        console.log("Curso:", curso.idcurso, curso.idioma, curso.dificultad, curso.proposito);

        curso.dias.forEach(dia => {
            console.log("   Día:", dia.titulo);

            dia.preguntas.forEach(p => {
                console.log("       Pregunta: ", p.texto);

                p.opciones.forEach(o => {
                    console.log(`       -${o.clave}: ${o.valor} (${o.correcta ? "correcta" : "incorrecta"})`);

                });
            });
        });
    });
}

cargarCursos();