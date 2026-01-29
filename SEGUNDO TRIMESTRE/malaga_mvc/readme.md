# Ejercicio 2: Sistema de Gestión Deportiva - Málaga CF (RA5)


## Información General
- **Módulo:** Desarrollo Web en Entorno Servidor (DWES)
- **Unidad:** 8 - Arquitectura MVC y Acceso a Datos
- **RA Evaluados:** RA4 y RA5


Al abrirlo en VS Code, si pulsáis Ctrl + Shift + V podréis este documento maquetado y bonito.


Este es un proyecto evaluable de **Desarrollo Web en Entorno Servidor (DWES)**. 
El objetivo es construir una aplicación robusta utilizando el patrón de diseño **MVC** (Modelo-Vista-Controlador) visto en clase, tenéis igualmente dos ejercicios resueltos por si necesitáis una pequeña o gran ayuda!!!.


## Estructura del Proyecto
Debes organizar tus archivos siguiendo este esquema, en este ejercicio os la voy a dar de nuevo, mas alante ya tendréis que crearla dependiendo de vuestras necesidades:


- `/config`: Conexión PDO (Singleton).
- `/controllers`: Lógica de la aplicación.
- `/models`: Consultas SQL seguras.
- `/views`: Interfaz de usuario (HTML/CSS).
- `/db`: Archivo `setup.sql`.
- `/public`: Carpeta para imágenes de jugadores y estilos.
- `index.php`: Front Controller.


---


## Fase Inicial: Diseño de Datos (SQL)
Antes de programar, debes crear el archivo `/db/setup.sql`.
**Requisitos de la tabla `plantilla`:**
- `id`: Autoincremental y PK.
- `nombre`: Texto (no nulo).
- `dorsal`: Único (no puede haber dos números iguales).
- `posicion`: Solo Portero, Defensa, Centrocampista o Delantero (usar ENUM).
- `foto`: Texto con valor por defecto "sin_foto.png".
- `goles`: Entero con valor por defecto 0.


---


## Misiones del Proyecto


### Misión 1: Conexión Segura (Singleton)
Configura una clase `Database` que gestione una única conexión PDO. No uses `mysqli`.


### Misión 2: CRUD de Jugadores (Quiero que intentéis esta parte por vuestra cuenta, aunque se vaya a explicar en clase CRUD, así por lo menos véis algo para que luego se entienda mejor)
- **Fichar (C):** Formulario para añadir nuevos jugadores.
- **Listar (R):** Mostrar todos los jugadores en una tabla blanquiazul. Debe verse la foto de cada uno.
- **Editar (U):** Modificar los datos de un jugador existente.
- **Baja (D):** Opción de eliminar a un jugador del sistema.



### Misión 3: Seguridad Obligatoria 
1. **Sentencias Preparadas:** Prohibido concatenar variables en el SQL. Usa `prepare()` y `execute()`.
2. **Higiene de salida:** Usa `htmlspecialchars()` en la vista para evitar ataques XSS.


---


## Requisitos Visuales
- La aplicación debe tener los colores del Málaga CF (Azul #0044ff y Blanco).
- Si un jugador no tiene foto, debe mostrarse una imagen genérica por defecto.


## Entrega
Comprime la carpeta `malaga_mvc` (incluyendo la carpeta `/db` con el SQL) y súbela a la tarea de Teams, se debe nombrar apellido1_apellido2_nombre_completo_malagafc.