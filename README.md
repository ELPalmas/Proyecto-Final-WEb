
# Plataforma de Aprendizaje de Idiomas - Palrom Learning

## 1. Descripcion
Este proyecto es una **plataforma web para el aprendizaje de idiomas**, desarrollada como proyecto final. Su objetivo es permitir a los usuarios registrarse, recibir un plan de trabajo personalizado y practicar ejercicios generados dinámicamente por un modelo de inteligencia artificial (IA).  

El proyecto integra **frontend, backend, base de datos y un modelo de IA** para ofrecer una experiencia educativa personalizada.


---

## 2. Objetivos

- Desarrollar una aplicación web responsiva y funcional.
- Implementar autenticación de usuarios segura.
- Generar planes de trabajo y ejercicios de forma automática mediante IA.
- Registrar y mostrar el progreso del usuario en tiempo real.

---
## 3. Tecnologias Implementadas

- **Frontend:** HTML5, CSS3, JavaScript (Vanilla JS)
- **Backend:** PHP 8.x (Vanilla PHP)
- **Base de Datos:** MySQL o MariaDB
- **Inteligencia Artificial:** Ollama con modelo `deepseek-coder` (opcional)
- **Control de versiones:** Git y GitHub
- **Entorno de Desarrollo Local:** Máquina virtual con Vagrant y VirtualBox (para ejecutar servidor web y base de datos)  


---
## 4. Funcionalidades Principales

### a. Módulo de Autenticación de Usuarios

- **Registro:** Formulario para crear una cuenta (nombre, correo electrónico, contraseña). Las contraseñas se almacenan de forma segura usando `password_hash()`.
- **Inicio de Sesión:** Formulario para que los usuarios registrados accedan a la plataforma.
- **Gestión de Sesión:** Se utilizan sesiones de PHP para mantener al usuario autenticado.
- **Cerrar Sesión:** Funcionalidad para destruir la sesión del usuario.
- **Recuperación de contraseña:** Opción en el login que permite restablecer la contraseña mediante correo electrónico simulado.

### b. Generación de Plan de Trabajo con IA

- Al iniciar sesión por primera vez, el usuario configura sus preferencias de aprendizaje (idioma, nivel, objetivo).
- PHP construye un **prompt** para la IA solicitando un plan de estudio en formato JSON.
- El plan de estudio se guarda en la base de datos y se muestra claramente en el panel del usuario.

**Prompt para Plan de Estudio:**
"prompt" => "Responde SOLO con JSON válido. No cortes cadenas largas. Usa siempre 'clave', 'valor', 'correcta'.
                Genera SOLO UN JSON VALIDO con el contenido del dia $dia de un curso de $idioma con dificultad $dificultad
                y temática de $proposito.
                Incluye exactamente 1 pregunta de opción múltiple con 3 respuestas posibles (A, B, C), indicando la correcta.
                Devuelve el formato JSON con un objeto 'curso'.
                Genera un curso en formato JSON con la siguiente estructura fija:
                Un objeto con las claves 'dia', 'titulo', y 'preguntas'.
                'dia' debe ser un número entero.
                'titulo' debe ser un string con el tema del día.
                'preguntas' debe ser un array con exactamente 3 objetos.
                Cada objeto de 'preguntas' debe tener 'texto' y 'opciones'.
                'opciones' debe ser un array con exactamente 3 objetos.
                Cada opción debe tener 'clave' (A, B, C), 'valor' (texto de la respuesta), y 'correcta' (true/false).
                En cada pregunta, exactamente una opción debe tener 'correcta': true. Devuelve únicamente el JSON válido, sin explicaciones ni texto adicional.
                Devuelve únicamente JSON válido. 
                No uses comillas simples. 
                Cada pregunta debe tener exactamente 3 opciones con esta estructura:
                { 'clave': 'A', 'valor': 'texto', 'correcta': true/false }
                No uses claves sueltas como 'B' o 'C'. 
                No incluyas texto fuera del JSON.",

### c. Módulo de Ejercicios Generados por IA

- Cada tema del plan tiene una opción de **"Practicar"**.
- PHP envía un prompt a la IA para generar **3 ejercicios de opción múltiple** en tiempo real.
- Los ejercicios incluyen pregunta, opciones y respuesta correcta.
- Validación inmediata de respuestas y retroalimentación.
- Una vez completados correctamente los 3 ejercicios, el tema se marca como **completado** automáticamente.


### d. Seguimiento de Avance

- Visualización del progreso del usuario (barra de progreso, ícono de verificación).
- El estado de cada tema (completado/pendiente) se guarda y recupera de la base de datos.

---

## 5. Instalación y Configuración

- Clonar o descargar el repositorio:

```bash
git clone https://github.com/usuario/proyecto-palrom.git
```

- Crear una base de datos MySQL.

- Configurar las credenciales de la base de datos en database.php.

- Importar el script SQL de la base de datos.

## 5.1 Configuración Local con Vagrant

Este proyecto está diseñado para funcionar en un entorno local proporcionado por una máquina virtual Vagrant.

- Levanta la VM con el comando:

  ```bash
  vagrant up
  ```
- La base de datos MySQL está instalada dentro de la VM y se accede a ella usando localhost desde dentro de la VM.

- Para acceder al servidor web, abre en tu navegador la URL http://localhost:8080 o el puerto que hayas configurado para redirigir el tráfico hacia la VM.

- Las credenciales de la base de datos deben configurarse en database.php apuntando a la base de datos dentro de la VM.

- Recuerda que debes tener Vagrant e VirtualBox (u otro proveedor) instalados en tu máquina host.

## 6. Uso

- Registrarse como nuevo usuario.
- Iniciar sesión.
- Configurar preferencias de aprendizaje.
- Crear el plan de estudio generado por IA.
- Practicar ejercicios y ver el progreso automáticamente actualizado.

## 7. Seguridad

- Contraseñas almacenadas usando `password_hash()`.
- Consultas a la base de datos con PDO y sentencias preparadas (prevención SQL Injection).
- Validación de campos en frontend y backend (prevención XSS y datos inválidos).

## 8. Control de Versiones

- El repositorio principal se encuentra en GitHub.

## 9. Despliegue

- La plataforma requiere PHP y MySQL, por lo que debe desplegarse en un hosting compatible.
- Proporcionar enlaces a:
  - Repositorio GitHub
  - Aplicación funcional en vivo

## 10. Licencia

Este proyecto está bajo la licencia MIT. Puedes usarlo y modificarlo libremente.

## 11. Contacto

- Nombre: Cesar Gregorio Palma Venegas
- Correo: [cpalma_23@alu.uabcs.mx]
- Nombre: Jorge Luis Leggis Romero
- Correo: [jleggis_23@alu.uabcs.mx]
